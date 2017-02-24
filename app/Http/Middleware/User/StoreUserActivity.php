<?php

namespace Forum\Http\Middleware\User;

use Closure;

class StoreUserActivity
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (auth()->check() && !auth()->user()->isOnline() && auth()->user()->show_online)
        {
            auth()->user()->setOnline();
        }

        return $next($request);
    }
}
