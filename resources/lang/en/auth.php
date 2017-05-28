<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used during authentication for various
    | messages that we need to display to the user. You are free to modify
    | these language lines according to your application's requirements.
    |
    */

    'failed'                => 'These credentials do not match our records.',
    'throttle'              => 'Too many login attempts. Please try again in :seconds seconds.',
    'banned'                => 'This account has been banned because of a Terms of Use violation.',
    'banned-ip'             => 'This IP address has been banned because of a Terms of Use violation.',
    'banned-email'          => 'This email address has been banned because of a Terms of Use violation.',
    'activation'            => [
        'email'             => [
            'subject'       => 'Account activation',
            'alert'         => 'We have e-mailed you the activation link.',
            'body'          => [
                'greeting'  => 'Hello <b>:name</b>,',
                'welcome'   => 'Welcome to ' . trans('app.name') . '! The alternative social network.',
                'info'      => 'Before logging in, your account needs to be activated, so we know it\'s you.',
                'link'      => 'Click here to activate your account.',
            ],
        ],
        'resent'            => 'Your account is not activated, a new link has been sent to :email.',
        'remind'            => 'Your account is not activated, an activation link should be sent on :email.',
        'success'           => 'Your account has been activated.',
    ],
];
