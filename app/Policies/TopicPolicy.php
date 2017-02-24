<?php

namespace Forum\Policies;

use Forum\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TopicPolicy
{
    use HandlesAuthorization;

    public function before(User $user, $ability)
    {
        if ($user->admin && $ability !== 'report') {
            return true;
        }
    }

    public function edit(User $user, $item)
    {
        return $user->id == $item->user_id;
    }

    public function delete(User $user, $item)
    {
        return $user->id == $item->user_id;
    }

    public function report(User $user, $item)
    {
        return $user->id != $item->user_id && !$user->admin;
    }
}
