<?php

namespace Forum;

use Cache;
use Storage;
use Carbon\Carbon;
use Forum\Interfaces\Redirectable;
use Forum\Interfaces\CanBeSearched;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Pagination\Paginator;
use Forum\Events\User\UserDeleted;
use Forum\Jobs\User\UpdateProfilePicture;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

class User extends Authenticatable implements Redirectable, CanBeSearched
{
    const NOTIFICATIONS_PER_PAGE         = 30; // The amount of notifications to show per page.
    const ACTIVITY_PER_PAGE              = 20; // The amount of activity items to show per page.
    const USERS_PER_PAGE                 = 10; // The amount of users to display in the community page.
    const SUBSCRIPTIONS_PER_PAGE         = 10; // The amount of subscriptions to show per page.
    const FEED_POSTS_PER_PAGE            = 10; // The amount of feed posts to show per page.
    const MINUTES_BEFORE_OFFLINE         = 2;  // The amount of minutes before the user goes offline.

    protected $fillable = [
        'username',
        'first_name',
        'last_name',
        'description',
        'email',
        'password',
        'admin',
        'banned',
        'banned_ip',
        'banned_ip_address',
        'activated',
        'show_email',
        'show_ratings',
        'show_online',
        'email_notifications',
        'locale',
        'feed_tab',
        'reputation',
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'admin',
        'activated',
        'show_email',
        'show_ratings',
        'show_online',
        'email_notifications',
        'locale',
        'feed_tab',
        'reputation',
    ];

    protected $casts = [
        'banned' => 'boolean',
        'activated' => 'boolean',
        'show_email' => 'boolean',
        'show_ratings' => 'boolean',
        'show_online' => 'boolean',
        'email_notifications' => 'boolean',
    ];

    /* Relationships */

    /**
     * User can have many posts.
     */
    public function posts()
    {
        return $this->hasMany('Forum\Post');
    }

    /**
     * User can have many comments.
     */
    public function comments()
    {
        return $this->hasMany('Forum\Comment');
    }

    /**
     * User can have many replies.
     */
    public function replies()
    {
        return $this->hasMany('Forum\Reply');
    }

    /**
     * User can give many ratings.
     */
    public function ratings()
    {
        return $this->hasMany('Forum\Rating');
    }

    /**
     * User can create many reports.
     */
    public function reports()
    {
        return $this->hasMany('Forum\Report');
    }

    /**
     * User can subscribe to many posts.
     */
    public function notificationSubscriptions()
    {
        return $this->hasMany('Forum\notificationSubscriptions');
    }

    /**
     * Original reputation of a user.
     */
    public function originalReputationCount()
    {
        return $this->originalReputation()->count();
    }

    public function originalReputation()
    {
        return $this->hasManyThrough(
            'Forum\Rating', 'Forum\Post',
            'user_id', 'rateable_id', 'id'
        )->where('own', false);
    }

    /**
     * A user's reputation, including the one that has been manually added.
     */
    public function getReputationAttribute($value)
    {
        return $value + $this->originalReputationCount();
    }

    /**
     * User can receive notifications.
     */
    public function notifications()
    {
        return $this->hasMany('Forum\Notification', 'to_id');
    }

    /**
     * User can have subscribers.
     */
    public function subscribers()
    {
        return $this->belongsToMany('Forum\User', 'subscriptions', 'subscription_id', 'subscriber_id');
    }

    /**
     * User can subscribe to others.
     */
    public function subscriptions()
    {
        return $this->belongsToMany('Forum\User', 'subscriptions', 'subscriber_id', 'subscription_id');
    }

    /* Profile */

    /**
     * Returns a paginator of the user's activities (posts, comments, replies, ratings).
     */
    public function getActivityPaginator()
    {
        // Get all posts, comments, replies and ratings (if enabled on privacy settings).
        $activity = $this->posts;
        foreach ($this->comments as $comment) $activity->push($comment);
        foreach ($this->replies as $reply) $activity->push($reply);
        if ($this->show_ratings || (auth()->check() && auth()->user()->id == $this->id))
        {
            foreach ($this->ratings as $rating) $activity->push($rating);
        }

        // Sort all activity items.
        $activity = $activity->sortByDesc('created_at')->all();

        // Get the current activity page.
        $currentPage = Paginator::resolveCurrentPage('activity');

        // Get the current page path.
        $path = Paginator::resolveCurrentPath();

        // Create new paginator instance.
        return new Paginator(
            array_slice($activity, ($currentPage - 1) * self::ACTIVITY_PER_PAGE, self::ACTIVITY_PER_PAGE + 1),
            self::ACTIVITY_PER_PAGE,
            $currentPage,
            ['path' => $path, 'pageName' => 'activity']
        );
    }

    /* Subscriptions */

    public function getSubscriptionPaginator()
    {
        return $this->subscriptions()->orderBy('created_at')->simplePaginate(self::SUBSCRIPTIONS_PER_PAGE);
    }

    /* Feed */

    public function getFeedPaginator()
    {
        return Post::whereHas('user.subscribers', function ($query) {
            $query->where('subscriber_id', $this->id);
        })->orWhere('user_id', $this->id)->orderBy('created_at', 'desc')->simplePaginate(self::FEED_POSTS_PER_PAGE);
    }

    /* Search */

    public function scopeGetSearchResults($query, $search)
    {
        return $query->where('username', 'like', '%' . $search . '%')
            ->orWhere('first_name', 'like', '%' . $search . '%')
            ->orWhere('last_name', 'like', '%' . $search . '%')
            ->get()
            ->sortByDesc('reputation');
    }

    public function scopeGetDefaultSearchResults($query)
    {
        return $query->getCommunity()->first();
    }

    /* First name, last name, description */

    public function setFirstNameAttribute($value)
    {
        $this->attributes['first_name'] = ucfirst(TextHelper::removeSpaces($value));
    }

    public function setLastNameAttribute($value)
    {
        $this->attributes['last_name'] = ucfirst(TextHelper::removeSpaces($value));
    }

    public function setDescriptionAttribute($value)
    {
        $this->attributes['description'] = TextHelper::formatBlankLines($value);
    }

    public function fullName()
    {
        if ($this->first_name && $this->last_name)
        {
            return $this->first_name . ' '  . $this->last_name;
        }
        else
        {
            return $this->username;
        }
    }

    /* Placement */

    public static function scopeGetCommunityPaginator($query, $includeBanned = false)
    {
        $community = self::getCommunity($includeBanned)->all();
        $currentPage = Paginator::resolveCurrentPage();
        $path = Paginator::resolveCurrentPath();

        return new Paginator(
            array_slice($community, ($currentPage - 1) * self::USERS_PER_PAGE, self::USERS_PER_PAGE + 1),
            self::USERS_PER_PAGE,
            $currentPage,
            ['path' => $path]
        );
    }

    public static function scopeGetCommunity($query, $includeBanned = false)
    {
        if (!$includeBanned) $query->where('banned', false)->where('banned_ip', false);
        return $query->get()->sortByDesc('reputation')->values();

        // if ($a->reputation && $b->reputation)
        // {
        //     if ($a->reputation >= $b->reputation) return -1;
        //     else return 1;
        // }
        // else if ($a->reputation && !$b->reputation) return -1;
        // else if (!$a->reputation && $b->reputation) return 1;
        // else if ($a->id >= $b->id) return 1;
        // else if ($a->id < $b->id) return -1;
        // else return 0;
    }

    public function placement()
    {
        $position = self::getCommunity(true)->where('id', $this->id)->all();
        return array_keys($position)[0] + 1;
    }

    /* Online */

    public function setOnline()
    {
        $expiry = Carbon::now()->addMinutes(self::MINUTES_BEFORE_OFFLINE);
        Cache::put('user-activity-' . $this->id, true, $expiry);
    }

    public function setOffline()
    {
        Cache::forget('user-activity-' . $this->id);
    }

    public function isOnline()
    {
        return Cache::has('user-activity-' . $this->id);
    }

    /* Notifications */

    public function getNotificationPaginator()
    {
        return $this->notifications()
        ->orderBy('created_at', 'desc')
        ->simplePaginate(self::NOTIFICATIONS_PER_PAGE);
    }

    public function seeNotifications()
    {
        return $this->getNotificationPaginator()
        ->where('seen', false)
        ->each(function ($notification) {
            $notification->seen = true;
            $notification->save();
        });
    }

    public function getUnseenNotifications()
    {
        return $this->notifications()
        ->where('seen', false)
        ->get();
    }

    public function getUnseenNotificationsCount()
    {
        return $this->getUnseenNotifications()->count();
    }

    /* Generic Alert */

    public function closeAlert($name, $resetAfter = null)
    {
        $name = "alert-closed-$name-$this->id";

        if (isset($resetAfter)) Cache::put($name, true, $resetAfter);
        else Cache::forever($name, true);
    }

    public function resetAlert($name)
    {
        Cache::forget("alert-closed-$name-$this->id");
    }

    public function hasClosedAlert($name)
    {
        return Cache::has("alert-closed-$name-$this->id");
    }

    /* Alerts: Announcements */

    public function closeAnnouncement()
    {
        $this->closeAlert('announcement', Carbon::now()->addDays(3));
    }

    public function resetAnnouncement()
    {
        $this->resetAlert('announcement');
    }

    public function hasClosedAnnouncement()
    {
        return $this->hasClosedAlert('announcement');
    }

    /* Emails */

    public function scopeGetEmailList($query)
    {
        return $query->where('email_notifications', true)
        ->where('activated', true)
        ->where('banned', false)
        ->get();
    }

    /* Bans and IP Bans */

    public function isBanned()
    {
        return $this->banned || $this->isIpBanned();
    }

    public function isIpBanned()
    {
        return $this->banned_ip;
    }

    public static function isEmailBanned($email)
    {
        return self::where('email', $email)->where('banned', true)->count() > 0;
    }

    public function toggleBan()
    {
        $this->banned = !$this->banned;
        if (!$this->banned) $this->banned_ip = false; // If unbanned, also remove the ip ban.
        $this->save();
    }

    public function toggleIpBan()
    {
        $this->banned = !$this->banned;
        $this->banned_ip = !$this->banned_ip;
        if (!$this->banned_ip) $this->banned_ip_address = null;
        $this->save();
    }

    public function storeBannedIpAddress(Request $request)
    {
        if ($this->banned_ip)
        {
            $this->banned_ip_address = $request->ip();
            $this->save();
        }
    }

    public static function checkRequestForBannedIp(Request $request)
    {
        return self::where('banned_ip_address', $request->ip())->count() > 0;
    }

    /* Links */

    public function route()
    {
        return route('user-profile', $this->username);
    }

    public function redirect()
    {
        return redirect()->to($this->route());
    }

    /* Profile Picture */

    public function updateProfilePicture(UploadedFile $picture)
    {
        $this->deleteProfilePicture();
        $id = uniqid();
        Storage::disk('profile-pictures')->put($id . '.png', file_get_contents($picture->getRealPath()));
        dispatch(new UpdateProfilePicture($this, $id));
    }

    public function deleteProfilePicture()
    {
        if ($picture = $this->profile_picture)
        {
            Storage::disk('profile-pictures')->delete($picture . '.png');
            $this->profile_picture = null;
            $this->save();
        }
    }

    public function delete()
    {
        event(new UserDeleted($this));

        $this->posts->each(function ($post) {
            $post->delete();
        });

        $this->comments->each(function ($comment) {
            $comment->delete();
        });

        $this->replies->each(function ($reply) {
            $reply->delete();
        });

        $this->deleteProfilePicture();

        parent::delete();
    }
}
