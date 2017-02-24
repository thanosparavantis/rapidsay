<?php

namespace Forum\Traits;

use App;
use Carbon\Carbon;

trait ChangesLanguage
{
    protected function changeLanguage($language)
    {
        App::setLocale($language);
        Carbon::setLocale($language);
    }

    protected function fallbackDefaultLanguage()
    {
        $this->changeLanguage(config('app.fallback_locale'));
    }

    protected function isValidLanguageCookie($cookie)
    {
        return $cookie != null && array_key_exists($cookie, config('languages'));
    }
}