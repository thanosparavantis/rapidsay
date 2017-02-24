<?php

namespace Forum;

use Storage;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = ['url'];

    /**
     * An image belongs to a post.
     */
    public function imageable()
    {
        return $this->morphTo();
    }

    public function delete()
    {
        Storage::disk('images')->delete($this->url . '.png');
        parent::delete();
    }
}
