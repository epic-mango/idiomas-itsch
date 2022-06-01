<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ModificarCalificacion extends Component
{
    protected $listeners = ['grupoCambiado' => 'incrementPostCount'];
    public $listaAlumnos = [];
    public function incrementPostCount()
    {
        array_push($this->listaAlumnos, 'hola');
    }
    public $listaGrupos = ['a', 'b', 'c', 'd'];
    public function render()
    {
        return view('livewire.modificar-calificacion');
    }
}
