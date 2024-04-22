<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IdiomaEstudiante extends Model
{
    use HasFactory;

    protected $fillable = [
        'idioma_id',
        'user_id',
    ];

    protected $table = 'users_idiomas';

    protected $primaryKey =  [
        'user_id',
        'idioma_id',
    ];

    public $incrementing = false;
}
