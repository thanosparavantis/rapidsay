<?php

namespace Forum\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        Commands\Admin::class,
        Commands\Post::class,
        Commands\Comment::class,
        Commands\Reply::class,
        Commands\Rate::class,
        Commands\Subscribe::class,
        Commands\Email::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('email notifications')->weekly()->fridays()->at('14:15')->timezone('Europe/Athens');
    }
}
