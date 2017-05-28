<?php

namespace Forum\Http\Controllers\Auth;

use Auth;
use Validator;
use Forum\User;
use Forum\Traits\ChangesLanguage;
use Forum\Activation\ActivationService;
use Forum\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    use AuthenticatesAndRegistersUsers, ThrottlesLogins, ChangesLanguage;

    protected $redirectTo = '/';

    private $activation;

    public function __construct(ActivationService $activation)
    {
        $this->middleware($this->guestMiddleware(), [
            'except' => [ 'logout' ]
        ]);

        $this->activation = $activation;
    }

    public function register(Request $request)
    {
        if (User::checkRequestForBannedIp($request))
            return $this->handleBannedIp();

        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException($request, $validator);
        }

        $user = $this->create($request->all(), $request->cookie('language'));
        $this->activation->sendMail($user);
        return redirect()->route('login')->with('status', trans('auth.activation.email.alert'));
    }

    public function authenticated(Request $request, $user)
    {
        $user->storeBannedIpAddress($request);

        $banned = $user->isBanned();
        $previouslyIpBanned = User::checkRequestForBannedIp($request);
        $notActivated = !$user->activated;

        if ($banned || $previouslyIpBanned || $notActivated)
        {
            auth()->logout();

            if ($banned)
                return $this->handleBannedLogin($user);
            else if ($previouslyIpBanned)
                return $this->handleBannedIp();
            else
                return $this->handleActivationLogin($user);
        }

        return redirect()->intended($this->redirectPath());
    }

    private function handleBannedLogin($user)
    {
        return redirect()->route('login')->with('error', trans('auth.banned'));
    }

    private function handleBannedIp()
    {
        return redirect()->back()->with('error', trans('auth.banned-ip'));
    }

    private function handleActivationLogin($user)
    {
        if ($this->activation->shouldSend($user))
        {
            $this->activation->sendMail($user);
            return redirect()->route('login')->with('warning', trans('auth.activation.resent', ['email' => $user->email]));
        }

        return redirect()->route('login')->with('warning', trans('auth.activation.remind', ['email' => $user->email]));
    }

    public function activate($token)
    {
        $user = $this->activation->activateUser($token);

        if ($user)
        {
            auth()->login($user);
            return redirect()->intended($this->redirectPath())->with('success', trans('auth.activation.success'));
        }

        abort(404);
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => 'required|alpha_num|max:255|unique:users',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required',
            'g-recaptcha-response' => 'required|captcha',
        ]);
    }

    protected function create(array $data, $languageCookie)
    {
        $user = new User;
        $user->username = $data['username'];
        $user->email = $data['email'];
        $user->password = bcrypt($data['password']);

        if ($this->isValidLanguageCookie($languageCookie)) $user->locale = $languageCookie;

        $user->save();
        return $user;
    }
}
