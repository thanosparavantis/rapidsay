<?php

return [

    'welcome'           => [
        'title'         => 'Welcome to ' . trans('app.name'),
        'register'      => 'Join Us',
        'section'       => [
            'share'         => [
                'title'         => 'Share instantly',
                'line1'         => 'Write detailed stories and announcements.',
                'line2'         => 'Share funny and interesting content.',
                'line3'         => 'Posts shared to other social media platforms provide a detailed preview.',
            ],
            'reputation'    => [
                'title'         => 'Build your reputation',
                'line1'         => 'Collect ratings to increase your reputation.',
                'line2'         => 'Make your posts go trending.',
                'line3'         => 'Climb to the top of the leaderboard.',
            ],
            'audience'      => [
                'title'         => 'Gather audience',
                'line1'         => 'Others may subscribe and get notified of your new posts.',
                'line2'         => 'Become a subscriber of people with interesting content.',
                'line3'         => 'Build a community around a common interest.',
            ],
            'discussions'   => [
                'title'         => 'Appealing discussions',
                'line1'         => 'Use special formatting and upload images.',
                'line2'         => 'Comment on other people\'s posts.',
                'line3'         => 'Rate content you find interesting.',
            ],
        ]
    ],

    'feed'              => [
        'subscribe-tip' => [
            'description'       => 'The activities of people you subscribe to will appear here.',
            'button'            => 'Visit the community page',
        ],
        'hello-tip'     => [
            'description'       => 'Say hello! Write your first post.',
            'button'            => 'Start with a template',
            'value'             => 'Hello world!',
        ],
    ],

    'explore'               => [
        'tip'               => 'Search for people, topics, posts, phrases...',
        'results'           => 'results',
        'none'              => 'No results found',
    ],

    'community'             => [
        'none'              => 'No users to display',
        'users'             => 'There are <strong>:count</strong> registered users.',
        'first_none'        => 'No first place',
        'second_none'       => 'No second place',
        'third_none'        => 'No third place',
    ],

    'chat'                  => [
        'description'       => 'Discuss with other users in real time.',
    ],
];
