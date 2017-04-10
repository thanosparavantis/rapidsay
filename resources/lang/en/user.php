<?php

return [

    'placement'                     => 'placement',
    'reputation'                    => 'reputation',
    'subscribers'                   => 'subscriber|subscribers',
    'data-loss'                     => 'Are you sure you want to discard all changes?',
    'banned'                        => 'Banned',

    'profile' => [
        'activity'                  => 'Activity',
        'empty'                     => 'No recent activity',
        'picture'                   => 'Profile picture of :name',
        'online'                    => 'Online',
        'banned'                    => 'User :name was banned because of a Terms of Use violation.'
    ],

    'notifications' => [
        'none'                      => 'You don\'t have any notifications at this time.',
    ],

    'preferences' => [
        'update-profile'            => 'Update Profile',
        'change-password'           => 'Change Password',
        'picture-removed'           => 'Your profile picture has been removed.',
        'updated'                   => 'Your preferences have been updated.',
    ],

    'privacy' => [
        'notifications' => [
            'title'                 => 'Send weekly email reminders of unread notifications.',
            'description'           => 'This means you will receive an email every Friday, when you have new notifications.',
        ],

        'email' => [
            'title'                 => 'Show my email address on my profile.',
            'description'           => 'This means that the email address you used when you registered will be publicly available on your profile (<strong>:email</strong>).',
        ],

        'ratings' => [
            'title'                 => 'Show content I have rated on my profile.',
            'description'           => 'This means that the ratings section on your profile, which includes all of the posts, comments and replies you have rated will be publicly available.',
        ],

        'online' => [
            'title'                 => 'Show when I am online.',
            'description'           => 'This means that when you are logged in, a green circle indicator will be publicly visible on your profile picture.',
        ],

        'update'                    => 'Update privacy settings',
        'updated'                   => 'Your privacy settings have been updated.',
        'private'                   => 'This section is only visible to you.',
    ],

    'password' => [
        'same'                      => 'Your new password cannot be the same as the current one.',
        'updated'                   => 'Your password has been updated, make sure to use the new one next time you login.',
        'incorrect'                 => 'The current password you provided is not correct.'
    ],

    'subscription' => [
        'none'                      => 'No subscriptions found',
        'subscribed'                => 'You are now subscribed to :name.',
        'unsubscribed'              => 'You are no longer subscribed to :name.',
    ],

    'button' => [
        'subscribe'                 => 'Subscribe',
        'unsubscribe'               => 'Unsubscribe',
    ],

    'email' => [
        'notifications' => [
            'subject'               => 'You have :unread unread notification|You have :unread unread notifications',
            'greeting'              => 'Hello <strong>:name</strong>,',
            'about'                 => 'You have <strong>:unread</strong> unread notification you may want to check out.|You have <strong>:unread</strong> unread notifications you may want to check out.',
            'about-link'            => 'Click here to view your notifications.',
            'unsubscribe'           => 'If you don\'t want to receive these emails, :link.',
            'unsubscribe-link'      => 'click here to unsubscribe',
        ],
    ],

    'delete' => [
        'text'                      => '<p>You are about to <strong>permanently delete your account</strong>. By doing so, any data associated with it will be gone forever.</p>
                                        <ul>
                                            <li>All of your posts, comments and ratings will be deleted.</li>
                                            <li>Your preferences, placement, reputation, subscribers and subscriptions will be gone.</li>
                                            <li>The images you have uploaded will be deleted.</li>
                                            <li>Your profile page will no longer exist.</li>
                                            <li>You will no longer receive email notifications.</li>
                                        </ul>
                                        <p>After deletion, you will not be able to log in with your account credentials. <strong>This action cannot be undone</strong>, are you sure you want to proceed?</p>',
        'button' => [
            'proceed'               => 'Yes, delete my account now',
            'back'                  => 'Go Back',
        ],
    ],
];
