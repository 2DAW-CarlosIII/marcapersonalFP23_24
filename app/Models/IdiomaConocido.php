<?php
namespace App\Models;

use App\Policies\IdiomaEstudiantePolicy;
use Illuminate\Database\Eloquent\Builder;

class IdiomaConocido extends Idioma
{
    protected $table = 'idiomas';

    public function getPolicyClass()
    {
        return IdiomaEstudiantePolicy::class;
    }

}