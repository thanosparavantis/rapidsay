<?php

namespace Forum\Http\Controllers;

use App;
use Illuminate\Http\Request;

use Forum\Http\Requests;
use Forum\Http\Controllers\Controller;

class LocaleController extends Controller
{
    public function change(Request $request)
    {
        if (array_key_exists($request->locale, config('languages')))
        {
            if (auth()->check())
            {
                $user = auth()->user();
                $user->locale = $request->locale;
                $user->save();
            }

            $cookie = cookie()->forever('language', $request->locale);
            return redirect()->back()->withCookie($cookie);
        }

        return redirect()->back();
    }
}
