<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidaDocente;
use App\Models\Administrador;
use App\Models\Alumno;
use App\Models\Docente;
use App\Models\Secretaria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControllerDocente extends Controller
{
    public function mostdocente()
    {
        //para llenar tabla

        $selecdocente = DB::table('docentes')
            ->join('users',  'users.id', '=', 'docentes.DOCENTE_CORREO')
            ->select('users.*', 'docentes.*')->get();





        return view('docente', compact('selecdocente'));
    }

    public function agregadocente(ValidaDocente $informacion)
    {




        $validar = new validar();


        //Condicion de mensaje para informar sin el Id ya esta registrada en otro usuario
        if ($validar->iddocente($informacion) > 0) {

            session()->flash('errorid', 'El ID ingresado ya Existe');
            return back();
        } else {

            //Condicion de mensaje para informar si el Correo ya esta registrado en otro usuario
            if ($validar->emaildocente($informacion) > 0) {
                session()->flash('erroremail', 'El Correo Electronico ingresado ya esta registrado a un usuario');
                return back();
            } else {
                DB::insert(



                    'INSERT INTO `docentes` (
                    `ID_DOCENTE`, `DOCENTE_CLAVE`, `DOCENTE_AP_PAT`, `DOCENTE_AP_MAT`, `DOCENTE_NOMBRE`, `DOCENTE_SEXO`, `DOCENTE_TIPO_SANGRE`,
                     `DOCENTE_FECHA_NAC`, `DOCENTE_CALLE`, `DOCENTE_COLONIA`, `DOCENTE_MUNICIPIO`, `DOCENTE_ESTADO`, `DOCENTE_MOVIL`, `DOCENTE_CASA`, 
                     `DOCENTE_CORREO`, `DOCENTE_GRADO_ESCOLAR`, `DOCENTE_ESPECIALIDAD`, `DOCENTE_FECHA_ING`, `DOCENTE_OBSERVACIONES`)
                      VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)',
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
                        $informacion->DOCENTE_GRADO_ESCOLAR,
                        $informacion->DOCENTE_ESPECIALIDAD,
                        $informacion->DOCENTE_FECHA_ING,
                        $informacion->DOCENTE_OBSERVACIONES,



                    ]

                );
            }
        }



        return back();
    }


    //dif
    public function edit($id)
    {

        // Seleccionamos la informacion del docente a modificar y la mandamos a nueva pantalla

        $selecdocente = Docente::where('ID_DOCENTE', $id)->get();



        return view('update/docente', compact('selecdocente'));
    }



    public function modificardocente(Request $informacion, $id)

    {


        //Validamos que los campos sean correctos
        $informacion->validate([


            'DOCENTE_CLAVE' => 'required|max:30',
            'DOCENTE_AP_PAT' => 'required|max:30',
            'DOCENTE_AP_MAT' => 'max:30',
            'DOCENTE_NOMBRE' => 'required|max:30',
            'DOCENTE_SEXO' => 'required',
            'DOCENTE_TIPO_SANGRE' => 'max:5',
            'DOCENTE_FECHA_NAC' => 'required|date',
            'DOCENTE_CALLE' => 'required|max:30',
            'DOCENTE_COLONIA' => 'required|max:30',
            'DOCENTE_MUNICIPIO' => 'required|max:30',
            'DOCENTE_ESTADO' => 'required|max:30',


            'DOCENTE_GRADO_ESCOLAR' => 'max:30',
            'DOCENTE_ESPECIALIDAD' => 'max:30',
            'DOCENTE_FECHA_ING' => 'required|date',
            'DOCENTE_OBSERVACIONES' => 'required|max:500',
        ]);





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

            'DOCENTE_GRADO_ESCOLAR' =>  $informacion->DOCENTE_GRADO_ESCOLAR,
            'DOCENTE_ESPECIALIDAD' =>  $informacion->DOCENTE_ESPECIALIDAD,
            'DOCENTE_FECHA_ING' =>  $informacion->DOCENTE_FECHA_ING,
            'DOCENTE_OBSERVACIONES' =>  $informacion->DOCENTE_OBSERVACIONES,






        ]);


        return redirect()->route('docente.actualizado');
    }



    public function eliminardocente($id)
    {
        //eliminamos el docente 
        DB::table('docentes')->where('ID_DOCENTE', '=', $id)->delete();




        return redirect()->route('docente.actualizado');
    }
}
