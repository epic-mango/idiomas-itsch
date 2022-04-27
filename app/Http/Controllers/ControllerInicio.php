<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class ControllerInicio extends Controller
{
    public function index()
    {
        //Verificar si el usuario está autenticado
        if (Auth::check()) {
            //si está autenticado, mostrar la vista
            return redirect('/home');
        } else {
            //si no está autenticado, mostrar el formulario de login
            return view('auth/login');
        }
        
    }


    public function cardex()
    {


        return view('/cardex2');
    }

    public function calificacion2()
    {


        return view('/calificacion2');
    }

    public function docentecalif()
    {


        return view('/docente-calif');
    }
}
