<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CicloEstudiante extends Model
{
    use HasFactory;

    protected $fillable = [
        'ciclo_id',
        'user_id',
    ];

    protected $table = 'users_ciclos';

    protected $primaryKey =  [
        'user_id',
        'ciclo_id',
    ];

    public $incrementing = false;
}
