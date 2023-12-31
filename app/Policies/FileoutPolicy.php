<?php

namespace App\Policies;

use App\Models\User;
use App\Models\FileOut;

class FileoutPolicy
{
    /**
     * Create a new policy instance.
     */

    public function viewAny(User $user): bool
    {
        return $user->is_Admin() || $user->is_User();
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Fileout $Fileout): bool
    {
        return $user->is_Admin() || $user->is_User();
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->is_Admin() || $user->is_User();
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Fileout $Fileout): bool
    {
        return $user->is_Admin() || $user->is_User();
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Fileout $Fileout): bool
    {
        return $user->is_Admin();
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Fileout $Fileout): bool
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
