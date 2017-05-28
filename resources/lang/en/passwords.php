<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Password Reset Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are the default lines which match reasons
    | that are given by the password broker for a password update attempt
    | has failed, such as for an invalid token or invalid new password.
    |
    */

    'password'              => 'Passwords must be at least six characters and match the confirmation.',
    'reset'                 => 'Your password has been reset, you will now be able to login with the new password.',
    'sent'                  => 'We have e-mailed you the password reset link.',
    'token'                 => 'This password reset token is invalid.',
    'user'                  => "We can't find a user with that e-mail address.",

    'email' => [
        'subject'           => 'Password Reset',
        'greeting'          => 'Hello <b>:name</b>,',
        'info'              => 'You have requested your password to be reset.',
        'link'              => 'Click here to be redirected to the password reset page.',
    ],
];
