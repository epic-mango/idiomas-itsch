<?php

namespace App\Http\Livewire;

use App\Models\Alumno;
use Livewire\Component;
use Livewire\WithPagination;

class Inscripcion extends Component
{
    //Para usar la paginación e indicar el tema 
    use WithPagination;
    protected $paginationTheme = 'bootstrap';


    public $busqueda;
    public $cantidadRegistros;

    public function mount()
    {
        $this->busqueda = '';
        $this->cantidadRegistros = 10;
    }


    public function render()
    {
        if ($this->busqueda == '') {
            $listaAlumnos = Alumno::paginate($this->cantidadRegistros);
        } else {
            $listaAlumnos = Alumno::where('ALUMNO_NOMBRE', 'like', '%' . $this->busqueda . '%')->paginate($this->cantidadRegistros);
        }


        return view('livewire.inscripcion', compact('listaAlumnos'));
    }
}
