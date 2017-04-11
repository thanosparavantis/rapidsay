<?php

namespace Forum\Http\Controllers\User\Dashboard;

use Forum\User;
use Forum\Http\Requests\User\UpdatePrivacyRequest;
use Forum\Http\Requests;
use Forum\Http\Controllers\Controller;

class PrivacyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show()
    {
        $this->checkForEmailNotificationsUpdate();
        return view('user.dashboard.privacy');
    }

    public function update(UpdatePrivacyRequest $request)
    {
        $user = auth()->user();

        $this->updateEmailNotifications($request, $user);
        $this->updateEmailVisiblity($request, $user);
        $this->updateRatingsVisiblity($request, $user);
        $this->updateOnlineVisiblity($request, $user);

        if ($user->isDirty())
        {
            $user->save();
            return redirect()->route('privacy')->with('success', trans('user.privacy.updated'));
        }

        return redirect()->route('privacy');
    }

    private function updateEmailNotifications(UpdatePrivacyRequest $request, User $user)
    {
        $setting = $request->email_notifications === "true";

        if ($setting != $user->email_notifications) {
            $user->email_notifications = $setting;
        }
    }

    private function updateEmailVisiblity(UpdatePrivacyRequest $request, User $user)
    {
        $setting = $request->show_email === "true";

        if ($setting != $user->show_email) {
            $user->show_email = $setting;
        }
    }

    private function updateRatingsVisiblity(UpdatePrivacyRequest $request, User $user)
    {
        $setting = $request->show_ratings === "true";

        if ($setting != $user->show_ratings) {
            $user->show_ratings = $setting;
        }
    }

    private function updateOnlineVisiblity(UpdatePrivacyRequest $request, User $user)
    {
        $setting = $request->show_online === "true";

        if ($setting != $user->show_online) {
            $user->show_online = $setting;

            if (!$setting) {
                $user->setOffline();
            }
        }
    }

    private function checkForEmailNotificationsUpdate()
    {
        $user = auth()->user();
        $email = request()->email_notifications;

        if (isset($email) && $email === "false" && $user->email_notifications)
        {
            $user->email_notifications = false;
            $user->save();
            request()->session()->flash('success', trans('user.dashboard.message.email-notifications'));
        }
    }
}
