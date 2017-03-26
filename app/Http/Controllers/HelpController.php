<?php

namespace Forum\Http\Controllers;

use Illuminate\Http\Request;

use Forum\Http\Requests;

class HelpController extends Controller
{
    public function show($section = null, $article = null)
    {
        $articleView = 'help.sections.' . $section . '.' . $article;

        if ($section || $article)
        {
            if (view()->exists($articleView))
                return view($articleView);
            else
                abort(404);
        }

        return view('help.default');

    }
}
