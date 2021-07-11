<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControllerInicio extends Controller
{
    public function index()
    {


        return view('welcome');
    }
}
