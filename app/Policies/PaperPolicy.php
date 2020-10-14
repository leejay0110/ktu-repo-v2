<?php

namespace App\Policies;

use App\Models\Paper;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PaperPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any papers.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the paper.
     *
     * @param  \App\User  $user
     * @param  \App\Paper  $paper
     * @return mixed
     */
    public function view(User $user, Paper $paper)
    {
        return $user->id == $paper->user_id;
    }

    /**
     * Determine whether the user can create papers.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the paper.
     *
     * @param  \App\User  $user
     * @param  \App\Paper  $paper
     * @return mixed
     */
    public function update(User $user, Paper $paper)
    {
        return $user->id == $paper->user_id;
    }

    /**
     * Determine whether the user can delete the paper.
     *
     * @param  \App\User  $user
     * @param  \App\Paper  $paper
     * @return mixed
     */
    public function delete(User $user, Paper $paper)
    {
        return $user->id == $paper->user_id;
    }

    /**
     * Determine whether the user can restore the paper.
     *
     * @param  \App\User  $user
     * @param  \App\Paper  $paper
     * @return mixed
     */
    public function restore(User $user, Paper $paper)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the paper.
     *
     * @param  \App\User  $user
     * @param  \App\Paper  $paper
     * @return mixed
     */
    public function forceDelete(User $user, Paper $paper)
    {
        //
    }
}
