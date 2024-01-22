<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users_idioma extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'idioma_id',
        'certificado'
    ];
}
