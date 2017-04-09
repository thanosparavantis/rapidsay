<?php

namespace Forum;

use Forum\Interfaces\Redirectable;
use Forum\Traits\UserContentItem;
use Forum\Events\Topic\RatingDeleted;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model implements Redirectable
{
    use UserContentItem;

    protected $fillable = ['user_id', 'rateable_id', 'rateable_type'];

    public function user()
    {
        return $this->belongsTo('Forum\User');
    }

    public function rateable()
    {
        return $this->morphTo();
    }

    public function route()
    {
        return $this->rateable->route();
    }

    public function redirect()
    {
        return redirect()->to($this->route());
    }

    public function getType()
    {
        return $this->rateable->getType();
    }

    public function delete($user = null)
    {
        event(new RatingDeleted(isset($user) ? $user : $this->user, $this));

        //

        parent::delete();
    }
}
