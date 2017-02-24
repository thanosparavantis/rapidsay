<?php

namespace Forum\Http\Controllers\About;

use Illuminate\Http\Request;

use Forum\Http\Requests;
use Forum\Http\Controllers\Controller;

class AboutController extends Controller
{
    public function showTermsOfUse()
    {
        return view('about.terms-of-use');
    }

    public function showPrivacyPolicy()
    {
        return view('about.privacy-policy');
    }
}
