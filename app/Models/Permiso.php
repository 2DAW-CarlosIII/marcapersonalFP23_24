<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permiso extends Model
{
    use HasFactory;

     protected $fillable = [
        'empresa_id',
        'curriculo_id',
        'validado'
    ];
}
