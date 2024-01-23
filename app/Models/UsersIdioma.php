<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersIdioma extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'idioma_id',
        'nivel',
        'certificado',
    ];

}
