<?php

namespace Forum\Console\Commands;

use Forum\Events\Topic\PostCreated;
use Faker\Factory;
use Forum\User;
use Forum\Post as PostModel;
use Illuminate\Console\Command;

class Post extends Command
{
    protected $signature = 'post';
    protected $description = 'Create a fake post';

    public function handle()
    {
        $faker = Factory::create();
        $title = $faker->realText(90);

        $post = PostModel::create([
            'user_id' => $faker->numberBetween(1, 500),
            'title' => $title,
            'body' => $faker->realText(800),
            'slug' => str_slug($title),
        ]);

        event(new PostCreated($post));
    }
}