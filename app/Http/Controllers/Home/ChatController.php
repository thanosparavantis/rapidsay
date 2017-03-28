<?php

namespace Forum\Http\Controllers\Home;

use Illuminate\Http\Request;

use Forum\Http\Requests;
use Forum\Http\Controllers\Controller;

class ChatController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show()
    {
        return view('home.chat');
    }
}
