<?php

namespace App\Policies;

use App\Models\User;
use App\Models\UserCompetencia;
use Illuminate\Auth\Access\Response;

class UserCompetenciaPolicy
{
    /**
     * Perform pre-authorization checks.
     *
     * @param  \App\Models\User  $user
     * @param  string  $ability
     * @return void|bool
     */
    public function before(User $user, $ability)
    {
        if($user->esAdmin()) return true;
    }

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, UserCompetencia $userCompetencia): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->esEstudiante();
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, UserCompetencia $userCompetencia): bool
    {
        return $user->esPropietario($userCompetencia);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, UserCompetencia $userCompetencia): bool
    {
        return $user->esPropietario($userCompetencia);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, UserCompetencia $userCompetencia): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, UserCompetencia $userCompetencia): bool
    {
        //
    }
}
