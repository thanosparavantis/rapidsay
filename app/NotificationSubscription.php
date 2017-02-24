<?php

namespace Forum;

use Illuminate\Database\Eloquent\Model;

class NotificationSubscription extends Model
{
    protected $fillable = [ 'user_id', 'post_id' ];

    public function user()
    {
        return $this->belongsTo('Forum\User');
    }

    public function post()
    {
        return $this->belongsTo('Forum\Post');
    }
}
