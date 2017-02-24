<?php

namespace Forum\Traits;

trait Rateable
{
    public function ratings()
    {
        return $this->morphMany('Forum\Rating', 'rateable');
    }

    public function hasRated()
    {
        return auth()->user()->ratings()->where('rateable_type', get_class($this))->where('rateable_id', $this->id)->first();
    }
}