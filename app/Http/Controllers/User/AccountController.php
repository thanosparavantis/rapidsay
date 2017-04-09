<?php

namespace Forum\Http\Controllers\User;

use Illuminate\Http\Request;

use Forum\Http\Requests;
use Forum\Http\Controllers\Controller;

class AccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showDelete()
    {
        return view('user.delete');
    }

    public function delete(Request $request)
    {
        $user = auth()->user();
        auth()->logout();
        $user->delete();
        return redirect()->route('home')->with('success', 'Your account has been deleted.');
    }
}
