<?php

namespace App\Policies;

use App\Models\upload_imd;
use App\Models\User;

class Upload_img
{
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
    public function view(User $user, upload_imd $uploadImd): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, upload_imd $uploadImd): bool
    {
        return $user->id === $uploadImd->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, upload_imd $uploadImd): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, upload_imd $uploadImd): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, upload_imd $uploadImd): bool
    {
        //
    }
}
