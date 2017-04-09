<?php

namespace Forum;

use Forum\Interfaces\Redirectable;
use Forum\Interfaces\AcceptsImages;
use Forum\Traits\Rateable;
use Forum\Traits\UserContentItem;
use Forum\Events\Topic\CommentDeleted;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model implements Redirectable, AcceptsImages
{
    use UserContentItem, Rateable;

    const REPLIES_PER_PAGE = 5;

    protected $fillable = [ 'user_id', 'post_id', 'body' ];

    /* Relationships */

    /**
     * A comment belongs to a user.
     */
    public function user()
    {
        return $this->belongsTo('Forum\User');
    }

    /**
     * A comment can have one image.
     */
    public function images()
    {
        return $this->morphOne('Forum\Image', 'imageable');
    }

    /**
     * A comment belongs to a post.
     */
    public function post()
    {
        return $this->belongsTo('Forum\Post');
    }

    /**
     * A comment can have many replies.
     */
    public function replies()
    {
        return $this->hasMany('Forum\Reply');
    }

    /**
     * A comment can have many reports.
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

    /* Replies */

    public function getFilteredReplies()
    {
        return $this->replies()->orderBy('created_at');
    }

    public function getReplyPaginator()
    {
        $paginator = $this->getFilteredReplies()->simplePaginate(self::REPLIES_PER_PAGE, ['*'], 'comment-' . $this->id . '-page');
        $paginator->appends(['page' => $this->post->getPageForComment($this)]);
        $paginator->fragment('comment-' . $this->id);
        return $paginator;
    }

    public function getPageForReply(Reply $reply)
    {
        $page = 1;
        $found = false;

        do
        {
            $replies = $this->getFilteredReplies()->forPage($page, self::REPLIES_PER_PAGE)->get();

            foreach ($replies as $item)
            {
                if ($item->id == $reply->id)
                {
                    $found = true;
                    return $page;
                }
            }

            $page++;
        } while (!$found);

        return 0;
    }

    /* Links */

    public function getExactPage()
    {
        return $this->post->getPageForComment($this);
    }

    public function route()
    {
        $url = route('view-post', $this->post->id);
        $page = $this->post->getPageForComment($this);

        if ($page > 1) $url .= '?page=' . $page;

        $url .= '#comment-' . $this->id;
        return $url;
    }

    public function redirect()
    {
        return redirect()->to($this->route());
    }

    public function delete($user = null)
    {
        event(new CommentDeleted(isset($user) ? $user : $this->user, $this));

        $this->images()->each(function ($image) {
            $image->delete();
        });

        $this->replies->each(function ($reply) {
            $reply->images()->each(function ($image) {
                $image->delete();
            });
        });

        $this->ratings->each(function ($rating) {
            $rating->delete();
        });

        $this->replies->each(function ($reply) {
            $reply->ratings->each(function ($rating) {
                $rating->delete();
            });
        });

        parent::delete();
    }
}
