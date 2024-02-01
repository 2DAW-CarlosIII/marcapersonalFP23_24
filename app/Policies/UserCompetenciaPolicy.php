<?php

namespace App\Policies;

use App\Models\User;
use App\Models\UserCompetencia;

class UserCompetenciaPolicy
{
    public function index(User $user) {
        return true;
    }

    public function show(User $user) {
        return true;
    }

    public function store(User $user)
    {
        return $user->esEstudiante();
    }

    public function update(User $user, UserCompetencia $usercompetencia)
    {
        return $user->id === $usercompetencia->user_id;
    }

    public function destroy(User $user, UserCompetencia $usercompetencia)
    {
        return $user->id === $usercompetencia->user_id;
    }
}
