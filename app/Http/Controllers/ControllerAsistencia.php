<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidaAsistencia;
use App\Models\Alumno;
use App\Models\Asistencia;
use App\Models\Docente;
use App\Models\Grupo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControllerAsistencia extends Controller
{
    // 

    public function agregaasistencia(ValidaAsistencia $informacion)
    {

        DB::insert(

            ' INSERT INTO `asistencias` 
        (`ID_ASISTENCIA`, `ASISTENCIA_ID_GRUPO_NOMBRE`, `ASISTENCIA_ID_DOCENTE`, `ASISTENCIA_ID_ALUMNO`, `ASISTENCIA_FECHA`, `ASISTENCIA_CLASE`)
        VALUES (?,?,?,?,?,?)',
            [

                $informacion->ID_ASISTENCIA,
                $informacion->ASISTENCIA_ID_GRUPO_NOMBRE,
                $informacion->ASISTENCIA_ID_DOCENTE,
                $informacion->ASISTENCIA_ID_ALUMNO,
                $informacion->ASISTENCIA_FECHA,
                $informacion->ASISTENCIA_CLASE,

            ]
        );

        return back();
    }


    public function mostasistencia()
    {
        //para llenar tabla

        $selecasistencia = DB::table('asistencias')
            ->join('docentes',  'docentes.ID_DOCENTE', '=', 'asistencias.ASISTENCIA_ID_DOCENTE')
            ->join('alumnos',  'alumnos.ID_ALUMNO', '=', 'asistencias.ASISTENCIA_ID_ALUMNO')
            ->join('grupos',  'grupos.ID_GRUPO_NOMBRE', '=', 'asistencias.ASISTENCIA_ID_GRUPO_NOMBRE')
            ->select('docentes.*', 'grupos.*', 'alumnos.*', 'asistencias.*')->get();
        $selecgrupo = Grupo::select('ID_GRUPO_NOMBRE')->get();
        $selecdocente = Docente::select(
            'ID_DOCENTE',
            'DOCENTE_NOMBRE',
            'DOCENTE_AP_MAT',
            'DOCENTE_AP_PAT',

        )->get();
        $selecalum = Alumno::select(
            'ID_ALUMNO',
            'ALUMNO_APELLIDO_PAT',
            'ALUMNO_APELLIDO_MAT',
            'ALUMNO_NOMBRE',

        )
            ->get();



        return view('asistencia', compact('selecasistencia', 'selecgrupo', 'selecdocente', 'selecalum'));
    }


    public function edit($id)
    {



        $selecasistencia = DB::table('asistencias')
            ->join('docentes',  'docentes.ID_DOCENTE', '=', 'asistencias.ASISTENCIA_ID_DOCENTE')
            ->join('alumnos',  'alumnos.ID_ALUMNO', '=', 'asistencias.ASISTENCIA_ID_ALUMNO')
            ->join('grupos',  'grupos.ID_GRUPO_NOMBRE', '=', 'asistencias.ASISTENCIA_ID_GRUPO_NOMBRE')
            ->select('docentes.*', 'grupos.*', 'alumnos.*', 'asistencias.*')
            ->where('ID_ASISTENCIA', '=', $id)->get();

        $selecgrupo = Grupo::select('ID_GRUPO_NOMBRE')->get();
        $selecdocente = Docente::select(
            'ID_DOCENTE',
            'DOCENTE_NOMBRE',
            'DOCENTE_AP_MAT',
            'DOCENTE_AP_PAT',

        )->get();
        $selecalum = Alumno::select(
            'ID_ALUMNO',
            'ALUMNO_APELLIDO_PAT',
            'ALUMNO_APELLIDO_MAT',
            'ALUMNO_NOMBRE',

        )
            ->get();



        return view('update/asistencia', compact('selecasistencia', 'selecgrupo', 'selecdocente', 'selecalum'));
    }



    public function modificarasistencia(Request $informacion, $id)

    {



        $selecalum = DB::table('asistencias')->where('ID_ASISTENCIA', $id)->update([

            'ID_ASISTENCIA' => $id,
            'ASISTENCIA_ID_GRUPO_NOMBRE' => $informacion->ASISTENCIA_ID_GRUPO_NOMBRE,
            'ASISTENCIA_ID_DOCENTE' => $informacion->ASISTENCIA_ID_DOCENTE,
            'ASISTENCIA_ID_ALUMNO' => $informacion->ASISTENCIA_ID_ALUMNO,
            'ASISTENCIA_FECHA' => $informacion->ASISTENCIA_FECHA,
            'ASISTENCIA_CLASE' => $informacion->ASISTENCIA_CLASE,






        ]);






        return redirect()->route('asistencia.actualizado');
    }



    public function eliminarasistencia($id)
    {

        DB::table('asistencias')->where('ID_ASISTENCIA', '=', $id)->delete();




        return redirect()->route('asistencia.actualizado');
    }
}
