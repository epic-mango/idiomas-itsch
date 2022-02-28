<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControllerInicio extends Controller
{
    public function index()
    {


        return view('auth/login');
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
