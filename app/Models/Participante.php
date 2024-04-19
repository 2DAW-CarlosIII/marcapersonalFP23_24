<?php
namespace App\Models;

use App\Policies\ParticipantePolicy;
use Illuminate\Database\Eloquent\Builder;

class Participante extends Estudiante
{
    protected $table = 'users';

    public function getPolicyClass()
    {
        return ParticipantePolicy::class;
    }

}