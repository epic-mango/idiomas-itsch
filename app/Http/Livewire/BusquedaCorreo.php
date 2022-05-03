<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class BusquedaCorreo extends Component
{
    public $busqueda = '';
    public $seleccionado;
    public $identificador;
    public $resultado = [];

    public function updatedBusqueda($value)
    {
        if($this->seleccionado){
            $this->busqueda = '';            
        }           
        $this->seleccionado = false;
        $this->identificador = null;
    }

    public function buscar()
    {
        if (strlen($this->busqueda) > 0) {
            $this->resultado = User::where('email', 'like', '%' . $this->busqueda . '%')->role('Alum')->get();
        }
     

    }

    public function seleccionar($identificador, $email)
    {
        $this->seleccionado = true;
        $this->identificador = $identificador;
        $this->busqueda = $email;
    }



}
