<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCompetencia extends Model
{
    use HasFactory;

    //user_id y competencia_id son claves primarias
    protected $primaryKey = ['user_id', 'competencia_id'];

    protected $fillable = [
        'user_id',
        'competencia_id',
        'docente_validador',
    ];
}
