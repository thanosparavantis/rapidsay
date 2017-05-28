<?php

namespace Forum;

use Forum\Interfaces\AcceptsImages;
use Forum\Interfaces\Redirectable;
use Forum\Traits\Rateable;
use Forum\Traits\UserContentItem;
use Forum\Events\Topic\ReplyDeleted;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model implements Redirectable, AcceptsImages
{
    use UserContentItem, Rateable;

    protected $fillable = [ 'user_id', 'comment_id', 'body' ];

    /**
     * A reply belongs to a user.
     */
    public function user()
    {
        return $this->belongsTo('Forum\User');
    }

    /**
     * A reply can have one image.
     */
    public function images()
    {
        return $this->morphOne('Forum\Image', 'imageable');
    }

    /**
     * A reply belongs to a comment.
     */
    public function comment()
    {
        return $this->belongsTo('Forum\Comment');
    }

    /**
     * A reply can have many reports.
     */
    public function reports()
    {
        return $this->morphMany('Forum\Report', 'reportable');
    }

    /* Body */

    public function setBodyAttribute($value)
    {
        $this->attributes['body'] = TextHelper::formatBlankLines($value);
    }

    public function getLinkCount()
    {
        return TextHelper::getLinkCount($this->body);
    }

    /* Links */

    public function getExactPage()
    {
        return $this->comment->getPageForReply($this);
    }

    public function route()
    {
        $url = route('view-post', $this->comment->post->id);
        $page = $this->comment->getExactPage();
        $replyPage = $this->comment->getPageForReply($this);

        $secondPrefix = "?";

        if ($page > 1)
        {
            $url .= "?page=" . $page;
            $secondPrefix = "&";
        }

        if ($replyPage > 1)
        {
            $url .= $secondPrefix . 'comment-' . $this->comment->id . '-page=' . $replyPage;
        }

        $url .= "#reply-" . $this->id;

        return $url;
    }

    public function redirect()
    {
        return redirect()->to($this->route());
    }

    public function delete($user = null)
    {
        event(new ReplyDeleted(isset($user) ? $user : $this->user, $this));

        $this->images()->each(function ($image) {
            $image->delete();
        });

        $this->ratings->each(function ($rating) {
            $rating->delete();
        });

        parent::delete();
    }
}
