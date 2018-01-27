<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * user can update his profile
     *
     * @param \App\User $user
     * @param User $signedInUser
     * @return bool
     */
    public function update(User $user, User $signedInUser)
    {

        return $signedInUser->id === $user->id;
    }

}
