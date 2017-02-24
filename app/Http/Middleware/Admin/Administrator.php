<?php

namespace Forum\Http\Middleware\Admin;

use Closure;

class Administrator
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
        if (!$request->user()->admin) {
            abort(404);
        }

        return $next($request);
    }
}
