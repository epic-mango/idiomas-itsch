<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidaAdmin extends FormRequest
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

            'ID_ADMIN' => 'required|max:30',
            'ADMIN_CLAVE' => 'required|max:30',
            'ADMIN_AP_PAT' => 'required|max:30',
            'ADMIN_AP_MAT' => 'max:30',
            'ADMIN_NOMBRE' => 'required|max:30',
            'ADMIN_SEXO' => 'required',
            'ADMIN_TIPO_SANGRE' => 'required|max:5',
            'ADMIN_FECHA_NAC' => 'required|date',
            'ADMIN_CALLE' => 'required|max:30',
            'ADMIN_COLONIA' => 'required|max:30',
            'ADMIN_MUNICIPIO' => 'required|max:30',
            'ADMIN_ESTADO' => 'required|max:30',
            'ADMIN_MOVIL' => 'required|numeric|min:1',
            'ADMIN_CASA' =>  'required|numeric|min:1',
            'ADMIN_CORREO' => 'required|max:30|email',
            'ADMIN_CLAVE_PROFESIONAL' => 'required|max:30',
            'ADMIN_ESPECIALIDAD' => 'required|max:30',
            'ADMIN_FECHA_ING' => 'required|date',
            'ADMIN_OBSERVACIONES' => 'required|max:500',
            'ADMIN_PWD' => 'required|max:30'

        ];
    }
}
