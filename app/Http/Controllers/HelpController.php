<?php

namespace Forum\Http\Controllers;

use Illuminate\Http\Request;

use Forum\Http\Requests;

class HelpController extends Controller
{
    public function show($section = null, $article = null)
    {
        $articleView = 'help.sections.' . $section . '.' . $article;

        if ($article && view()->exists($articleView)) {
            return view($articleView);
        }

        return view('help.default');

    }
}
