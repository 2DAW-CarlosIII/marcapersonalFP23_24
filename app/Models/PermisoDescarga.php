<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermisoDescarga extends Model
{
    use HasFactory;

    protected $table = 'permisos_descargas';

    protected $fillable = [
        'empresa_id',
        'curriculo_id',
        'validado',
    ];
}
