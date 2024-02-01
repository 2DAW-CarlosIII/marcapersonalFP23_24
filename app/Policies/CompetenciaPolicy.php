<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Competencia;

class CompetenciaPolicy
{
    public function index(User $user) {
        return true;
    }

    public function show(User $user) {
        return true;
    }

    public function store(User $user)
    {
        return $user->esAdmin();
    }

    public function update(User $user)
    {
        return $user->esAdmin();
    }

    public function destroy(User $user)
    {
        return $user->esAdmin();
    }
}
