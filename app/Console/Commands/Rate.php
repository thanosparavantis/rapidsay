<?php

namespace Forum\Console\Commands;

use Forum\Events\Topic\RatingCreated;
use Faker\Factory;
use Forum\User;
use Forum\Post as PostModel;
use Forum\Rating as RatingModel;
use Illuminate\Console\Command;

class Rate extends Command
{
    protected $signature = 'rate';
    protected $description = 'Create a fake rating';

    public function handle()
    {
        $faker = Factory::create();
        $userId = $faker->numberBetween(1, 500);
        $post = PostModel::find($faker->numberBetween(1, PostModel::count()));

        for ($i = 0; $i < 500; $i++)
        {
            if ($post->ratings->where('user_id', $userId)->count())
            {
                $userId = $faker->numberBetween(1, 500);
            }
            else
            {
                break;
            }
        }

        $rating = RatingModel::create([
            'user_id' => $userId,
            'post_id' => $post->id,
        ]);

        event(new RatingCreated($rating));
    }
}