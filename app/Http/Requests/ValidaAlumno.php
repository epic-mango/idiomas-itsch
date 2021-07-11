<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidaAlumno extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [

            'ALUMNO_APELLIDO_PAT' => 'required|max:30',
            'ALUMNO_APELLIDO_MAT' => 'max:30',
            'ALUMNO_NOMBRE' => 'required|max:30',
            'ALUMNO_SEXO' => 'required',
            'ALUMNO_TIPO_SANGRE' => 'required|max:5',
            'ALUMNO_FECHA_NAC' => 'required|date',
            'ALUMNO_CALLE' => 'required|max:30',
            'ALUMNO_COLONIA' => 'required|max:30',
            'ALUMNO_MUNICIPIO' => 'required|max:30',
            'ALUMNO_ESTADO' => 'required|max:30',
            'ALUMNO_TELEFONO_PER' => 'required|numeric|min:1',
            'ALUMNO_TELEFONO_CASA' => 'required|numeric|min:1',
            'ALUMNO_CORREO' => 'required|email|max:30',
            'ALUMNO_TUTOR_AR_PAT' => 'required|max:30',
            'ALUMNO_TUTOR_AR_MAT' => 'max:30',
            'ALUMNO_TUTOR_NOMBRE' => 'required|max:30',
            'ALUMNO_CARRERA' => 'required|max:30',
            'ALUMNO_FECHA_ING' => 'required|date',
            'ALUMNO_OBSERVACIONES' => 'required|max:500',
            'ALUMNO_PWD' => 'required|max:30',
            'ALU_STA' => 'required|max:2',
            'ALU_ING_PER' => 'required|max:8',
            'ALU_ING_AN' => 'required|min:1|numeric',
            'ALU_INS' => 'required|max:1',
            'ALU_FIN_PER' => 'required|max:8',
            'ALU_SEM' => 'required|min:1|numeric',
            'ALU_FIN_AN' => 'required|min:1|numeric',
            'ALU_MOT_BAJ' => 'required|max:40',
            'ALU_PER_BAJ' => 'required|max:8',
            'ALU_AN_BAJ' => 'required|min:1|numeric'

        ];
    }
}
