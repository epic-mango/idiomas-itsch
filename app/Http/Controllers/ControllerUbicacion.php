<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidaUbicacion;
use App\Models\Ubicacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControllerUbicacion extends Controller
{
    public function mostubicacion()
    {
        //para llenar tabla
        $selecubicacion = Ubicacion::select(

            'ID_UBICACION',
            'UBICACION_EDIFICIO',
            'UBICACION_SALON',
        )->get();


        return view('ubicacion', compact('selecubicacion'));
    }
    public function agregaubicacion(ValidaUbicacion $informacion)
    {

        DB::insert(

            'INSERT INTO `ubicacions` 
           (`ID_UBICACION`, `UBICACION_EDIFICIO`, `UBICACION_SALON`) 
           VALUES (?,?,?)',
            [
                $informacion->ID_UBICACION,
                $informacion->UBICACION_EDIFICIO,
                $informacion->UBICACION_SALON


            ]


        );


        return back();
    }


    public function edit($id)
    {



        $selecubicacion = Ubicacion::where('ID_UBICACION', $id)->get();



        return view('update/ubicacion', compact('selecubicacion'));
    }



    public function modificarubicacion(Request $informacion, $id)

    {



        $selecalum = DB::table('ubicacions')->where('ID_UBICACION', $id)->update([



            'ID_UBICACION' => $id,


            'UBICACION_EDIFICIO' => $informacion->UBICACION_EDIFICIO,
            'UBICACION_SALON' => $informacion->UBICACION_SALON,






        ]);






        return redirect()->route('ubicacion.actualizado');
    }



    public function eliminarubicacion($id)
    {

        DB::table('ubicacions')->where('ID_UBICACION', '=', $id)->delete();




        return redirect()->route('ubicacion.actualizado');
    }
}
