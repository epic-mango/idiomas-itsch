<?php

namespace App\Http\Livewire;

use App\Models\Alumno;
use App\Models\Grupo;
use App\Models\Modulo;
use App\Models\Planestudio;
use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Component;
use Livewire\WithPagination;


class Inscripcion extends Component
{
    //Para usar la paginación e indicar el tema 
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    //Variables a las que JavaScript tiene acceso
    public $busqueda;
    public $cantidadRegistros;
    public $planesEstudio;
    public $inscribiendo = ['id' => -1];
    public $listaAlumnos;

    private $alumnosPaginado;


    public function mount()
    {
        $this->busqueda = '';
        $this->cantidadRegistros = 10;
        $this->updatedBusqueda();

        $planesEstudio = Planestudio::all();
        $this->planesEstudio = [];
        foreach ($planesEstudio as $planEstudio) {
            //Inicializar la clase
            if (!isset($this->planesEstudio[$planEstudio->ID_PLANESTUDIO]))
                $this->planesEstudio[$planEstudio->ID_PLANESTUDIO] = [];

            $this->planesEstudio[$planEstudio->ID_PLANESTUDIO]['idioma'] = $planEstudio->PLAN_ID_IDIOMA;
            $this->planesEstudio[$planEstudio->ID_PLANESTUDIO]['numero_modulos'] = $planEstudio->PLAN_CMOD;

            $modulos = Modulo::where('MODULO_ID_PLANESTUDIO', $planEstudio->ID_PLANESTUDIO)->get();

            foreach ($modulos as $modulo) {
                $grupos = Grupo::where('GRUPO_ID_MODULO', $modulo->ID_MODULO)->get();

                $this->planesEstudio[$planEstudio->ID_PLANESTUDIO]['modulos'][$modulo->ID_MODULO] = $grupos;
            }
        }


        $this->fillListaAlumnos();
    }

    public function inscribir($id_alumno)
    {
        $this->inscribiendo['id'] =  $id_alumno;
    }

    private function fillListaAlumnos()
    {
        $this->listaAlumnos = [];
        if ($this->busqueda == '') {
            //Cuando no se ha ingresado ninguna búsqueda, se obtienen todos los alumnos registrados
            $this->alumnosPaginado = Alumno::paginate($this->cantidadRegistros);
        } else {
            $this->alumnosPaginado = $this->buscarCampos(['ALUMNO_NOMBRE', 'ALUMNO_APELLIDO_PAT', 'ALUMNO_APELLIDO_MAT', 'ID_ALUMNO'], $this->busqueda, Alumno::class)->paginate($this->cantidadRegistros);
        }

        foreach ($this->alumnosPaginado as $alumno) {
            $usuario = User::where('id', $alumno->ALUMNO_CORREO)->first();
            $registro = [];

            $registro['correo'] = $usuario->email;
            $registro['tipo'] = 'alumno';
            $registro['id'] = $alumno->ID_ALUMNO;
            $registro['nombre'] = $alumno->ALUMNO_NOMBRE . ' ' . $alumno->ALUMNO_APELLIDO_PAT . ' ' . $alumno->ALUMNO_APELLIDO_MAT;

            $grupos = $alumno->grupos()->get();

            foreach ($grupos as $grupo) {
                $registro['grupos'][$grupo->modulo()->first()->planestudio()->first()->ID_PLANESTUDIO] = $grupo->ID_GRUPO;
            }
            $registro['ultimoModulo'] = $alumno->lastCardex();

            $this->listaAlumnos[$registro['id']] = $registro;
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
        $this->fillListaAlumnos();
    }

    public function render()
    {
        $this->fillListaAlumnos();
        
        return view('livewire.inscripcion', ['listaAlumnos' => $this->listaAlumnos, 'alumnosPaginado' => $this->alumnosPaginado]);
    }
}
