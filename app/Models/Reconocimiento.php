<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reconocimiento extends Model
{
    use HasFactory;
    protected $fillable = [
        'estudiante_id',
        'actividad_id',

        'docente_validador',
        'documento',
        'fecha'
    ];
}
