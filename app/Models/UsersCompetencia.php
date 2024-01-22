<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersCompetencia extends Model
{
    use HasFactory;
    protected $table = 'users_competencia';

    protected $fillable = [
        'user_id',
        'competencia_id',
        'docente_validador',
    ];
}
