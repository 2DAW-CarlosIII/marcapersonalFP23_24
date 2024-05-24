<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class IdiomaEstudiante extends Model
{
    use HasFactory;

    protected $fillable = [
        'idioma_id',
        'user_id',
        'nivel',
        'certificado',
    ];

    protected $table = 'users_idiomas';

    protected $primaryKey =  [
        'user_id',
        'idioma_id',
    ];

    public $incrementing = false;

    protected function setKeysForSaveQuery($query)
    {
        $query
            ->where('user_id', '=', $this->getAttribute('user_id'))
            ->where('idioma_id', '=', $this->getAttribute('idioma_id'));

        return $query;
    }
}
