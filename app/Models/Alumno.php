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
        return $this->belongsTo(Grupo::class, 'inscripcions', 'ISCRIPCION_ID_ALUMNO', 'INSCRIPCION_ID_GRUPO');
    }
}
