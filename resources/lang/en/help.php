<?php

return [

    'title'             => 'Help Center',
    'login'             => 'You may need to be :link, in order to follow the instructions included on this help page.',
    'logged-in'         => 'logged in',
    'here'              => 'here',

    'greeting'          => [
        'line1'         => 'Hello! welcome to our help center. Here you can find answers to frequently asked questions.',
        'line2'         => 'In case you need additional help, or can\'t find what you are looking for, feel free to send an email at :link.',
        'line3'         => trans('app.name') . ' also has a <a href="https://www.facebook.com/rapidsay/" target="_blank">Facebook</a> page, you can ask questions there too.'
    ],

    'section'           => [
        'account'       => [
            'title'     => 'Account',
            'article'   => [
                'not-activated'     => [
                    'title'         => 'I cannot access my account because it\'s not activated.',
                    'body'          =>
                        '<p>If your account is not activated, you will not be able to login successfully. That\'s because you need to verify that you have access to the email address you supplied during registration.</p>
                        <p>Normally, after registration, an email should arrive on your inbox. To active your account, open the email and follow the instructions included.</p>
                        <p>In case the email never arrives, try to login after <strong>24 hours</strong>, in order for a new activation email to be sent. If you still experience problems, please make sure to contact with us.</p>',
                ],
                'forgot-password'   => [
                    'title'         => 'I cannot access my account because I forgot my password.',
                    'body'          =>
                        '<p>You have the option to request a password reset <a href="' . route("password-reset") . '">here</a>. Once you fill in your email address, an email will be sent with a link that leads to the password reset page. There you can select a new password and then login with the new one.</p>
                        <p>In case the email never arrives, please try again or contact with us.</p>',
                ],
                'blocked'           => [
                    'title'         => 'I can no longer access my account because it\'s blocked.',
                    'body'          =>
                        '<p>Unfortunate, a blocked account can no longer be accessed. This may have happened, because the user that controls this account has violated one of our community rules. Usually, this action cannot be revoked, unless the account ban was placed by accident.</p>
                        <p>If you believe your account account was blocked by accident, please make sure to contact with us.</p>',
                ],
            ],
        ],

        'profile'       => [
            'title'     => 'Profile',
            'article'   => [
                'customize'     => [
                    'title'     => 'How can I customize my profile?',
                    'body'      =>
                        '<p>Click on <strong>' . (auth()->check() ? auth()->user()->fullName() : 'your name') . '</strong> in the navigation bar above to visit your profile.</p>
                        <p>Afterwards, click on the <strong><i class="fa fa-cog space-right" aria-hidden="true"></i>Preferences</strong> button at your right to visit the user dashboard.</p>',
                ],
                'placement'     => [
                    'title'     => 'What is my placement?',
                    'body'      =>
                        '<p>Placement is displayed with the <i class="fa fa-' . config('glyphicons.placement') . '" aria-hidden="true"></i> icon and represents your current position in the community list.</p>
                        <p>You may increase your reputation in order to gain a higher position in the community list.</p>',
                ],
                'reputation'    => [
                    'title'     => 'What is my reputation?',
                    'body'      =>
                        '<p>Reputation is displayed with the <i class="fa fa-' . config('glyphicons.reputation') . '" aria-hidden="true"></i> icon and represents the amount of ratings others have given to your posts.</p>
                        <p>The higher your reputation is, the more popular your profile will become. To increase your reputation, be helpful and promote a positive attitude. Make sure that your posts are based on a certain topic, so people with common interests may subscribe to get notified of your new posts.</p>
                        <p>You may also earn reputation by participating on events and contests with rewards.</p>',
                ],
            ],
        ],

        'activity'      => [
            'title'     => 'Activity',
            'article'   => [
                'all'           => [
                    'title'     => 'How can I view all of my activity?',
                    'body'      => [

                    ],
                ],
                'create'        => [
                    'title'     => 'How can I create a post?',
                    'body'      =>
                        '<p>To create a new post, click the <strong><i class="fa fa-home space-right" aria-hidden="true"></i>' . trans('page.title.home') . '</strong> link in the navigation bar above.</p>
                        <p>Afterwards, locate the post creation form at the top of the page. There you can write the body of the post and upload images.</p>
                        <p>Make sure that the contents of your post abide with our <a href="' . route('terms-of-use') . '">Terms of Use</a>. All posts are publicly available and anyone can interact with them.</p>',
                ],
                'comment'       => [
                    'title'     => 'How can I comment on existing content?',
                    'body'      =>
                        '<p>To comment on a post, click on the <strong>Comment</strong> button below the preview. You will be redirected to the post page, where the comment form will be visible.</p>
                        <p>Keep in mind, you can also respond to other comments, by clicking the <strong>Reply</strong> button. You can only upload one image on every comment.</p>
                        <p>Make sure that the contents of your comment abide with our <a href="' . route('terms-of-use') . '">Terms of Use</a>. All comments are publicly available and anyone can interact with them.</p>',
                ],
                'image'         => [
                    'title'     => 'How can I upload images?',
                    'body'      =>
                        '<p>You can upload images by clicking the <i class="fa fa-' . config('glyphicons.image') . '" aria-hidden="true"></i> icon under every form.</p>
                        <p>To remove selected pictures, <strong>right-click</strong> on the <i class="fa fa-' . config('glyphicons.image') . '" aria-hidden="true"></i> icon.</p>
                        <p>You can only upload up to 10 images per post and up to 1 image per comment.</p>',
                ],
                'format'        => [
                    'title'     => 'How can I use special formatting?',
                    'body'      =>
                        '<p>The following formatting rules are currently available:</p>
                        <ul>
                            <li>***bold and italics*** will output <strong><em>bold and italics</strong></em>.</li>
                            <li>**bold only** will output <strong>bold only</strong>.</li>
                            <li>*italics only* will output <em>italics only</em>.</li>
                            <li>~~deleted text~~ will output <del>deleted text</del>.</li>
                            <li><strong>[center]</strong>Centered text<strong>[/center]</strong> will center the text inside the tags.</li>
                            <li>www.rapidsay.com will be converted to an active link <a href="http://www.rapidsay.com">www.rapidsay.com</a>.</li>
                        </ul>

                        <p>Keep in mind, you can use special formatting on both posts and comments.</p>',
                ],
            ],
        ],

        'notifications' => [
            'title'     => 'Notifications',
            'article'   => [
                'view'          => [
                    'title'     => 'How can I view my notifications?',
                    'body'      =>
                        '<p>To view the list of notifications, click the <i class="fa fa-' . config('glyphicons.notification') . '" aria-hidden="true"></i> icon in the navigation bar above.</p>',
                ],
                'interact'      => [
                    'title'     => 'How do I know if someone interacted with my content?',
                    'body'      =>
                        '<p>You will get notified when:</p>
                        <ul>
                            <li>Another user rates one of your posts, comments or replies.</li>
                            <li>Another user comments in one of your posts.</li>
                            <li>Another user replies in one of your comments.</li>
                            <li>Another user subscribers to you.</li>
                            <li>An administrator accepts or denies one of your reports.</li>
                            <li>An administrator edits one of your posts, comments or replies.</li>
                            <li>An administrator deletes one of your posts, comments or replies.</li>
                        </ul>

                        <p>The number of new notifications will appear in the navigation bar near the <i class="fa fa-' . config('glyphicons.notification') . '" aria-hidden="true"></i> icon. If one or more notifications refer to deleted content, they will be removed automatically.</p>',
                ],
            ],
        ],

        'subscriptions' => [
            'title'     => 'Subscriptions',
            'article'   => [
                'create'        => [
                    'title'     => 'How can I subscribe to someone?',
                    'body'      =>
                        '<p>To subscribe to someone, click on their name to visit their profile. Afterwards look on your right and click the <strong>Subscribe</strong> button.</p>',
                ],
                'delete'        => [
                    'title'     => 'How can I unsubscribe from someone?',
                    'body'      =>
                        '<p>To unsubscribe from someone, click on your <strong>name</strong> in the navigation bar above. Afterwards, click on the <strong>Preferences</strong> button at your right. Then click on the <strong>Subscriptions</strong> link at the top, to view the list of your subscriptions. There you can choose to unsubscribe from one or more users.</p>
                        <p>Keep in mind that if you are in the user\'s profile you\'d like to unsubscribe from, you can click the <strong>Unsubscribe</strong> button at your right.</p>',
                ],
            ],
        ],

        'reports'       => [
            'title'     => 'Reports',
            'article'   => [
                'create'        => [
                    'title'     => 'How can I report someone\'s content?',
                    'body'      =>
                        '<p>If you think a certain post, comment or reply is breaking one of our rules, you have the option to report it. To do that, click on the <i class="fa fa-' . config('glyphicons.report') . '" aria-hidden="true"></i> icon in the interaction bar below to be redirected to the report page. There, you need to fill out the text area with any additional details you think we should know about the post. Afterwards click on the <strong>Submit Report</strong> to submit your report for review.</p>
                        <p>It may take a while until we review your report. Once we do, you will receive a notification about whether or not we performed any actions on the content you reported. If we weren\'t able to find anything that can break the rules, the report will be denied.</p>',
                ],
            ],
        ],
    ],
];
