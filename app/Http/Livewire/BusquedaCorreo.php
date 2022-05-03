<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class BusquedaCorreo extends Component
{
    //Variables públicas que pueden ser accedidas desde la vista
    public $busqueda = '';
    public $seleccionado;
    public $identificador;
    public $resultado = [];

    //función que se ejecuta al modificar el valor de la variable $busqueda
    public function updatedBusqueda($value)
    {
        //si había un correo seleccionado, se limpia el valor de $busqueda para no confundir al usuario
        if($this->seleccionado){
            $this->busqueda = '';            
        }     
        
        //Siempre que se modifica un valor de la variable $busqueda, se limpia la variable $seleccionado e $identificador 
        //y se inicia una nueva búsqueda
        $this->seleccionado = false;
        $this->identificador = null;

        if (strlen($this->busqueda) > 0) {
            //Además de buscar usuarios que coincidan con la entrada del usuario, se buscan usuarios que coincidan con el rol 'Alum'
            $this->resultado = User::where('email', 'like', '%' . $this->busqueda . '%')->role('Alum')->get();
        }
    }

    //función que se ejecuta al seleccionar un correo
    public function seleccionar($identificador, $email)
    {
        $this->seleccionado = true;
        $this->identificador = $identificador;
        $this->busqueda = $email;
    }



}
