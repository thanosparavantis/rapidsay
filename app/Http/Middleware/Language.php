<?php

namespace Forum\Http\Middleware;

use Forum\Traits\ChangesLanguage;
use Closure;

class Language
{
    use ChangesLanguage;

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $cookie = $request->cookie('language');

        if ($this->isValidLanguageCookie($cookie))
        {
            if (auth()->check() && auth()->user()->locale !== $cookie)
            {
                $user = auth()->user();
                $user->locale = $cookie;
                $user->save();
            }

            $this->changeLanguage($cookie);
        }
        else
        {
            $this->fallbackDefaultLanguage();
        }

        return $next($request);
    }
}
