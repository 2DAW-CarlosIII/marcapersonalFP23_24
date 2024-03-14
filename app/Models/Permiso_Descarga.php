<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permiso_Descarga extends Model
{
    use HasFactory;

    protected $table = 'permisos_descargas';

    protected $fillable = [
        'curriculo_id',
        'empresa_id',
        'validado',
    ];
}
