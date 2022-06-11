<?php

namespace Database\Seeders;

use App\Models\Docente;
use App\Models\Grupo;
use App\Models\Modulo;
use App\Models\Planestudio;
use Illuminate\Database\Seeder;

class GrupoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $planestudio = new Planestudio();
        $planestudio->ID_PLANESTUDIO = 'PLAN1';
        $planestudio->PLAN_CLAVE = "PLANESTUDIO1";
        $planestudio->PLAN_ID_IDIOMA = "INGLÉS";
        $planestudio->PLAN_IN = "2020-01-01";
        $planestudio->PLAN_FIN = "2020-12-31";
        $planestudio->PLAN_ESTADO = "ACTIVO";
        $planestudio->PLAN_CMOD = "10";
        $planestudio->save();

        $modulo = new Modulo();
        $modulo->ID_MODULO = 'PLAN101';
        $modulo->RETICULA_NOMBRE = "MODL1";
        $modulo->MODULO_ID_PLANESTUDIO = 'PLAN1';
        $modulo->save();

        $grupo = new Grupo();
        $grupo->GRUPO_ID_MODULO = 'PLAN101';
        $grupo->GRUPO_TIPO = "SEMANA";
        $grupo->GRUPO_CLA = "INTERN";
        $grupo->GRUPO_NUM_GRUPO = "1";
        $grupo->GRUPO_DES = "Descripción del grupo";
        $grupo->GRUPO_NUM_ALUMNOS = "0";
        $grupo->GRUPO_LIMITE = "30";
        $grupo->GRUPO_ID_DOCENTE = Docente::all()->random()->ID_DOCENTE;
        $grupo->GRUPO_DIAS = "LUNES";
        $grupo->GRUPO_HORAS = "8:00-9:00";
        $grupo->GRUPO_UBICACION = "D4";
        $grupo->save();
    }
}
