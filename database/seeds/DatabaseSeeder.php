<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Forum\User::class, 500)->create()->each(function ($user) {
            $user->save();
        });

        factory(Forum\Post::class, 500)->create()->each(function ($post) {
            $post->save();
        });

        factory(Forum\Comment::class, 500)->create()->each(function ($comment) {
            $comment->save();
        });

        factory(Forum\Reply::class, 500)->create()->each(function ($reply) {
            $reply->save();
        });

        factory(Forum\Rating::class, 500)->create()->each(function ($rating) {
            $rating->save();
        });
    }
}
