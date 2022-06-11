<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidaGrupo;
use App\Models\Docente;
use App\Models\Modulo;
use App\Models\Ubicacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControllerGrupo extends Controller
{

    public function mostgrupo()
    {
        //para llenar la tabla
        $selecgrup = DB::table('grupos')
            ->join('docentes',  'docentes.ID_DOCENTE', '=', 'grupos.GRUPO_ID_DOCENTE')
            ->select('docentes.*', 'grupos.*')->get();
        //Pra llenar lo combo box
        $selecdocente = Docente::select(
            'ID_DOCENTE',
            'DOCENTE_NOMBRE',
            'DOCENTE_AP_MAT',
            'DOCENTE_AP_PAT',

        )->get();
        $selecplan = DB::table('planestudios')->get();
        $selecmod = Modulo::select('ID_MODULO')->get();



        return view('grupo', compact('selecgrup', 'selecplan', 'selecdocente', 'selecmod'));
    }

    public function agregagrupo(ValidaGrupo $informacion)
    {
        DB::insert(
            'INSERT INTO `grupos` 
        (`GRUPO_ID_MODULO`, `GRUPO_TIPO`, `GRUPO_CLA`, `GRUPO_NUM_GRUPO`, `GRUPO_DES`, `GRUPO_NUM_ALUMNOS`, `GRUPO_LIMITE`,
         `GRUPO_ID_DOCENTE`, `GRUPO_DIAS`, `GRUPO_HORAS`, `GRUPO_UBICACION`) 
         VALUES (?,?,?,?,?,?,?,?,?,?)',
            [
                $informacion->GRUPO_ID_MODULO,
                $informacion->GRUPO_TIPO,
                $informacion->GRUPO_CLA,
                $informacion->GRUPO_NUM_GRUPO,
                $informacion->GRUPO_DES,
                $informacion->GRUPO_NUM_ALUMNOS,
                $informacion->GRUPO_LIMITE,
                $informacion->GRUPO_ID_DOCENTE,
                $informacion->GRUPO_DIAS,
                $informacion->GRUPO_HORAS,
                $informacion->GRUPO_UBICACION,
            ]

        );




        return back();
    }



    public function edit($id)
    {

        $selecgrupo = DB::table('grupos')
            ->join('docentes',  'docentes.ID_DOCENTE', '=', 'grupos.GRUPO_ID_DOCENTE')
            ->join('modulos',  'modulos.ID_MODULO', '=', 'grupos.GRUPO_ID_MODULO')
            ->select(

                'docentes.*',


                'grupos.*',
                'modulos.*',



            )->where('ID_GRUPO', '=', $id)->get();

        //Pra llenar lo combo box
        $selecdocente = Docente::select(
            'ID_DOCENTE',
            'DOCENTE_NOMBRE',
            'DOCENTE_AP_MAT',
            'DOCENTE_AP_PAT',

        )->get();
        $selecplan = DB::table('planestudios')->get();
        $selecmod = Modulo::select('ID_MODULO')->get();



        return view('update/grupo', compact('selecgrupo', 'selecplan', 'selecdocente', 'selecmod'));
    }



    public function modificargrupo(Request $informacion, $id)

    {



        $selecalum = DB::table('grupos')->where('ID_GRUPO_NOMBRE', $id)->update([

            'ID_GRUPO_NOMBRE' => $id,
            'GRUPO_ID_PLANESTUDIO' => $informacion->GRUPO_ID_PLANESTUDIO,
            'GRUPO_ID_MODULO' => $informacion->GRUPO_ID_MODULO,
            'GRUPO_SEMESTRE' => $informacion->GRUPO_SEMESTRE,
            'GRUPO_TIPO' => $informacion->GRUPO_TIPO,
            'GRUPO_NUM_ALUMNOS' => $informacion->GRUPO_NUM_ALUMNOS,
            'GRUPO_ID_DOCENTE' => $informacion->GRUPO_ID_DOCENTE,
            'GRUPO_ID_UBICACION' => $informacion->GRUPO_ID_UBICACION,
            'GRUPO_DIA' => $informacion->GRUPO_DIA,
            'GRUPO_HORA_IN' => $informacion->GRUPO_HORA_IN,
            'GRUPO_HORA_FIN' => $informacion->GRUPO_HORA_FIN,
            'GRUPO_HORA_TOTAL' => $informacion->GRUPO_HORA_TOTAL,
            'GRU_LIM' => $informacion->GRU_LIM,
            'GRU_HLU' => $informacion->GRU_HLU,
            'GRU_ALU' => $informacion->GRU_ALU,
            'GRU_HMA' => $informacion->GRU_HMA,
            'GRU_AMA' => $informacion->GRU_AMA,
            'GRU_HMI' => $informacion->GRU_HMI,
            'GRU_AMI' => $informacion->GRU_AMI,
            'GRU_HJU' => $informacion->GRU_HJU,
            'GRU_AJU' => $informacion->GRU_AJU,
            'GRU_HVI' => $informacion->GRU_HVI,
            'GRU_AVI' => $informacion->GRU_AVI,
            'GRU_HSA' => $informacion->GRU_HSA,
            'GRU_ASA' => $informacion->GRU_ASA,
            'GRU_DES' => $informacion->GRU_DES,






        ]);






        return redirect()->route('grupo.actualizado');
    }



    public function eliminargrupo($id)
    {

        DB::table('grupos')->where('ID_GRUPO_NOMBRE', '=', $id)->delete();




        return redirect()->route('grupo.actualizado');
    }
}
