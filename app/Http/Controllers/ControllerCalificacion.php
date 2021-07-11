<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Calificacion;
use App\Models\Docente;
use App\Models\Grupo;
use App\Models\Modulo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControllerCalificacion extends Controller
{

    public function mostcalificacion()
    {
        //para llenar tabla

        $seleccalificacion = DB::table('calificacions')
            ->join('alumnos', 'alumnos.ID_ALUMNO', '=', 'calificacions.CALIFICACION_ID_ALUMNO')
            ->join('docentes',  'docentes.ID_DOCENTE', '=', 'calificacions.CALIFICACION_ID_DOCENTE')
            ->join('grupos',  'grupos.ID_GRUPO_NOMBRE', '=', 'calificacions.CALIFICACION_ID_GRUPO_NOMBRE')
            ->select('docentes.*', 'grupos.*', 'alumnos.*', 'calificacions.*')->get();

        $selecalum = Alumno::select(

            'ALUMNO_NOMBRE',
            'ALUMNO_APELLIDO_MAT',
            'ALUMNO_APELLIDO_PAT',
            'ID_ALUMNO',

        )->get();
        $selecgrupo = Grupo::select('ID_GRUPO_NOMBRE')->get();
        $selecplan = DB::table('plan_estudios')->get();
        $selecmodulo = Modulo::select('ID_MODULO')->get();
        $selecdocente = Docente::select(
            'ID_DOCENTE',
            'DOCENTE_NOMBRE',
            'DOCENTE_AP_MAT',
            'DOCENTE_AP_PAT',
        )->get();

        return view('calificacion', compact('seleccalificacion', 'selecmodulo', 'selecplan', 'selecalum', 'selecgrupo', 'selecdocente'));
    }



    public function agregacalificacion(Request $informacion)
    {
        /*
        DB::insert(

            ' INSERT INTO `calificacions` (`ID_CALIFICACION`, `CALIFICACION_ID_ALUMNO`, `CALIFICACION_ID_GRUPO_NOMBRE`,
             `CALIFICACION_ID_PLANESTUDIO`, `CALIFICACION_ID_MODULO`, `CALIFICACION_ID_DOCENTE`,
              `CALIFICACION_CLASE`, `P1`, `P2`, `P3`, `P4`, `PF`)
             VALUES (?,?,?,?,?,?,?,?,?,?,?,?)',
            [

                $informacion->ID_CALIFICACION,
                $informacion->CALIFICACION_ID_ALUMNO,
                $informacion->CALIFICACION_ID_GRUPO_NOMBRE,
                $informacion->CALIFICACION_ID_PLANESTUDIO,
                $informacion->CALIFICACION_ID_MODULO,
                $informacion->CALIFICACION_ID_DOCENTE,
                $informacion->CALIFICACION_CLASE,
                $informacion->P1,
                $informacion->P2,
                $informacion->P3,
                $informacion->P4,
                $informacion->PF

            ]
        );
        */
        $insert = new Calificacion();
        $insert->ID_CALIFICACION = $informacion->get('ID_CALIFICACION');
        $insert->CALIFICACION_ID_ALUMNO = $informacion->get('CALIFICACION_ID_ALUMNO');
        $insert->CALIFICACION_ID_GRUPO_NOMBRE = $informacion->get('CALIFICACION_ID_GRUPO_NOMBRE');
        $insert->CALIFICACION_ID_PLANESTUDIO = $informacion->get('CALIFICACION_ID_PLANESTUDIO');
        $insert->CALIFICACION_ID_MODULO = $informacion->get('CALIFICACION_ID_MODULO');
        $insert->CALIFICACION_ID_DOCENTE = $informacion->get('CALIFICACION_ID_DOCENTE');
        $insert->CALIFICACION_CLASE = $informacion->get('CALIFICACION_CLASE');
        $insert->P1 = $informacion->get('P1');
        $insert->P2 = $informacion->get('P2');
        $insert->P3 = $informacion->get('P3');
        $insert->P4 = $informacion->get('P4');
        $insert->PF = $informacion->get('PF');
        $insert->save();

        return back();
    }

    public function edit($id)
    {



        $seleccalificacion = DB::table('calificacions')
            ->join('alumnos', 'alumnos.ID_ALUMNO', '=', 'calificacions.CALIFICACION_ID_ALUMNO')
            ->join('docentes',  'docentes.ID_DOCENTE', '=', 'calificacions.CALIFICACION_ID_DOCENTE')
            ->join('grupos',  'grupos.ID_GRUPO_NOMBRE', '=', 'calificacions.CALIFICACION_ID_GRUPO_NOMBRE')
            ->join('modulos',  'modulos.ID_MODULO', '=', 'calificacions.CALIFICACION_ID_MODULO')
            ->join('plan_estudios',  'plan_estudios.ID_PLANESTUDIO', '=', 'calificacions.CALIFICACION_ID_PLANESTUDIO')
            ->select('docentes.*', 'grupos.*', 'alumnos.*', 'calificacions.*', 'plan_estudios.*', 'modulos.*')
            ->where('ID_CALIFICACION', '=', $id)
            ->get();

        $selecalum = Alumno::select(

            'ALUMNO_NOMBRE',
            'ALUMNO_APELLIDO_MAT',
            'ALUMNO_APELLIDO_PAT',
            'ID_ALUMNO',

        )->get();
        $selecgrupo = Grupo::select('ID_GRUPO_NOMBRE')->get();
        $selecplan = DB::table('plan_estudios')->get();
        $selecmodulo = Modulo::select('ID_MODULO')->get();
        $selecdocente = Docente::select(
            'ID_DOCENTE',
            'DOCENTE_NOMBRE',
            'DOCENTE_AP_MAT',
            'DOCENTE_AP_PAT',
        )->get();

        return view('update/calificacion', compact('seleccalificacion', 'selecmodulo', 'selecplan', 'selecalum', 'selecgrupo', 'selecdocente'));
    }



    public function modificarcalificacion(Request $informacion, $id)

    {







        $selecalum = Calificacion::where('ID_CALIFICACION', $id)->update([





            'CALIFICACION_ID_ALUMNO' => $informacion->CALIFICACION_ID_ALUMNO,
            'CALIFICACION_ID_GRUPO_NOMBRE' => $informacion->CALIFICACION_ID_GRUPO_NOMBRE,
            'CALIFICACION_ID_PLANESTUDIO' => $informacion->CALIFICACION_ID_PLANESTUDIO,
            'CALIFICACION_ID_MODULO' => $informacion->CALIFICACION_ID_MODULO,
            'CALIFICACION_ID_DOCENTE' => $informacion->CALIFICACION_ID_DOCENTE,
            'CALIFICACION_CLASE' => $informacion->CALIFICACION_CLASE,
            'P1' => $informacion->P1,
            'P2' => $informacion->P2,
            'P3' => $informacion->P3,
            'P4' => $informacion->P4,
            'PF' => $informacion->PF,




        ]);







        return redirect()->route('calificacion.actualizado');
    }



    public function eliminarcalificacion($id)
    {

        DB::table('calificacions')->where('ID_CALIFICACION', '=', $id)->delete();




        return redirect()->route('calificacion.actualizado');
    }
}
