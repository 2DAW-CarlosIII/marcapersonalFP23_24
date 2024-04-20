<?php
namespace App\Models;

use App\Policies\CicloEstudiantePolicy;
use Illuminate\Database\Eloquent\Builder;

class CicloEstudiado extends Ciclo
{
    protected $table = 'ciclos';

    public function getPolicyClass()
    {
        return CicloEstudiantePolicy::class;
    }

}