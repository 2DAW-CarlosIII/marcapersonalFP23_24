<?php

namespace App\Policies;

use App\Models\Reconocimiento;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ReconocimientoPolicy
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
    public function view(?User $user, Reconocimiento $reconocimiento): bool
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

     //Verificar rol de usuario para actualizar reconocimiento, si no es docente ni admin, se excluye el campo docente_validador
    public function update(User $user, Reconocimiento $reconocimiento): bool
    {
        if ($user->esDocente() || $user->esAdmin()) {
            return $user->esPropietario($reconocimiento,$reconocimiento->estudiante_id);
        }

        else{
            $reconocimiento = $reconocimiento->except(['docente_validador']);
            return $user->esPropietario($reconocimiento,$reconocimiento->estudiante_id);
        }
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Reconocimiento $reconocimiento): bool
    {
        return $user->esPropietario($reconocimiento,$reconocimiento->estudiante_id);

    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Reconocimiento $reconocimiento): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Reconocimiento $reconocimiento): bool
    {
        //
    }


}
