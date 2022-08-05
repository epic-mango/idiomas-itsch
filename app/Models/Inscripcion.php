<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscripcion extends Model
{
    use HasFactory;

    protected $primaryKey = 'ID_INSCRIPCION';

    public $timestamps = false;

    //atributos asignables en masa
    protected $fillable = [
        'INSCRIPCION_ID_GRUPO',
        'ISCRIPCION_ID_ALUMNO',
        'INSCRIPCION_NUM_FOLIO',
        'INSCRIPCION_MONTO',
        'ISCRIPCION_FECHA',
        'ISCRIPCION_ PERIODO',
        'INSCRIPCION_ANIO',
        'P1',
        'P2',
        'P3',
        'P4',
        'PF',
        'CALIFICACION_FECHA'
    ];
}
