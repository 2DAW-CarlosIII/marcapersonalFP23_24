<?php

namespace App\Policies\BFI2;

use App\Models\Facet;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class FacetPolicy
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
    public function view(?User $user, Facet $facet): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Facet $facet): bool
    {
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Facet $facet): bool
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Facet $facet): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Facet $facet): bool
    {
        //
    }
}
