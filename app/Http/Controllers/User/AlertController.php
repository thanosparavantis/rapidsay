<?php

namespace Forum\Http\Controllers\User;

use Illuminate\Http\Request;

use Forum\Http\Requests;
use Forum\Http\Requests\User\CloseAnnouncement;
use Forum\Http\Requests\User\CloseHelloTip;
use Forum\Http\Controllers\Controller;

class AlertController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function closeAnnouncement(CloseAnnouncement $request)
    {
        $user = auth()->user();
        $user->closeAnnouncement();
        return response()->json(['OK']);
    }
}
