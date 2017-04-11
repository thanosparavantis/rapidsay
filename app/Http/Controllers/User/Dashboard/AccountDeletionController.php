<?php

namespace Forum\Http\Controllers\User\Dashboard;

use Illuminate\Http\Request;

use Forum\Http\Requests;
use Forum\Http\Controllers\Controller;

class AccountDeletionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show()
    {
        return view('user.dashboard.delete-account');
    }

    public function delete(Request $request)
    {
        $user = auth()->user();
        auth()->logout();
        $user->delete();
        return redirect()->route('home')->with('success', 'Your account has been deleted.');
    }
}
