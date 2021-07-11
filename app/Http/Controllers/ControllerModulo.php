<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidaModulo;
use App\Models\Modulo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControllerModulo extends Controller
{

    public function agregamodulo(ValidaModulo $informacion)
    {

        DB::insert(

            'INSERT INTO `modulos` (`ID_MODULO`, `MODULO_TIEMPO`, `RET_NOM`, `RET_ORD`)
             VALUES (?,?,?,?)',
            [

                $informacion->ID_MODULO,
                $informacion->MODULO_TIEMPO,
                $informacion->RET_NOM,
                $informacion->RET_ORD

            ]
        );


        return back();
    }

    public function mostmodulo()
    {
        //para llenar tabla
        $selecmodulo = Modulo::select(

            'ID_MODULO',
            'MODULO_TIEMPO',
            'RET_NOM',
            'RET_ORD',
        )->get();


        return view('modulo', compact('selecmodulo'));
    }



    public function edit($id)
    {



        $selecmodulo = Modulo::where('ID_MODULO', $id)->get();



        return view('update/modulo', compact('selecmodulo'));
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
