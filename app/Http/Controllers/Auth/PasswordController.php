<?php

namespace Forum\Http\Controllers\Auth;

use Forum\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Forum\User;

class PasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords {
        sendResetLinkEmail as protected traitSendResetLinkEmail;
    }

    protected $redirectTo = '/';

    /**
     * Create a new password controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware());
    }

    public function sendResetLinkEmail(Request $request)
    {
        if (User::checkRequestForBannedIp($request))
            return redirect()->back()->with('error', trans('auth.banned-ip'));
        else if (User::isEmailBanned($request->email))
            return redirect()->back()->with('error', trans('auth.banned-email'));

        return $this->traitSendResetLinkEmail($request);
    }
}
