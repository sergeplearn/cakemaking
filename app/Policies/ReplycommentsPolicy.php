<?php

namespace App\Policies;

use App\Models\replycomment;
use App\Models\User;

class ReplycommentsPolicy
{
    public function before(User $user, string $ability)
    {
        if ($user->user_role === 'admin' || $user->user_role === 'super_admin') {
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
    public function view(User $user, replycomment $replycomment): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {

    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, replycomment $replycomment): bool
    {
        return $user->id === $replycomment->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, replycomment $replycomment): bool
    {
        return $user->id === $replycomment->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, replycomment $replycomment): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, replycomment $replycomment): bool
    {
        //
    }
}
