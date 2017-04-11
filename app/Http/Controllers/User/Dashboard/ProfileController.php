<?php

namespace Forum\Http\Controllers\User\Dashboard;

use Illuminate\Http\Request;

use Forum\Http\Requests\User\UpdateProfileRequest;
use Forum\Http\Requests;
use Forum\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show()
    {
        return view('user.dashboard.update-profile');
    }

    public function update(UpdateProfileRequest $request)
    {
        $user = auth()->user();

        if ($user->first_name !== $request->first_name)
            $user->first_name = $request->first_name;

        if ($user->last_name !== $request->last_name)
            $user->last_name = $request->last_name;

        if ($user->description !== $request->description)
            $user->description = $request->description;

        if ($request->hasFile('profile_picture'))
            $user->updateProfilePicture($request->file('profile_picture'));

        $response = redirect()->route('dashboard');

        $user->isDirty() || $request->hasFile('profile_picture') ? $response->with('success', trans('user.dashboard.message.profile-updated')) : $response;
        $user->save();

        return $response;
    }

    public function deleteProfilePicture()
    {
        auth()->user()->deleteProfilePicture();
        return redirect()->route('dashboard')->with('success', trans('user.dashboard.message.picture-removed'));
    }
}
