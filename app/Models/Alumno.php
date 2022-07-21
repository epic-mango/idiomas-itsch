<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Livewire\WithPagination;

class Alumno extends Model
{
    use HasFactory;

    //Eliminar marcas de tiempo
    public $timestamps = false;

    //llave primaria    
    protected $primaryKey = 'ID_ALUMNO';

    //deshabilitar autoincremento
    public $incrementing = false;

    public function grupos()
    {
        return $this->belongsToMany(Grupo::class, 'inscripcions', 'ISCRIPCION_ID_ALUMNO', 'INSCRIPCION_ID_GRUPO');
    }

    public function cardex()
    {
        return $this->hasMany(Cardex::class, 'CARDEX_ID_ALUMNO', 'ID_ALUMNO');
    }

    public function lastCardex()
    {
        $modulos = Modulo::join('cardexes', 'modulos.ID_MODULO', '=', 'cardexes.CARDEX_ID_MODULO')
            ->where('CARDEX_ID_ALUMNO', $this->ID_ALUMNO)
            ->get();
        $ultimos = [];

        foreach ($modulos as $modulo) {
            
            $actual = intval(str_replace($modulo->MODULO_ID_PLANESTUDIO."_M", '', $modulo->ID_MODULO));
            

            if (isset($ultimos[$modulo->MODULO_ID_PLANESTUDIO])) {
                $max = $ultimos[$modulo->MODULO_ID_PLANESTUDIO];
                if ($actual > $max) {
                    $ultimos[$modulo->MODULO_ID_PLANESTUDIO] = $actual;
                }
            } else {
                $ultimos[$modulo->MODULO_ID_PLANESTUDIO] = $actual;
            }
        }

        return $ultimos;
    }
}
