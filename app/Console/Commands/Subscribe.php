<?php

namespace Forum\Console\Commands;

use Forum\Events\User\Subscribed;
use Faker\Factory;
use Forum\User;
use Illuminate\Console\Command;

class Subscribe extends Command
{
    protected $signature = 'subscribe';
    protected $description = 'Create a fake subscription';

    public function handle()
    {
        $faker = Factory::create();

        $user = User::find($faker->numberBetween(1, 500));
        $targetUser = User::find($faker->numberBetween(1, User::count()));

        for ($i = 0; $i < 500; $i++)
        {
            if ($user->id == $targetUser->id || $user->subscriptions->contains($targetUser))
            {
                $targetUser = User::find($faker->numberBetween(1, User::count()));
            }
            else
            {
                break;
            }
        }

        $user->subscriptions()->attach($targetUser);
        event(new Subscribed($user, $targetUser));
    }
}