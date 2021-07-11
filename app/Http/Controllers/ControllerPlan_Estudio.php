<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidaPlan;
use App\Models\Idioma;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControllerPlan_Estudio extends Controller
{

    public function mostplan()
    {
        //para llenar tabla
        $selecplan = DB::table('plan_estudios')
            ->select('ID_PLANESTUDIO', 'PLAN_ID_IDIOMA', 'PLAN_ESTADO')
            ->get();
        //lo que ocupa nuesttro cuadro a salir
        $selecidioma = Idioma::select('ID_IDIOMA')->get();


        return view('plan-estudio', compact('selecplan', 'selecidioma'));
    }




    public function agregaplan(ValidaPlan $informacion)
    {

        DB::insert(

            ' INSERT INTO `plan_estudios` 
            (`ID_PLANESTUDIO`, `PLAN_CLAVE`, `PLAN_ID_IDIOMA`, `PLAN_IN`, `PLAN_FIN`, `PLAN_ESTADO`, `PLAN_CMOD`) 
            VALUES (?,?,?,?,?,?,?)',
            [

                $informacion->ID_PLANESTUDIO,
                $informacion->PLAN_CLAVE,
                $informacion->PLAN_ID_IDIOMA,
                $informacion->PLAN_IN,
                $informacion->PLAN_FIN,
                $informacion->PLAN_ESTADO,
                $informacion->PLAN_CMOD
            ]
        );


        return back();
    }


    public function edit($id)
    {



        $selecplan = DB::table('plan_estudios')
            ->where('ID_PLANESTUDIO', $id)->get();

        $selecidioma = Idioma::select('ID_IDIOMA')->get();

        return view('update/plan-estudio', compact('selecplan', 'selecidioma'));
    }



    public function modificarplan(Request $informacion, $id)

    {



        $selecalum = DB::table('plan_estudios')->where('ID_PLANESTUDIO', $id)->update([




            'ID_PLANESTUDIO' => $id,
            'PLAN_CLAVE' => $informacion->PLAN_CLAVE,
            'PLAN_ID_IDIOMA' => $informacion->PLAN_ID_IDIOMA,
            'PLAN_IN' => $informacion->PLAN_IN,
            'PLAN_FIN' => $informacion->PLAN_FIN,
            'PLAN_ESTADO' => $informacion->PLAN_ESTADO,
            'PLAN_CMOD' => $informacion->PLAN_CMOD,


        ]);






        return redirect()->route('plan.actualizado');
    }



    public function eliminarplan($id)
    {

        DB::table('plan_estudios')->where('ID_PLANESTUDIO', '=', $id)->delete();




        return redirect()->route('plan.actualizado');
    }
}
