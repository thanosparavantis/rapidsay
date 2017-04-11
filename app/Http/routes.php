<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Home
Route::get  (   '/',                                    ['as' => 'home',                        'uses' => 'Home\HomeController@show',]);
Route::post (   '/',                                    ['as' => 'post-home',                   'uses' => 'Topic\PostController@create',]);
Route::post (   '/feed-tab',                            ['as' => 'change-feed-tab',             'uses' => 'Home\HomeController@changeFeedTab']);
Route::get  (   'explore',                              ['as' => 'explore',                     'uses' => 'Home\ExploreController@show',]);
Route::post (   'explore',                              ['as' => 'post-explore',                'uses' => 'Home\ExploreController@search',]);
Route::get  (   'community',                            ['as' => 'community',                   'uses' => 'Home\CommunityController@show',]);
Route::get  (   'chat',                                 ['as' => 'chat',                        'uses' => 'Home\ChatController@show',]);

// Alerts
Route::post (   'alert/announcement/close',             ['as' => 'close-announcement',          'uses' => 'User\AlertController@closeAnnouncement']);

// Post
Route::get  (   'post/{id}',                            ['as' => 'view-post',                   'uses' => 'Topic\PostController@show',]);
Route::get  (   'post/{id}/edit',                       ['as' => 'edit-post',                   'uses' => 'Topic\PostController@showEdit',]);
Route::post (   'post/{id}/edit',                       ['as' => 'post-edit-post',              'uses' => 'Topic\PostController@edit',]);
Route::get  (   'post/{id}/delete',                     ['as' => 'delete-post',                 'uses' => 'Topic\PostController@delete',]);

// Comment
Route::post (   '{postId}/comment',                     ['as' => 'comment',                     'uses' => 'Topic\CommentController@comment',]);
Route::get  (   'comment/{id}/edit',                    ['as' => 'edit-comment',                'uses' => 'Topic\CommentController@showEdit',]);
Route::post (   'comment/{id}/edit',                    ['as' => 'post-edit-comment',           'uses' => 'Topic\CommentController@edit',]);
Route::get  (   'comment/{id}/delete',                  ['as' => 'delete-comment',              'uses' => 'Topic\CommentController@delete',]);

// Reply
Route::get  (   '{type}/{id}/reply',                    ['as' => 'reply',                       'uses' => 'Topic\ReplyController@show',]);
Route::post (   '{type}/{id}/reply',                    ['as' => 'post-reply',                  'uses' => 'Topic\ReplyController@reply',]);
Route::get  (   'reply/{id}/edit',                      ['as' => 'edit-reply',                  'uses' => 'Topic\ReplyController@showEdit',]);
Route::post (   'reply/{id}/edit',                      ['as' => 'post-edit-reply',             'uses' => 'Topic\ReplyController@edit',]);
Route::get  (   'reply/{id}/delete',                    ['as' => 'delete-reply',                'uses' => 'Topic\ReplyController@delete',]);

// Rate
Route::post (   '{type}/{id}/rate',                     ['as' => 'rate',                        'uses' => 'Topic\RatingController@rate',]);

// Media
Route::get  (   '{type}/{id}/image/{url}/delete',       ['as' => 'delete-image',                'uses' => 'Topic\MediaController@deleteImage']);

// Report
Route::get  (   '{type}/{id}/report',                   ['as' => 'report',                      'uses' => 'Topic\ReportController@show']);
Route::post (   '{type}/{id}/report',                   ['as' => 'post-report',                 'uses' => 'Topic\ReportController@create']);

// Auth
Route::get  (   'login',                                ['as' => 'login',                       'uses' => 'Auth\AuthController@showLoginForm',]);
Route::post (   'login',                                ['as' => 'post-login',                  'uses' => 'Auth\AuthController@login',]);
Route::get  (   'logout',                               ['as' => 'logout',                      'uses' => 'Auth\AuthController@logout',]);

Route::get  (   'register',                             ['as' => 'register',                    'uses' => 'Auth\AuthController@showRegistrationForm',]);
Route::post (   'register',                             ['as' => 'post-register',               'uses' => 'Auth\AuthController@register',]);
Route::get  (   'activate/{token}',                     ['as' => 'activate-account',            'uses' => 'Auth\AuthController@activate']);

Route::get  (   'password/reset/{token?}',              ['as' => 'password-reset',              'uses' => 'Auth\PasswordController@showResetForm',]);
Route::post (   'password/email',                       ['as' => 'post-password-reset-email',   'uses' => 'Auth\PasswordController@sendResetLinkEmail',]);
Route::post (   'password/reset',                       ['as' => 'post-password-reset',         'uses' => 'Auth\PasswordController@reset',]);

// User
Route::get  (   'user/{username}',                      ['as' => 'user-profile',                'uses' => 'User\ProfileController@show']);
Route::get  (   'notifications',                        ['as' => 'notifications',               'uses' => 'User\NotificationController@show']);
Route::post (   'notifications',                        ['as' => 'post-notifications',          'uses' => 'User\NotificationController@update']);
Route::get  (   'dashboard',                            ['as' => 'dashboard',                   'uses' => 'User\Dashboard\ProfileController@show']);
Route::post (   'dashboard',                            ['as' => 'post-update-profile',         'uses' => 'User\Dashboard\ProfileController@update']);
Route::get  (   'dashboard/delete-profile-picture',     ['as' => 'delete-profile-picture',      'uses' => 'User\Dashboard\ProfileController@deleteProfilePicture']);
Route::get  (   'dashboard/change-password',            ['as' => 'change-password',             'uses' => 'User\Dashboard\PasswordController@show']);
Route::post (   'dashboard/change-password',            ['as' => 'post-change-password',        'uses' => 'User\Dashboard\PasswordController@update']);
Route::get  (   'dashboard/privacy',                    ['as' => 'privacy',                     'uses' => 'User\Dashboard\PrivacyController@show']);
Route::post (   'dashboard/privacy',                    ['as' => 'post-privacy',                'uses' => 'User\Dashboard\PrivacyController@update']);
Route::get  (   'dashboard/delete-account',             ['as' => 'delete-account',              'uses' => 'User\Dashboard\AccountDeletionController@show']);
Route::post (   'dashboard/delete-account',             ['as' => 'post-delete-account',         'uses' => 'User\Dashboard\AccountDeletionController@delete']);
Route::get  (   'dashboard/subscriptions',              ['as' => 'subscriptions',               'uses' => 'User\Dashboard\SubscriptionController@show']);
Route::get  (   'dashboard/language',                   ['as' => 'language',                    'uses' => 'User\Dashboard\LanguageController@show']);
Route::post (   'language',                             ['as' => 'post-language',               'uses' => 'User\Dashboard\LanguageController@update']);
Route::post (   'subscribe/{userId}',                   ['as' => 'subscribe',                   'uses' => 'User\Dashboard\SubscriptionController@subscribe']);

// Admin
Route::get  (   'admin/dashboard',                      ['as' => 'admin-dashboard',             'uses' => 'Admin\DashboardController@show']);
Route::post (   'admin/report/deny/{id}',               ['as' => 'admin-report-deny',           'uses' => 'Admin\DashboardController@denyReport']);
Route::post (   'admin/announce',                       ['as' => 'admin-announce',              'uses' => 'Admin\DashboardController@announce']);
Route::post (   'admin/announcement/remove',            ['as' => 'admin-announcement-remove',   'uses' => 'Admin\DashboardController@removeAnnouncement']);
Route::post (   'admin/activate/{userId}',              ['as' => 'admin-activate',              'uses' => 'Admin\AccountController@activate',]);
Route::post (   'admin/reputation/{userId}',            ['as' => 'admin-reputation',            'uses' => 'Admin\AccountController@reputation']);
Route::post (   'admin/ban/{userId}',                   ['as' => 'admin-ban',                   'uses' => 'Admin\AccountController@ban',]);
Route::post (   'admin/ban-ip/{userId}',                ['as' => 'admin-ban-ip',                'uses' => 'Admin\AccountController@banIp',]);
Route::post (   'admin/delete/{userId}',                ['as' => 'admin-delete-account',        'uses' => 'Admin\AccountController@delete',]);

// About
Route::get  (   'terms-of-use',                         ['as' => 'terms-of-use',                'uses' => 'About\AboutController@showTermsOfUse',]);
Route::get  (   'privacy-policy',                       ['as' => 'privacy-policy',              'uses' => 'About\AboutController@showPrivacyPolicy',]);

// Help
Route::get  (   'help/{section?}/{article?}',           ['as' => 'help',                        'uses' => 'HelpController@show']);
