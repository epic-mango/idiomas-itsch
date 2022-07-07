<?php

namespace App\Http\Livewire;

use App\Models\Alumno;
use Livewire\Component;

class Inscripcion extends Component
{
    public $busqueda;
    public $listaAlumnos;

    public function mount()
    {
        $this->busqueda = '';
        Alumno::chunk(100, function ($alumnos) {
            foreach ($alumnos as $alumno ) {
                $this->listaAlumnos[$alumno] = ['ID_ALUMNO'=>$alumno->ID_ALUMNO,
                'Nombre'=>'Pollo'];
                dump($alumno );
            }
        });
    }


    public function render()
    {
        return view('livewire.inscripcion');
    }
}
