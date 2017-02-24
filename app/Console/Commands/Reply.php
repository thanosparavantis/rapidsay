<?php

namespace Forum\Console\Commands;

use Forum\Events\Topic\ReplyCreated;
use Faker\Factory;
use Forum\User;
use Forum\Comment as CommentModel;
use Forum\Reply as ReplyModel;
use Illuminate\Console\Command;

class Reply extends Command
{
    protected $signature = 'reply';
    protected $description = 'Create a fake reply';

    public function handle()
    {
        $faker = Factory::create();

        $reply = ReplyModel::create([
            'user_id' => $faker->numberBetween(1, 500),
            'comment_id' => $faker->numberBetween(1, CommentModel::count()),
            'body' => $faker->realText(300),
        ]);

        event(new ReplyCreated($reply));
    }
}