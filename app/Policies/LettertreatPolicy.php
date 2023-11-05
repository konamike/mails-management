<?php

namespace App\Policies;

use App\Models\Lettertreat;
use App\Models\User;

class LettertreatPolicy
{

    public function viewAny(User $user): bool
    {
        return $user->is_Admin() || $user->is_Engineer();
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Lettertreat $Lettertreat): bool
    {
        return $user->is_Admin() || $user->is_Engineer();
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->is_Admin() || $user->is_Engineer();
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Lettertreat $Lettertreat): bool
    {
        return $user->is_Admin() || $user->is_Engineer();
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Lettertreat $Lettertreat): bool
    {
        return $user->is_Admin();
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Lettertreat $Lettertreat): bool
    {
        return $user->is_Admin();
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user): bool
    {
        return $user->is_Admin();
    }

        /**
     * Determine whether the user can bulk delete the model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->is_Admin();
    }

    /**
     * Determine whether the user can bulk restore the model.
     */
    public function restoreAny(User $user): bool
    {
        return $user->is_Admin();
    }

    /**
     * Determine whether the user can bulk permanently delete the model.
     */
    public function forceDeleteAny(User $user): bool
    {
        return $user->is_Admin();
    }
}
