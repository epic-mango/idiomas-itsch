<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidaAdmin;
use App\Models\Administrador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControllerAdministrador extends Controller
{

    public function mostadmin()
    {
        //para llenar tabla
        $selecadmin = Administrador::select(

            'ID_ADMIN',
            'ADMIN_AP_PAT',
            'ADMIN_AP_MAT',
            'ADMIN_NOMBRE',
            'ADMIN_SEXO',
            'ADMIN_FECHA_NAC'
        )->get();


        return view('administrativo', compact('selecadmin'));
    }


    public function agregaadmin(ValidaAdmin $informacion)
    {



        DB::insert(

            'INSERT INTO `administradors` (
                `ID_ADMIN`, `ADMIN_CLAVE`, `ADMIN_AP_PAT`, `ADMIN_AP_MAT`, `ADMIN_NOMBRE`, `ADMIN_SEXO`, `ADMIN_TIPO_SANGRE`, 
                `ADMIN_FECHA_NAC`, `ADMIN_CALLE`, `ADMIN_COLONIA`, `ADMIN_MUNICIPIO`, `ADMIN_ESTADO`, `ADMIN_MOVIL`, `ADMIN_CASA`, 
                `ADMIN_CORREO`, `ADMIN_CLAVE_PROFESIONAL`, `ADMIN_ESPECIALIDAD`, `ADMIN_FECHA_ING`, `ADMIN_OBSERVACIONES`, `ADMIN_PWD`) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)',
            [
                $informacion->ID_ADMIN,
                $informacion->ADMIN_CLAVE,
                $informacion->ADMIN_AP_PAT,
                $informacion->ADMIN_AP_MAT,
                $informacion->ADMIN_NOMBRE,
                $informacion->ADMIN_SEXO,
                $informacion->ADMIN_TIPO_SANGRE,
                $informacion->ADMIN_FECHA_NAC,
                $informacion->ADMIN_CALLE,
                $informacion->ADMIN_COLONIA,
                $informacion->ADMIN_MUNICIPIO,
                $informacion->ADMIN_ESTADO,
                $informacion->ADMIN_MOVIL,
                $informacion->ADMIN_CASA,
                $informacion->ADMIN_CORREO,
                $informacion->ADMIN_CLAVE_PROFESIONAL,
                $informacion->ADMIN_ESPECIALIDAD,
                $informacion->ADMIN_FECHA_ING,
                $informacion->ADMIN_OBSERVACIONES,
                $informacion->ADMIN_PWD


            ]

        );

        return back();
    }


    //dif
    public function edit($id)
    {



        $selecadmin = Administrador::where('ID_ADMIN', $id)->get();



        return view('update/administrador', compact('selecadmin'));
    }



    public function modificaradmin(Request $informacion, $id)

    {



        $selecalum = DB::table('administradors')->where('ID_ADMIN', $id)->update([



            'ID_ADMIN' => $id,
            'ADMIN_CLAVE' => $informacion->ADMIN_CLAVE,
            'ADMIN_AP_PAT' => $informacion->ADMIN_AP_PAT,
            'ADMIN_AP_MAT' => $informacion->ADMIN_AP_MAT,
            'ADMIN_NOMBRE' => $informacion->ADMIN_NOMBRE,
            'ADMIN_SEXO' => $informacion->ADMIN_SEXO,
            'ADMIN_TIPO_SANGRE' => $informacion->ADMIN_TIPO_SANGRE,
            'ADMIN_FECHA_NAC' => $informacion->ADMIN_FECHA_NAC,
            'ADMIN_CALLE' => $informacion->ADMIN_CALLE,
            'ADMIN_COLONIA' => $informacion->ADMIN_COLONIA,
            'ADMIN_MUNICIPIO' => $informacion->ADMIN_MUNICIPIO,
            'ADMIN_ESTADO' => $informacion->ADMIN_ESTADO,
            'ADMIN_MOVIL' => $informacion->ADMIN_MOVIL,
            'ADMIN_CASA' => $informacion->ADMIN_CASA,
            'ADMIN_CORREO' => $informacion->ADMIN_CORREO,
            'ADMIN_CLAVE_PROFESIONAL' => $informacion->ADMIN_CLAVE_PROFESIONAL,
            'ADMIN_ESPECIALIDAD' => $informacion->ADMIN_ESPECIALIDAD,
            'ADMIN_FECHA_ING' => $informacion->ADMIN_FECHA_ING,
            'ADMIN_OBSERVACIONES' => $informacion->ADMIN_OBSERVACIONES,




        ]);






        return redirect()->route('admin.actualizado');
    }



    public function eliminaradmin($id)
    {

        DB::table('administradors')->where('ID_ADMIN', '=', $id)->delete();




        return redirect()->route('admin.actualizado');
    }
}
