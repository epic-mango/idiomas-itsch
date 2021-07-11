<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidaDocente;
use App\Models\Docente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControllerDocente extends Controller
{
    public function mostdocente()
    {
        //para llenar tabla
        $selecdocente = Docente::select(

            'ID_DOCENTE',
            'DOCENTE_AP_PAT',
            'DOCENTE_AP_MAT',
            'DOCENTE_NOMBRE',
            'DOCENTE_SEXO',
            'DOCENTE_FECHA_NAC'

        )->get();



        return view('docente', compact('selecdocente'));
    }

    public function agregadocente(ValidaDocente $informacion)
    {



        DB::insert(



            'INSERT INTO `docentes` (
            `ID_DOCENTE`, `DOCENTE_CLAVE`, `DOCENTE_AP_PAT`, `DOCENTE_AP_MAT`, `DOCENTE_NOMBRE`, `DOCENTE_SEXO`, `DOCENTE_TIPO_SANGRE`,
             `DOCENTE_FECHA_NAC`, `DOCENTE_CALLE`, `DOCENTE_COLONIA`, `DOCENTE_MUNICIPIO`, `DOCENTE_ESTADO`, `DOCENTE_MOVIL`, `DOCENTE_CASA`, 
             `DOCENTE_CORREO`, `DOCENTE_CLAVE_PROFESIONAL`, `DOCENTE_ESPECIALIDAD`, `DOCENTE_FECHA_ING`, `DOCENTE_OBSERVACIONES`, `DOCENTE_PWD`,`CAT_EPR`)
              VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)',
            [
                $informacion->ID_DOCENTE,
                $informacion->DOCENTE_CLAVE,
                $informacion->DOCENTE_AP_PAT,
                $informacion->DOCENTE_AP_MAT,
                $informacion->DOCENTE_NOMBRE,
                $informacion->DOCENTE_SEXO,
                $informacion->DOCENTE_TIPO_SANGRE,
                $informacion->DOCENTE_FECHA_NAC,
                $informacion->DOCENTE_CALLE,
                $informacion->DOCENTE_COLONIA,
                $informacion->DOCENTE_MUNICIPIO,
                $informacion->DOCENTE_ESTADO,
                $informacion->DOCENTE_MOVIL,
                $informacion->DOCENTE_CASA,
                $informacion->DOCENTE_CORREO,
                $informacion->DOCENTE_CLAVE_PROFESIONAL,
                $informacion->DOCENTE_ESPECIALIDAD,
                $informacion->DOCENTE_FECHA_ING,
                $informacion->DOCENTE_OBSERVACIONES,
                $informacion->DOCENTE_PWD,
                $informacion->CAT_EPR


            ]

        );

        return back();
    }


    //dif
    public function edit($id)
    {



        $selecdocente = Docente::where('ID_DOCENTE', $id)->get();



        return view('update/docente', compact('selecdocente'));
    }



    public function modificardocente(Request $informacion, $id)

    {



        $selecalum = DB::table('docentes')->where('ID_DOCENTE', $id)->update([




            'ID_DOCENTE' => $id,
            'DOCENTE_CLAVE' =>  $informacion->DOCENTE_CLAVE,
            'DOCENTE_AP_PAT' =>  $informacion->DOCENTE_AP_PAT,
            'DOCENTE_AP_MAT' =>  $informacion->DOCENTE_AP_MAT,
            'DOCENTE_NOMBRE' =>  $informacion->DOCENTE_NOMBRE,
            'DOCENTE_SEXO' =>  $informacion->DOCENTE_SEXO,
            'DOCENTE_TIPO_SANGRE' =>  $informacion->DOCENTE_TIPO_SANGRE,
            'DOCENTE_FECHA_NAC' =>  $informacion->DOCENTE_FECHA_NAC,
            'DOCENTE_CALLE' =>  $informacion->DOCENTE_CALLE,
            'DOCENTE_COLONIA' =>  $informacion->DOCENTE_COLONIA,
            'DOCENTE_MUNICIPIO' =>  $informacion->DOCENTE_MUNICIPIO,
            'DOCENTE_ESTADO' =>  $informacion->DOCENTE_ESTADO,
            'DOCENTE_MOVIL' =>  $informacion->DOCENTE_MOVIL,
            'DOCENTE_CASA' =>  $informacion->DOCENTE_CASA,
            'DOCENTE_CORREO' =>  $informacion->DOCENTE_CORREO,
            'DOCENTE_CLAVE_PROFESIONAL' =>  $informacion->DOCENTE_CLAVE_PROFESIONAL,
            'DOCENTE_ESPECIALIDAD' =>  $informacion->DOCENTE_ESPECIALIDAD,
            'DOCENTE_FECHA_ING' =>  $informacion->DOCENTE_FECHA_ING,
            'DOCENTE_OBSERVACIONES' =>  $informacion->DOCENTE_OBSERVACIONES,
            'CAT_EPR' =>  $informacion->CAT_EPR,





        ]);






        return redirect()->route('docente.actualizado');
    }



    public function eliminardocente($id)
    {

        DB::table('docentes')->where('ID_DOCENTE', '=', $id)->delete();




        return redirect()->route('docente.actualizado');
    }
}
