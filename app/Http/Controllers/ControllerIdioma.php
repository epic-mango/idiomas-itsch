<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidaIdioma;
use App\Models\Idioma;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControllerIdioma extends Controller
{
    //


    public function mostidioma()
    {
        //para llenar tabla
        $selecidioma = Idioma::select(

            'ID_IDIOMA',
            'IDIOMA_NOMBRE',
        )->get();


        return view('idioma', compact('selecidioma'));
    }

    public function agregaidioma(ValidaIdioma $informacion)
    {

        DB::insert(
            'INSERT INTO `idiomas` (`ID_IDIOMA`, `IDIOMA_NOMBRE`) 
        VALUES (?, ?)',
            [
                $informacion->ID_IDIOMA,
                $informacion->IDIOMA_NOMBRE

            ]
        );
        return back();
    }


    public function edit($id)
    {



        $selecidioma = Idioma::where('ID_IDIOMA', $id)->get();



        return view('update/idioma', compact('selecidioma'));
    }



    public function modificaridioma(Request $informacion, $id)

    {



        $selecalum = DB::table('idiomas')->where('ID_IDIOMA', $id)->update([



            'ID_IDIOMA' => $id,
            'IDIOMA_NOMBRE' => $informacion->IDIOMA_NOMBRE,





        ]);






        return redirect()->route('idioma.actualizado');
    }



    public function eliminaridioma($id)
    {

        DB::table('idiomas')->where('ID_IDIOMA', '=', $id)->delete();




        return redirect()->route('idioma.actualizado');
    }
}
