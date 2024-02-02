<?php

namespace App\Policies;

use App\Models\Actividad;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ActividadPolicy
{
    /**
     * Determine whether the user can view any models.
     */

     public function before(User $user, $ability)
{
    if($user->email === env('ADMIN_EMAIL')) return true;
}

    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Actividad $actividad): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return explode("@",$user->email)[1] === env('TEACHER_EMAIL_DOMAIN');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Actividad $actividad): bool
    {
        return $user->id === $actividad->docente_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Actividad $actividad): bool
    {
        return $user->id === $actividad->docente_id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Actividad $actividad): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Actividad $actividad): bool
    {
        //
    }
}
