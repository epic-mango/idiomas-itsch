<?php

namespace App\Http\Livewire;

use App\Models\Alumno;
use App\Models\Planestudio;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Component;
use Livewire\WithPagination;
use stdClass;

class Inscripcion extends Component
{
    //Para usar la paginación e indicar el tema 
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    //Variables a las que JavaScript tiene accesp
    public $busqueda;
    public $cantidadRegistros;

    //Coleccion llenada con alumnos y usuarios no registrados
    private $listaAlumnos;

    private $allAlumnos;

    public function mount()
    {
        $this->busqueda = '';
        $this->cantidadRegistros = 10;
        $this->updatedBusqueda();
    }

    private function getAllAlumnos()
    {
        $this->allAlumnos = new Collection();

        $alumnos = Alumno::all();

        foreach ($alumnos as $alumno) {
            $registro = new stdClass();
            $registro->tipo = 'alumno';
            $registro->id = $alumno->ID_ALUMNO;
            $registro->nombre = $alumno->ALUMNO_NOMBRE . ' ' . $alumno->ALUMNO_APELLIDO_PAT . ' ' . $alumno->ALUMNO_APELLIDO_MAT;
            $registro->grupos = $alumno->grupos()->get();
            $registro->ultimoModulo = $alumno->lastCardex();

            $this->allAlumnos->push($registro);
        }

        dd($this->allAlumnos);
    }

    private function fillListaAlumnos()
    {

        $this->getAllAlumnos();

        if ($this->busqueda == '') {
            //Cuando no se ha ingresado ninguna búsqueda, se obtienen todos los alumnos registrados
            $this->listaAlumnos = Alumno::paginate($this->cantidadRegistros);
        } else {
            $listaRegistrados = new Collection();
            $listaNoRegistrados = new Collection();

            //se añaden los alumnos registrados a la colección $listaRegistrados buscando por campos que coincidan con las palabras de la búsqueda
            $listaRegistrados->push($this->buscarCampos(['ALUMNO_NOMBRE', 'ALUMNO_APELLIDO_PAT', 'ALUMNO_APELLIDO_MAT', 'ID_ALUMNO'], $this->busqueda, Alumno::class)->get());


            //se buscan todos los usuarios que coincidan con palabras de la búsqueda
            $listaCorreos = $this->buscarCampos(['email', 'name'], $this->busqueda, User::class)->get();

            foreach ($listaCorreos as $correo) {
                //Alumnos ya registrados y que coinciden con la búsqueda en el correo
                $alumno = Alumno::where('ALUMNO_CORREO', 'like', '%' . $correo->id . '%')->get();

                if ($alumno->count() > 0) {
                    //para cada correo que coincida, se agrega al alumno a la lista de registrados
                    $listaRegistrados->push($alumno);
                } else {
                    //Los alumnos no registrados deben encontrarse en la tabla de usuarios, pero no en la tabla de alumnos
                    $listaNoRegistrados->push(User::whereEmail($correo->email)->first());
                }
            }

            //se unen las dos colecciones para obtener una sola colección con todos los alumnos registrados y no registrados
            $listaRegistrados->push($listaNoRegistrados);

            //paginamos la colección, flatten() para que exista solo una colección, unique() para eliminar los registros repetidos
            $this->listaAlumnos = new LengthAwarePaginator(
                $listaRegistrados->flatten()->unique(),
                $listaRegistrados->flatten()->unique()->count(),
                $this->cantidadRegistros
            );
        }
    }

    private static function buscarCampos(array $campos, string $busqueda, $modelo)
    {
        //separar la búsqueda en un array de palabras
        $palabras = explode(' ', $busqueda);

        //obtenemos una búsqueda inicial del modelo
        $modelo = $modelo::query();

        //para cada palabra se realiza una búsqueda que deberá coincidir con las demás palabras (where)
        foreach ($palabras as $palabra) {
            if ($palabra !== "") {
                $modelo = $modelo->where(function ($query) use ($campos, $palabra) {
                    foreach ($campos as $campo) {
                        //para cada campo se realiza la búsqueda que no forzosamente coincidirá con los demás campos (orWhere)
                        $query->orWhere($campo, 'like', '%' . $palabra . '%');
                    }
                });
            }
        }

        //Se retorna la query con todos los resultados de la búsqueda
        return $modelo;
    }


    public function updatedBusqueda()
    {
        //reiniciar la paginación
        $this->resetPage();
    }

    public function render()
    {
        $this->fillListaAlumnos();

        return view('livewire.inscripcion', [
            'listaAlumnos' => $this->listaAlumnos,
        ]);
    }
}
