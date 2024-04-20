<?php

namespace App\Policies;

use App\Models\Ciclo;
use App\Models\Estudiante;
use App\Models\User;

class CicloEstudiantePolicy
{

    public function before(User $autenticado, $ability)
    {
        if($autenticado->esAdmin()) return true;
    }

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(?User $autenticado, User $estudiante): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(?User $autenticado, User $estudiante, Ciclo $ciclo): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $autenticado, User $estudiante): bool
    {
        return $autenticado->esPropietario($estudiante, 'id');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $autenticado, User $estudiante, Ciclo $ciclo): bool
    {
        return $autenticado->esPropietario($estudiante, 'id');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $autenticado, User $estudiante, Ciclo $ciclo): bool
    {
        return $autenticado->esPropietario($estudiante, 'id');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $autenticado, User $estudiante, Ciclo $ciclo): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $autenticado, User $estudiante, Ciclo $ciclo): bool
    {
        //
    }
}
