<?php

namespace App\Policies;

use App\Models\Letterdispatch;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class LetterdispatchPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->is_Admin()  || $user->is_User() ;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Letterdispatch $letterdispatch): bool
    {
        return $user->is_Admin() || $user->is_User() ;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->is_Admin() || $user->is_User() ;

    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Letterdispatch $letterdispatch): bool
    {
        return $user->is_Admin() || $user->is_User();

    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Letterdispatch $letterdispatch): bool
    {
        return $user->is_Admin() ;

    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Letterdispatch $letterdispatch): bool
    {
        return $user->is_Admin() ;

    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Letterdispatch $letterdispatch): bool
    {
        return $user->is_Admin() ;

    }
}
