<?php

namespace Forum\Providers;

use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'Forum\User'        => 'Forum\Policies\UserPolicy',
        'Forum\Post'        => 'Forum\Policies\TopicPolicy',
        'Forum\Comment'     => 'Forum\Policies\TopicPolicy',
        'Forum\Reply'       => 'Forum\Policies\TopicPolicy',
    ];

    /**
     * Register any application authentication / authorization services.
     *
     * @param  \Illuminate\Contracts\Auth\Access\Gate  $gate
     * @return void
     */
    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);

        //
    }
}
