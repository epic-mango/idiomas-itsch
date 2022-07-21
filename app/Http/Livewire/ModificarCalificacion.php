<?php

namespace App\Http\Livewire;

use App\Models\Alumno;
use App\Models\Cierre;
use App\Models\Grupo;
use App\Models\Inscripcion;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;
use stdClass;

class ModificarCalificacion extends Component
{


    //Reglas de validación basadas en propiedades
    protected function rules()
    {
        $rules = [];

        $rules['grupo'] = 'required';

        foreach ($this->listaCalificaciones as $alumno => $calificacion) {
            //Cada alumno tiene 4 parciales que serán validados
            $rules["listaCalificaciones." . $alumno . ".P1"] = 'required|numeric|min:0|max:100';
            $rules["listaCalificaciones." . $alumno . ".P2"] = 'required|numeric|min:0|max:100';
            $rules["listaCalificaciones." . $alumno . ".P3"] = 'required|numeric|min:0|max:100';
            $rules["listaCalificaciones." . $alumno . ".P4"] = 'required|numeric|min:0|max:100';
        }
        return $rules;
    }

    protected $messages = [
        'listaCalificaciones.*.*.required' => 'La calificación es requierida',
        'listaCalificaciones.*.*.numeric' => 'La calificación debe ser un número',
        'listaCalificaciones.*.*.min' => 'La calificación debe ser mayor a 0',
        'listaCalificaciones.*.*.max' => 'La calificación debe ser menor a 100',
    ];



    //Reglas de validación en tiempo real
    protected function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    //Escucha para eventos
    protected $listeners = ['grupoChanged' => 'onGrupoChanged'];

    //Propiedades públicas
    public $listaAlumnos = [];
    public $listaGrupos = [];
    public $listaCalificaciones = [];
    public $parcial = -1;

    public $grupo = null;

    public function mount()
    {
        if ($this->grupo == null) {

            if(sizeof($this->listaGrupos) > 0){
                $this->grupo = $this->listaGrupos[0]->ID_GRUPO;
            } else {
                return;
            }
        }

        $this->parcial = Cierre::first()->parcial;

        $this->updatedGrupo();
    }

    public function updatedGrupo()
    { //Al cambiar el selector de grupo, se actualiza la lista de alumnos
        $grupo = Grupo::where('ID_GRUPO', $this->grupo)->first();
        $lista = $grupo->alumnos;

        //asignamos una inscripcion a cada alumno basado en su grupo
        $this->listaCalificaciones = [];

        foreach ($lista as $i => $alumno) {
            $inscripcion = Inscripcion::select('ISCRIPCION_ID_ALUMNO', 'INSCRIPCION_ID_GRUPO', 'P1', 'P2', 'P3', 'P4')->where('ISCRIPCION_ID_ALUMNO', $alumno->ID_ALUMNO)->get()->where('INSCRIPCION_ID_GRUPO', $this->grupo)->first();

            $lista[$i]->inscripcion = $inscripcion;

            $this->listaCalificaciones[$alumno->ID_ALUMNO]['P1'] = $inscripcion->P1;
            $this->listaCalificaciones[$alumno->ID_ALUMNO]['P2'] = $inscripcion->P2;
            $this->listaCalificaciones[$alumno->ID_ALUMNO]['P3']= $inscripcion->P3;
            $this->listaCalificaciones[$alumno->ID_ALUMNO]['P4'] = $inscripcion->P4;
        }
        //Guardamos los datos en la lista de alumnos
        $this->listaAlumnos = $lista;
        $this->emit('grupoChanged');
    }


    public function enviarCalificaciones()
    {
        $this->validate();

        if ($this->parcial !== -1) {
            foreach ($this->listaCalificaciones as $alumno => $calificacion) {

                $inscripcion = Inscripcion::where('ISCRIPCION_ID_ALUMNO', $alumno)->where('INSCRIPCION_ID_GRUPO', $this->grupo)->first();

                switch ($this->parcial) {
                    case 1:
                        $inscripcion->P1 = $calificacion['P1'];
                        break;
                    case 2:
                        $inscripcion->P2 = $calificacion['P2'];
                        break;
                    case 3:
                        $inscripcion->P3 = $calificacion['P3'];
                        break;
                    case 4:
                        $inscripcion->P4 = $calificacion['P4'];
                        break;
                    default:

                        break;
                }


                $inscripcion->save();
            }
        }
    }

    public function onGrupoChanged()
    {
    }

    public function render()
    {
        return view('livewire.modificar-calificacion');
    }
}
