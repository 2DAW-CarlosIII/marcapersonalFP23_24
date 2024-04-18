<?php

namespace App\Policies;

use App\Models\ParticipanteProyecto;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ParticipanteProyectoPolicy
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
    public function view(?User $user, ParticipanteProyecto $participanteProyecto): bool
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
    public function update(User $user, ParticipanteProyecto $participanteProyecto): bool
    {
        return $user->esDocente();
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, ParticipanteProyecto $participanteProyecto): bool
    {
        return $user->esDocente();
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, ParticipanteProyecto $participanteProyecto): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, ParticipanteProyecto $participanteProyecto): bool
    {
        //
    }
}
