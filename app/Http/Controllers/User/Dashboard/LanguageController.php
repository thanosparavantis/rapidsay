<?php

namespace Forum\Http\Controllers\User\Dashboard;

use App;
use Illuminate\Http\Request;

use Forum\Http\Requests;
use Forum\Http\Controllers\Controller;

class LanguageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['only' => 'show']);
    }

    public function show()
    {
        return view('user.dashboard.language');
    }

    public function update(Request $request)
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
