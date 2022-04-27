<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class BusquedaCorreo extends Component
{
    public $busqueda = '';
    public $identificador = 0;
    public $seleccionado = '';

    public function render()
    {

        $resultado = [];
        if (strlen($this->busqueda) > 0) {
            $resultado = User::where('email', 'like', '%' . $this->busqueda . '%')->get();
        }

        return view('livewire.busqueda-correo', compact('resultado'));
    }
}
