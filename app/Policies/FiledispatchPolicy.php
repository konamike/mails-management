<?php

namespace App\Policies;

use App\Models\Filedispatch;
use App\Models\User;

class FiledispatchPolicy
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
     public function view(User $user, Filedispatch $Filedispatch): bool
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
     public function update(User $user, Filedispatch $Filedispatch): bool
     {
         return $user->is_Admin() || $user->is_User();
     }
 
     /**
      * Determine whether the user can delete the model.
      */
     public function delete(User $user, Filedispatch $Filedispatch): bool
     {
         return $user->is_Admin();
     }
 
     /**
      * Determine whether the user can restore the model.
      */
     public function restore(User $user, Filedispatch $Filedispatch): bool
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
