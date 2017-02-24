<?php

namespace Forum\Policies;

use Forum\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function subscribe(User $user, User $subscription)
    {
        return $user->id != $subscription->id;
    }
}
