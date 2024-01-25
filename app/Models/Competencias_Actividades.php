<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Competencias_Actividades extends Model
{
    use HasFactory;

    protected $fillable = [
        'competencia_id',
        'actividad_id',
    ];

    protected $table = 'competencias_actividades';

    protected $primaryKey =  [
        'competencia_id',
        'actividad_id',
    ];

    public $incrementing = false;
}
