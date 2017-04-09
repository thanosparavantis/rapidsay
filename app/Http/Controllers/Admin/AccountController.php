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

    public function activate(AdminRequest $request, $userId)
    {
        $user = User::findOrFail($userId);

        $this->activation->manuallyActivateUser($user);
        return response()->json([
            'message'   => trans('admin.user.activated'),
            'html'      => view('user.partials.profile.actions.administrate', ['user' => $user])->render(),
        ]);
    }

    public function reputation(AdminRequest $request, $userId)
    {
        $this->validate($request, [
            'reputation' => 'required|integer',
        ]);

        $reputation = $request->reputation;
        $updatedReputation = $reputation;
        $user = User::findOrFail($userId);

        if ($reputation != 0 && $user->reputation + $reputation >= 0)
        {
            $updatedReputation += $user->reputation; // $user->reputation holds incorrect value.
            $user->increment('reputation', $reputation);
            $user->save();
            event(new ReputationModified($userId, $reputation));
        }

        $user = User::findOrFail($userId);

        return response()->json([
            'placement'     => number_format($user->placement()),
            'reputation'    => number_format($updatedReputation),
        ]);
    }

    public function ban(AdminRequest $request, $userId)
    {
        $user = User::findOrFail($userId);
        $user->toggleBan();

        return response()->json([
            'message'   => $user->isBanned() ? trans('admin.user.banned') : trans('admin.user.unbanned'),
            'html'      => view('user.partials.profile.actions.administrate', ['user' => $user])->render(),
        ]);
    }

    public function banIp(AdminRequest $request, $userId)
    {
        $user = User::findOrFail($userId);
        $user->toggleIpBan();

        return response()->json([
            'message'   => $user->isIpBanned() ? trans('admin.user.banned') : trans('admin.user.unbanned'),
            'html'      => view('user.partials.profile.actions.administrate', ['user' => $user])->render(),
        ]);
    }

    public function delete(AdminRequest $request, $userId)
    {
        $user = User::findOrFail($userId);
        $user->delete();

        return response()->json([
            'message'   => 'The user has been deleted.',
            'target'    => route('home'),
        ]);
    }
}
