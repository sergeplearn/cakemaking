<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;

class adminregistrationPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user):Response
    {
        return $user->user_role === 'super_admin'
        ?Response::allow()
        :Response::denyAsNotFound();
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, User $model): bool
    {
        
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->user_role === 'super_admin';
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, User $model): bool
    {
        return $user->user_role === 'super_admin';
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, User $model): bool
    {
        return $user->user_role === 'super_admin';
       
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, User $model): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, User $model): bool
    {
        //
    }


    public function changeowner(User $user, User $model): bool
    {
        return $user->user_role === 'super_admin';
    }

    
}
