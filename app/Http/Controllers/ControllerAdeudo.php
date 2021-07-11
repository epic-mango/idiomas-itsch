<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Inscripcion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControllerAdeudo extends Controller
{

    public function mostadeudo()
    {
        //para llenar tabla
        $selecadeudo = DB::table('adeudos')
            ->join('alumnos', 'alumnos.ID_ALUMNO', '=', 'adeudos.ADEUDO_ID_ALUMNO')

            ->select(
                'alumnos.ALUMNO_NOMBRE',
                'alumnos.ALUMNO_APELLIDO_MAT',
                'alumnos.ALUMNO_APELLIDO_PAT',

                'adeudos.ID_ADEUDO',
                'adeudos.ADEUDO_MONTO_RESTANTE'


            )->get();

        $selecalum = Alumno::select(

            'ALUMNO_NOMBRE',
            'ALUMNO_APELLIDO_MAT',
            'ALUMNO_APELLIDO_PAT',
            'ID_ALUMNO',

        )->get();
        $selecinscripcion = Inscripcion::select(


            'ID_INSCRIPCION'

        )->get();


        return view('adeudo', compact('selecalum', 'selecinscripcion', 'selecadeudo'));
    }



    public function agregaadeudo(Request $informacion)
    {

        DB::insert(

            'INSERT INTO `adeudos` (`ID_ADEUDO`, `ADEUDO_ID_ALUMNO`, `DEU_NOM`, `ADEUDO_ID_INSCRIPCION`, `ADEUDO_MONTO`,
             `ADEUDO_FECHA`, `ADEUDO_MONTO_RES`, `ADEUDO_MONTO_ACTUAL`, `ADEUDO_FECHA_NUE`, `ADEUDO_MONTO_RESTANTE`, `DEU_CON`,
              `DEU_PER`, `DEU_AN`, `ADEUDO_OBSERVACIONES`) 
            VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)',
            [

                $informacion->ID_ADEUDO,
                $informacion->ADEUDO_ID_ALUMNO,
                $informacion->DEU_NOM,
                $informacion->ADEUDO_ID_INSCRIPCION,
                $informacion->ADEUDO_MONTO,
                $informacion->ADEUDO_FECHA,
                $informacion->ADEUDO_MONTO_RES,
                $informacion->ADEUDO_MONTO_ACTUAL,
                $informacion->ADEUDO_FECHA_NUE,
                $informacion->ADEUDO_MONTO_RESTANTE,
                $informacion->DEU_CON,
                $informacion->DEU_PER,
                $informacion->DEU_AN,
                $informacion->ADEUDO_OBSERVACIONES

            ]
        );

        return back();
    }

    public function edit($id)
    {


        $selecadeudo = DB::table('adeudos')
            ->join('alumnos', 'alumnos.ID_ALUMNO', '=', 'adeudos.ADEUDO_ID_ALUMNO')
            ->join('inscripcions', 'inscripcions.ID_INSCRIPCION', '=', 'adeudos.ADEUDO_ID_INSCRIPCION')
            ->select(
                'alumnos.*',
                'inscripcions.*',
                'adeudos.*',


            )->get();

        $selecalum = Alumno::select(

            'ALUMNO_NOMBRE',
            'ALUMNO_APELLIDO_MAT',
            'ALUMNO_APELLIDO_PAT',
            'ID_ALUMNO',

        )->get();
        $selecinscripcion = Inscripcion::select(


            'ID_INSCRIPCION'

        )->get();


        return view('update/adeudo', compact('selecalum', 'selecinscripcion', 'selecadeudo'));
    }



    public function modificaradeudo(Request $informacion, $id)

    {



        $selecalum = DB::table('adeudos')->where('ID_ADEUDO', $id)->update([

            'ID_ADEUDO' => $id,
            'ADEUDO_ID_ALUMNO' => $informacion->ADEUDO_ID_ALUMNO,
            'DEU_NOM' => $informacion->DEU_NOM,
            'ADEUDO_ID_INSCRIPCION' => $informacion->ADEUDO_ID_INSCRIPCION,
            'ADEUDO_MONTO' => $informacion->ADEUDO_MONTO,
            'ADEUDO_FECHA' => $informacion->ADEUDO_FECHA,
            'ADEUDO_MONTO_RES' => $informacion->ADEUDO_MONTO_RES,
            'ADEUDO_MONTO_ACTUAL' => $informacion->ADEUDO_MONTO_ACTUAL,
            'ADEUDO_FECHA_NUE' => $informacion->ADEUDO_FECHA_NUE,
            'ADEUDO_MONTO_RESTANTE' => $informacion->ADEUDO_MONTO_RESTANTE,
            'DEU_CON' => $informacion->DEU_CON,
            'DEU_PER' => $informacion->DEU_PER,
            'DEU_AN' => $informacion->DEU_AN,
            'ADEUDO_OBSERVACIONES' => $informacion->ADEUDO_OBSERVACIONES,






        ]);






        return redirect()->route('adeudo.actualizado');
    }



    public function eliminaradeudo($id)
    {

        DB::table('adeudos')->where('ID_ADEUDO', '=', $id)->delete();




        return redirect()->route('adeudo.actualizado');
    }
}
