<?php

namespace App\Policies;

use App\Models\newcake;
use App\Models\User;

class CakePolicy
{
    public function before(User $user, string $ability)
    {
        if ($user->user_role === 'super_admin') {
            return true;
        }

        return null;
    }

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, newcake $newcake): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->user_role === 'admin';
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, newcake $newcake): bool
    {
        return $user->user_role === 'admin';
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, newcake $newcake): bool
    {
        return $user->user_role === 'admin';
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, newcake $newcake): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, newcake $newcake): bool
    {
        //
    }

    public function userview(User $user, newcake $newcake): bool
    {
        return true;
    }
}
