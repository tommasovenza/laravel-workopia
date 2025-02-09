<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Job;

class JobPolicy
{
    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Job $job): bool
    {
        //
        return $user->id === $job->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Job $job): bool
    {
        //
        return $user->id === $job->user_id;
    }
}
