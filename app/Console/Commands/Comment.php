<?php

namespace Forum\Console\Commands;

use Forum\Events\Topic\CommentCreated;
use Faker\Factory;
use Forum\User;
use Forum\Post as PostModel;
use Forum\Comment as CommentModel;
use Illuminate\Console\Command;

class Comment extends Command
{
    protected $signature = 'comment';
    protected $description = 'Create a fake comment';

    public function handle()
    {
        $faker = Factory::create();

        $comment = CommentModel::create([
            'user_id' => $faker->numberBetween(1, 500),
            'post_id' => $faker->numberBetween(1, PostModel::count()),
            'body' => $faker->realText(300),
        ]);

        event(new CommentCreated($comment));
    }
}