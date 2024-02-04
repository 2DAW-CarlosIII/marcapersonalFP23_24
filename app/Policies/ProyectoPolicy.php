<?php

namespace App\Policies;

use App\Models\Proyecto;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ProyectoPolicy
{

    public function before(User $user, $ability)
    {
        if($user->esAdmin()) return true;
    }
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(?User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(?User $user, Proyecto $proyecto): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->esDocente();
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Proyecto $proyecto): bool
    {
        return $user->esPropietario($proyecto, 'docente_id');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Proyecto $proyecto): bool
    {
        return $user->esPropietario($proyecto, 'docente_id');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Proyecto $proyecto): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Proyecto $proyecto): bool
    {
        //
    }

}
