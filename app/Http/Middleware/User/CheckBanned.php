<?php

namespace Forum\Http\Middleware\User;

use Auth;
use Closure;
use Illuminate\Contracts\Auth\Authenticatable;

class CheckBanned
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
        if (Auth::check() && Auth::user()->banned)
        {
            Auth::logout();
            return redirect()->route('login')->with('error', trans('auth.banned'));
        }
        return $next($request);
    }
}
