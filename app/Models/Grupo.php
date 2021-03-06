<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    use HasFactory;

    //Deshabilitar marcas de tiempo
    public $timestamps = false;

    //deshabilitar autoincremento
    public $incrementing = false;

    //Especificamos el nombre de campo para la llave primaria
    protected $primaryKey = 'ID_GRUPO';

    //Atributos de Grupo asignables en masa
    protected $fillable = [
        'GRUPO_NOMBRE',
        'GRUPO_ID_MODULO',
        'GRUPO_TIPO',
        'GRUPO_CLA',
        'GRUPO_NUM_GRUPO',
        'GRUPO_DES',
        'GRUPO_NUM_ALUMNOS',
        'GRUPO_LIMITE',
        'GRUPO_ID_DOCENTE',
        'GRUPO_DIAS',
        'GRUPO_HORAS',
        'GRUPO_UBICACION',
    ];

    //Atributos no asignables en masa
    protected $guarded = [
        'ID_GRUPO',

    ];

    //Relaciones
    public function modulo()
    {
        return $this->belongsTo(Modulo::class, 'GRUPO_ID_MODULO');
    }

    public function docente()
    {
        return $this->hasOne(Docente::class, 'ID_DOCENTE', 'GRUPO_ID_DOCENTE');
    }

    //Relación varios a varios a través de la tabla inscripcions
    public function alumnos()
    {
        return $this->belongsToMany(Alumno::class, 'inscripcions', 'INSCRIPCION_ID_GRUPO', 'ISCRIPCION_ID_ALUMNO');
    }

    public function inscripciones()
    {
        return $this->hasMany(Inscripcion::class, 'INSCRIPCION_ID_GRUPO', 'ID_GRUPO');
    }
}
