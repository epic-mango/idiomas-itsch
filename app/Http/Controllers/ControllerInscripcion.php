<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidaInscripcion;
use App\Models\Alumno;
use App\Models\Grupo;
use App\Models\Inscripcion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControllerInscripcion extends Controller
{

    public function mostinscripcion()
    {
        //para llenar tabla
        $selecinscripcion = DB::table('inscripcions')->join('alumnos', 'alumnos.ID_ALUMNO', '=', 'inscripcions.ISCRIPCION_ID_ALUMNO')
            ->select('inscripcions.*', 'alumnos.*')
            ->get();

        $selecalum = Alumno::select(
            'ALUMNO_NOMBRE',
            'ALUMNO_APELLIDO_MAT',
            'ALUMNO_APELLIDO_PAT',
            'ID_ALUMNO',

        )->get();
        $selecgrupo = Grupo::select('ID_GRUPO')->get();

        return view('inscripcion', compact('selecinscripcion', 'selecalum', 'selecgrupo'));
    }

    public function agregainscripcion(ValidaInscripcion $informacion)
    {

        DB::insert(

            'INSERT INTO `inscripcions`
             (`ID_INSCRIPCION`, `ISCRIPCION_ID_ALUMNO`, `INSCRIPCION_ID_GRUPO`, `INSCRIPCION_NUM_FOLIO`,
              `INSCRIPCION_MONTO`, `ISCRIPCION_FECHA`, `ISCRIPCION_ PERIODO`, `INSCRIPCION_ANIO`) 
              VALUES (?,?,?,?,?,?,?,?)',
            [
                $informacion->ID_INSCRIPCION,
                $informacion->INSCRIPCION_ID_ALUMNO,
                $informacion->INSCRIPCION_ID_GRUPO_NOMBRE,
                $informacion->INSCRIPCION_NUM_FOLIO,
                $informacion->INSCRIPCION_MONTO,
                $informacion->ISCRIPCION_FECHA,
                $informacion->INS_PER,
                $informacion->INS_AN

            ]
        );


        return back();
    }

    //dif
    public function edit($id)
    {


        $selecinscripcion = DB::table('inscripcions')
            ->join('alumnos', 'alumnos.ID_ALUMNO', '=', 'inscripcions.INSCRIPCION_ID_ALUMNO')
            ->join('grupos', 'grupos.ID_GRUPO', '=', 'inscripcions.INSCRIPCION_ID_GRUPO')
            ->select('inscripcions.*', 'alumnos.*', 'grupos.*')
            ->where('ID_INSCRIPCION', $id)
            ->get();


        $selecalum = Alumno::select(
            'ALUMNO_NOMBRE',
            'ALUMNO_APELLIDO_MAT',
            'ALUMNO_APELLIDO_PAT',
            'ID_ALUMNO',

        )->get();

        $selecgrupo = Grupo::select('ID_GRUPO')->get();
        return view('update/inscripcion', compact('selecinscripcion', 'selecalum', 'selecgrupo'));
    }



    public function modificarinscripcion(Request $informacion, $id)

    {



        $selecalum = DB::table('inscripcions')->where('ID_INSCRIPCION', $id)->update([


            'ID_INSCRIPCION' => $id,
            'INSCRIPCION_ID_ALUMNO' => $informacion->INSCRIPCION_ID_ALUMNO,
            'INSCRIPCION_ID_GRUPO_NOMBRE' => $informacion->INSCRIPCION_ID_GRUPO_NOMBRE,
            'INSCRIPCION_NUM_FOLIO' => $informacion->INSCRIPCION_NUM_FOLIO,
            'INSCRIPCION_MONTO' => $informacion->INSCRIPCION_MONTO,
            'ISCRIPCION_FECHA' => $informacion->ISCRIPCION_FECHA,
            'INS_PER' => $informacion->INS_PER,
            'INS_AN' => $informacion->INS_AN,







        ]);






        return redirect()->route('inscripcion.actualizado');
    }



    public function eliminarinscripcion($id)
    {

        DB::table('inscripcions')->where('ID_INSCRIPCION', '=', $id)->delete();




        return redirect()->route('inscripcion.actualizado');
    }
}
