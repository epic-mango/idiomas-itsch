<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidaAlumno;
use App\Models\Alumno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControllerAlumno extends Controller
{

    public function edit($id)
    {



        $selecalumno = Alumno::where('ID_ALUMNO', $id)->get();




        return view('update/alumno', compact('selecalumno'));
    }

    public function mostalumno()
    {


        $selecalum = Alumno::select(
            'ID_ALUMNO',
            'ALUMNO_APELLIDO_PAT',
            'ALUMNO_APELLIDO_MAT',
            'ALUMNO_NOMBRE',
            'ALUMNO_SEXO',
            'ALUMNO_FECHA_NAC'
        )
            ->get();



        return view('consulta', compact('selecalum'));
    }

    public function agregaalumno(ValidaAlumno $informacion)

    {






        DB::insert(
            'INSERT INTO `alumnos` (
            `ID_ALUMNO`, `ALUMNO_APELLIDO_PAT`, `ALUMNO_APELLIDO_MAT`, `ALUMNO_NOMBRE`, `ALUMNO_SEXO`, `ALUMNO_TIPO_SANGRE`, 
            `ALUMNO_FECHA_NAC`, `ALUMNO_CALLE`, `ALUMNO_COLONIA`, `ALUMNO_MUNICIPIO`, `ALUMNO_ESTADO`, `ALUMNO_TELEFONO_PER`, 
            `ALUMNO_TELEFONO_CASA`, `ALUMNO_CORREO`, `ALUMNO_TUTOR_AR_PAT`, `ALUMNO_TUTOR_AR_MAT`, `ALUMNO_TUTOR_NOMBRE`, `ALUMNO_CARRERA`,
             `ALUMNO_FECHA_ING`, `ALUMNO_OBSERVACIONES`, `ALUMNO_PWD`, `ALU_STA`, `ALU_ING_PER`, `ALU_ING_AN`, `ALU_INS`, `ALU_FIN_PER`, `ALU_SEM`,
              `ALU_FIN_AN`, `ALU_MOT_BAJ`, `ALU_PER_BAJ`, `ALU_AN_BAJ`) 
              VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?, ?, ?, ?, ?)',
            [
                $informacion->ID_ALUMNO,
                $informacion->ALUMNO_APELLIDO_PAT,
                $informacion->ALUMNO_APELLIDO_MAT,
                $informacion->ALUMNO_NOMBRE,
                $informacion->ALUMNO_SEXO,
                $informacion->ALUMNO_TIPO_SANGRE,
                $informacion->ALUMNO_FECHA_NAC,
                $informacion->ALUMNO_CALLE,
                $informacion->ALUMNO_COLONIA,
                $informacion->ALUMNO_MUNICIPIO,
                $informacion->ALUMNO_ESTADO,
                $informacion->ALUMNO_TELEFONO_PER,
                $informacion->ALUMNO_TELEFONO_CASA,
                $informacion->ALUMNO_CORREO,
                $informacion->ALUMNO_TUTOR_AR_PAT,
                $informacion->ALUMNO_TUTOR_AR_MAT,
                $informacion->ALUMNO_TUTOR_NOMBRE,
                $informacion->ALUMNO_CARRERA,
                $informacion->ALUMNO_FECHA_ING,
                $informacion->ALUMNO_OBSERVACIONES,
                $informacion->ALUMNO_PWD,
                $informacion->ALU_STA,
                $informacion->ALU_ING_PER,
                $informacion->ALU_ING_AN,
                $informacion->ALU_INS,
                $informacion->ALU_FIN_PER,
                $informacion->ALU_SEM,
                $informacion->ALU_FIN_AN,
                $informacion->ALU_MOT_BAJ,
                $informacion->ALU_PER_BAJ,
                $informacion->ALU_AN_BAJ

            ]
        );



        return  back();
    }

    public function modificaralumno(Request $informacion, $id)

    {



        $selecalum = DB::table('alumnos')->where('ID_ALUMNO', $id)->update([



            'ID_ALUMNO' => $id,
            'ALUMNO_APELLIDO_PAT' => $informacion->ALUMNO_APELLIDO_PAT,
            'ALUMNO_APELLIDO_MAT' => $informacion->ALUMNO_APELLIDO_MAT,
            'ALUMNO_NOMBRE' => $informacion->ALUMNO_NOMBRE,
            'ALUMNO_SEXO' => $informacion->ALUMNO_SEXO,
            'ALUMNO_TIPO_SANGRE' => $informacion->ALUMNO_TIPO_SANGRE,
            'ALUMNO_FECHA_NAC' => $informacion->ALUMNO_FECHA_NAC,
            'ALUMNO_CALLE' => $informacion->ALUMNO_CALLE,
            'ALUMNO_COLONIA' => $informacion->ALUMNO_COLONIA,
            'ALUMNO_MUNICIPIO' => $informacion->ALUMNO_MUNICIPIO,
            'ALUMNO_ESTADO' => $informacion->ALUMNO_ESTADO,
            'ALUMNO_TELEFONO_PER' => $informacion->ALUMNO_TELEFONO_PER,
            'ALUMNO_TELEFONO_CASA' => $informacion->ALUMNO_TELEFONO_CASA,
            'ALUMNO_CORREO' => $informacion->ALUMNO_CORREO,
            'ALUMNO_TUTOR_AR_PAT' => $informacion->ALUMNO_TUTOR_AR_PAT,
            'ALUMNO_TUTOR_AR_MAT' => $informacion->ALUMNO_TUTOR_AR_MAT,
            'ALUMNO_TUTOR_NOMBRE' => $informacion->ALUMNO_TUTOR_NOMBRE,
            'ALUMNO_CARRERA' => $informacion->ALUMNO_CARRERA,
            'ALUMNO_FECHA_ING' => $informacion->ALUMNO_FECHA_ING,
            'ALUMNO_OBSERVACIONES' => $informacion->ALUMNO_OBSERVACIONES,
            'ALU_STA' => $informacion->ALU_STA,
            'ALU_ING_PER' => $informacion->ALU_ING_PER,
            'ALU_ING_AN' => $informacion->ALU_ING_AN,
            'ALU_INS' => $informacion->ALU_INS,
            'ALU_FIN_PER' => $informacion->ALU_FIN_PER,
            'ALU_SEM' => $informacion->ALU_SEM,
            'ALU_FIN_AN' => $informacion->ALU_FIN_AN,
            'ALU_MOT_BAJ' => $informacion->ALU_MOT_BAJ,
            'ALU_PER_BAJ' => $informacion->ALU_PER_BAJ,
            'ALU_AN_BAJ' => $informacion->ALU_AN_BAJ,

        ]);






        return redirect()->route('alumno.actualizado');
    }


    public function eliminaralumno($id)
    {

        DB::table('alumnos')->where('ID_ALUMNO', '=', $id)->delete();




        return redirect()->route('alumno.actualizado');
    }
}
