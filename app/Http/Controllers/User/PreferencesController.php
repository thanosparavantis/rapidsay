<?php

namespace Forum\Http\Controllers\User;

use Storage;
use Auth;
use Hash;
use Forum\User;
use Forum\Jobs\User\UpdateProfilePicture;
use Forum\Http\Requests\User\ChangePasswordRequest;
use Forum\Http\Requests\User\UpdateProfileRequest;
use Forum\Http\Controllers\Controller;

class PreferencesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show()
    {
        return view('user.preferences');
    }

    public function updateProfile(UpdateProfileRequest $request)
    {
        $user = auth()->user();
        $this->updateFullNameIfNeeded($user, $request->first_name, $request->last_name);
        $this->updateDescriptionIfNeeded($user, $request->description);
        $pictureUpdated = $this->updateProfilePictureIfNeeded($user, $request);

        $response = redirect()->route('preferences');
        $user->isDirty() || $pictureUpdated ? $response->with('success', trans('user.preferences.updated')) : $response;
        $user->save();
        return $response;
    }

    private function updateFullNameIfNeeded(User $user, $firstName, $lastName)
    {
        if ($user->first_name != $firstName) {
            $user->first_name = $firstName;
        }

        if ($user->last_name != $lastName) {
            $user->last_name = $lastName;
        }
    }

    private function updateDescriptionIfNeeded(User $user, $newDescription)
    {
        if ($user->description != $newDescription) {
            $user->description = $newDescription;
        }
    }

    private function updateProfilePictureIfNeeded(User $user, UpdateProfileRequest $request)
    {
        if ($request->hasFile('profile_picture'))
        {
            $picture = $request->file('profile_picture');
            $user->updateProfilePicture($picture);
            return true;
        }

        return false;
    }

    public function changePassword(ChangePasswordRequest $request)
    {
        if ($this->isCurrentPassword($request->current_password))
        {
            if ($this->isCurrentPassword($request->password))
            {
                return $this->redirectWithSamePasswordWarning();
            }
            else
            {
                $user = auth()->user();
                $user->password = bcrypt($request->password);
                $user->update();
                return $this->redirectWithPasswordChangeSuccess();
            }
        }
        else
        {
            return $this->redirectWithIncorrectPasswordWarning();
        }
    }

    public function deleteProfilePicture()
    {
        auth()->user()->deleteProfilePicture();
        return redirect()->route('preferences')->with('success', trans('user.preferences.picture-removed'));
    }

    private function isCurrentPassword($value)
    {
        return Hash::check($value, auth()->user()->password);
    }

    private function redirectWithSamePasswordWarning()
    {
        return redirect()->route('preferences')->with('warning', trans('user.password.same'));
    }

    private function redirectWithPasswordChangeSuccess()
    {
        return redirect()->route('preferences')->with('success', trans('user.password.updated'));
    }

    private function redirectWithIncorrectPasswordWarning()
    {
        return redirect()->route('preferences')->with('warning', trans('user.password.incorrect'));
    }
}
