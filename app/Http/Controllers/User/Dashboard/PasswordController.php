<?php

namespace Forum\Http\Controllers\User\Dashboard;

use Hash;
use Illuminate\Http\Request;
use Forum\Http\Requests\User\ChangePasswordRequest;
use Forum\Http\Requests;
use Forum\Http\Controllers\Controller;

class PasswordController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show()
    {
        return view('user.dashboard.change-password');
    }

    public function update(ChangePasswordRequest $request)
    {
        if (Hash::check($request->current_password, auth()->user()->password))
        {
            $user = auth()->user();
            $user->password = bcrypt($request->password);
            $user->update();
            return redirect()->route('change-password')->with('success', trans('user.dashboard.message.password-changed'));
        }
        else
        {
            return redirect()->route('change-password')->with('warning', trans('user.dashboard.message.incorrect-password'));
        }
    }
}
