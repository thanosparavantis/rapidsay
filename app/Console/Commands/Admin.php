<?php

namespace Forum\Console\Commands;

use Forum\User;
use Illuminate\Console\Command;

class Admin extends Command
{
    protected $signature = 'admin';
    protected $description = 'Create an administrator account';

    public function handle()
    {
        User::create([
            'username' => 'thanos',
            'first_name' => 'Thanos',
            'last_name' => 'Paravantis',
            'email' => 'bebinoulis@gmail.com',
            'password' => bcrypt('password'),
            'admin' => true,
            'activated' => true,
        ]);

        User::create([
            'username' => 'user',
            'email' => 'thanosparavantis@gmail.com',
            'password' => bcrypt('password'),
            'activated' => true,
        ]);
    }
}