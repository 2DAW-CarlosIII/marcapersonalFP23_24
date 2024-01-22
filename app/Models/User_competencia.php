<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_competencia extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'competencia_id',
        'docente_validador',
    ];

    protected $table = 'users_competencias';

}
