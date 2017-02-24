<?php

return [
    'you'                   => 'you',
    'edited'                => 'edited',
    'deleted'               => 'deleted',

    'post'                  => [
        'create'            => ':someone has posted :reference.',
        'edit'              => ':reference was edited by an administrator.',
        'delete'            => ':reference was deleted by an administrator.',
    ],
    'comment'               => [
        'create'            => ':someone has commented on :reference.',
        'edit'              => ':reference was edited by an administrator.',
        'delete'            => ':reference was deleted by an administrator.',
    ],
    'reply'                 => [
        'create'            => ':someone has replied to :reference.',
        'edit'              => ':reference was edited by an administrator.',
        'delete'            => ':reference was deleted by an administrator.',
    ],
    'rating'                => [
        'create'            => ':someone has rated :reference.',
    ],
    'subscriber'            => [
        'create'            => ':someone has subscribed to :reference.',
    ],
    'report'                => [
        'accept'            => 'Your report about :reference was accepted, the content was :extra.',
        'deny'              => 'Your report about :reference was denied because we didn\'t find something that violates our Terms of Use.',
    ],
    'reputation'            => [
        'increase'          => 'Congratulations, your reputation has increased by <strong>:extra</strong>.',
        'decrease'          => 'Υour reputation has decreased by <strong>:extra</strong>.',
    ],
];
