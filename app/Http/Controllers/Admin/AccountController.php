<?php

namespace Forum\Http\Controllers\Admin;

use Auth;
use Hash;
use Forum\User;
use Forum\Activation\ActivationService;
use Forum\Http\Requests\Admin\AdminRequest;
use Forum\Events\Admin\ReputationModified;
use Forum\Http\Controllers\Controller;

class AccountController extends Controller
{
    private $activation;

    public function __construct(ActivationService $activation)
    {
        $this->middleware('auth');
        $this->middleware('admin');

        $this->activation = $activation;
    }

    public function ban(AdminRequest $request, $userId)
    {
        $user = User::findOrFail($userId);

        $user->banned = $user->banned ? false : true;
        $user->save();
        return redirect()->route('user-profile', $user->username)->with('success', $user->banned ? trans('admin.user.banned') : trans('admin.user.unbanned'));
    }

    public function activate(AdminRequest $request, $userId)
    {
        $user = User::findOrFail($userId);

        $this->activation->manuallyActivateUser($user);
        return redirect()->route('user-profile', $user->username)->with('success', trans('admin.user.activated'));
    }

    public function reset(AdminRequest $request, $userId)
    {
        $user = User::findOrFail($userId);

        $raw = str_random(8);
        $hashed = Hash::make($raw);
        $user->password = $hashed;
        $user->save();
        return redirect()->route('user-profile', $user->username)->with('success', trans('admin.user.reset', ['code' => $raw]));
    }

    public function reputation(AdminRequest $request, $userId)
    {
        $this->validate($request, [
            'reputation' => 'required|integer',
        ]);

        $reputation = $request->reputation;
        $user = User::findOrFail($userId);

        if ($reputation != 0 && $user->reputation + $reputation >= 0)
        {
            $user->increment('reputation', $reputation);
            $user->save();
            event(new ReputationModified($userId, $reputation));
        }

        return response()->json(['OK']);
    }
}
