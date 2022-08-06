<?php

namespace App\Http\Livewire;

use App\Models\Alumno;
use App\Models\Grupo;
use App\Models\Inscripcion as ModelsInscripcion;
use App\Models\Modulo;
use App\Models\Planestudio;
use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Component;
use Livewire\WithPagination;


class Inscripcion extends Component
{

    //Validaciones para inscripcion
    protected $rules = [
        'inscribiendo.folio' => 'required|integer|min:1',
        'inscribiendo.cantidad' => 'required|numeric|min:0',
        'inscribiendo.idGrupo' => 'required|integer|min:1',
    ];

    protected $messages = [
        'inscribiendo.folio.required' => 'El campo folio es obligatorio',
        'inscribiendo.folio.integer' => 'El campo folio debe ser un numero entero',
        'inscribiendo.folio.min' => 'El campo folio no es válido',
        'inscribiendo.cantidad.required' => 'El campo cantidad es obligatorio',
        'inscribiendo.cantidad.numeric' => 'La cantidad ser un número (puede contener decimales)',
        'inscribiendo.cantidad.min' => 'La cantidad no es válida',
        'inscribiendo.idGrupo.required' => 'El grupo es obligatorio',
        'inscribiendo.idGrupo.integer' => 'Debes seleccionar un grupo',
        'inscribiendo.idGrupo.min' => 'Debes seleccionar un grupo',
    ];

    //Para usar la paginación e indicar el tema 
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    //Variables a las que JavaScript tiene acceso
    public $busqueda;
    public $cantidadRegistros;
    public $planesEstudio;
    public $inscribiendo = [
        'id' => null,
        'planEstudio' => null,
        'idioma' => null,
        'numeroModulo' => null,
        'cantidad' => null,
        'idGrupo' => null,
        'folio' => null,
        'grupo' => null,
        'alumno' => null
    ];
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

                $this->planesEstudio[$planEstudio->ID_PLANESTUDIO]['modulos'][$modulo->ID_MODULO]['grupos'] = $grupos;
            }
        }


        $this->fillListaAlumnos();
    }

    public function cancelarInscripcion()
    {
        $this->reset('inscribiendo');
    }

    public function inscribir()
    {
        $this->validate();

        //Verificar el cupo del grupo
        $grupo = Grupo::find($this->inscribiendo['idGrupo']);
        if ($grupo->NUM_ALUMNOS >= $grupo->GRUPO_LIMITE)
            return false;

        $alumno = Alumno::find($this->inscribiendo['id']);

        $grupo = Grupo::find($this->inscribiendo['idGrupo']);
        $modulo = $grupo->modulo()->first();

        //Verificar que el alumno puede inscribirse en el módulo
        if ($this->inscribiendo['numeroModulo'] > 1) {
            $ultimoModulo = $alumno->lastCardex()[$this->inscribiendo['planEstudio']]['modulo'];
            if ($ultimoModulo == !intval(str_replace($modulo->MODULO_ID_PLANESTUDIO . '_M', '', $modulo->ID_MODULO)) - 1)
                return false;
        }

        //Verificar que el alumno no este inscrito en el módulo
        foreach ($alumno->grupos()->get() as $grupoInscrito) {
            $planInscrito = $grupoInscrito->modulo()->first()->MODULO_ID_PLANESTUDIO;
            if ($planInscrito == $this->inscribiendo['planEstudio']) {
                return false;
            }
        }

        $inscripcion = ModelsInscripcion::create([
            'INSCRIPCION_ID_GRUPO' => $this->inscribiendo['idGrupo'],
            'ISCRIPCION_ID_ALUMNO' => $this->inscribiendo['id'],
            'INSCRIPCION_NUM_FOLIO' => $this->inscribiendo['folio'],
            'INSCRIPCION_MONTO' => $this->inscribiendo['cantidad'],
            'ISCRIPCION_FECHA' => date('Y-m-d H:i:s'),
            'ISCRIPCION_ PERIODO' => 'ENE-JUL',
            'INSCRIPCION_ANIO' => 2020,
            'P1' => 0,
            'P2' => 0,
            'P3' => 0,
            'P4' => 0,
            'PF' => 0,
            'CALIFICACION_FECHA' => date('Y-m-d H:i:s'),
        ]);

        $inscripcion->save();
        $this->reset('inscribiendo');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function llenarInscripcion($idAlumno, $idPlan, $numeroModulo)
    {
        $this->inscribiendo['id'] =  $idAlumno;
        $this->inscribiendo['planEstudio'] = $idPlan;
        $this->inscribiendo['idioma'] = $this->planesEstudio[$idPlan]['idioma'];
        $this->inscribiendo['numeroModulo'] = $numeroModulo;
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
