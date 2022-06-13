<?php

namespace App\Http\Livewire;

use App\Models\Alumno;
use App\Models\Grupo;
use App\Models\Inscripcion;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;


class ModificarCalificacion extends Component
{
    public $listaAlumnos = [];
    public $listaGrupos = [];

    public $grupo = null;

    public function mount()
    {
        if ($this->grupo == null) {
            $this->grupo = $this->listaGrupos[0]->ID_GRUPO;
        }

        $this->updatedGrupo();
    }

    public function updatedGrupo()
    {

        //Al cambiar el selector de grupo, se actualiza la lista de alumnos
        $grupo = Grupo::where('ID_GRUPO', $this->grupo)->first();
        $lista = $grupo->alumnos;

        //asignamos una inscripcion a cada alumno basado en su grupo
        $i = 0;
        foreach ($lista as $alumno) {
            $inscripcion = Inscripcion::where('ISCRIPCION_ID_ALUMNO', $alumno->ID_ALUMNO)->get()->where('INSCRIPCION_ID_GRUPO', $this->grupo)->first();

            $lista[$i]->inscripcion = $inscripcion;
            $i++;
        }
        //Guardamos los datos en la lista de alumnos
        $this->listaAlumnos = $lista;
        $this->emit('postAdded');
    }

    public function render()
    {
        return view('livewire.modificar-calificacion');
    }
}
