<?php

return [

    'user' => [
        'activated'         => 'The user\'s account has been activated.',
        'reset'             => 'The user\'s password has been reset to: :code',
        'banned'            => 'The user has been banned.',
        'unbanned'          => 'The user has been unbanned.',
        'reputation' => [
            'prompt'        => 'How much reputation should be added/removed?',
            'success'       => 'Reputation has been modified successfully.',
            'error'         => 'Could not add reputation.',
        ],
        'delete' => [
            'prompt'        => 'Are you sure you want to delete this account?',
            'success'       => 'The account has been deleted.',
        ],
    ],

    'stats' => [
        'users'             => 'user|users',
        'posts'             => 'post|posts',
        'images'            => 'image|images',
        'ratings'           => 'rating|ratings',
    ],

    'announcement' => [
        'title'             => 'Announcement',
        'hint'              => 'Type the translation key to be displayed...',
        'create'            => 'The announcement is now visible in the home page.',
        'delete'            => 'The announcement has been deleted.',
    ],

    'reports' => [
        'title'             => 'Reports',
        'none'              => 'No reports found',
    ],

    'report' => [
        'content'           => 'Content',
        'description'       => 'Description',
    ],

    'button' => [
        'actions'           => 'Actions',
        'activate'          => 'Activate',
        'reputation'        => 'Reputation',
        'ban'               => 'Ban',
        'unban'             => 'Unban',
        'ban-ip'            => 'Ban IP',
        'unban-ip'          => 'Unban IP',
        'remove'            => 'Remove',
        'delete'            => 'Delete',
    ],
];
