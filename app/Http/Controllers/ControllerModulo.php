<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidaModulo;
use App\Models\Modulo;
use App\Models\Planestudio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControllerModulo extends Controller
{

    public function agregamodulo(ValidaModulo $informacion)
    {

        $var = $informacion->MODULO_ID_PLANESTUDIO . '_M' .  $informacion->MODULO_NIVEL;

        DB::insert(

            'INSERT INTO `modulos` (`ID_MODULO`, `RETICULA_NOMBRE`, `MODULO_ID_PLANESTUDIO` )
             VALUES (?,?,?)',
            [

                $var,
                $informacion->RETICULA_NOMBRE,
                $informacion->MODULO_ID_PLANESTUDIO,


            ]
        );


        return back();
    }

    public function mostmodulo()
    {
        //para llenar tabla
        $selecmodulo = Modulo::select(

            'ID_MODULO',
            'RETICULA_NOMBRE',
            'MODULO_ID_PLANESTUDIO',

        )->get();
        //llenar combo con los planes

        $selecplan = Planestudio::select('ID_PLANESTUDIO')->get();


        return view('modulo', compact('selecmodulo', 'selecplan'));
    }



    public function edit($id)
    {



        $selecmodulo = Modulo::where('ID_MODULO', $id)->get();
        $selecplan = Planestudio::select('ID_PLANESTUDIO')->get();


        return view('update/modulo', compact('selecmodulo', 'selecplan'));
    }



    public function modificarmodulo(Request $informacion, $id)

    {



        $selecalum = DB::table('modulos')->where('ID_MODULO', $id)->update([





            'ID_MODULO' => $id,
            'MODULO_TIEMPO' => $informacion->MODULO_TIEMPO,
            'RET_NOM' => $informacion->RET_NOM,
            'RET_ORD' => $informacion->RET_ORD,



        ]);






        return redirect()->route('modulo.actualizado');
    }



    public function eliminarmodulo($id)
    {

        DB::table('modulos')->where('ID_MODULO', '=', $id)->delete();




        return redirect()->route('modulo.actualizado');
    }
}
