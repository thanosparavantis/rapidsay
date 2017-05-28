<?php

namespace Forum;

use DateTime;
use Forum\Interfaces\Redirectable;
use Forum\Interfaces\AcceptsImages;
use Forum\Interfaces\CanBeSearched;
use Forum\Traits\Rateable;
use Forum\Traits\UserContentItem;
use Forum\Events\Topic\PostDeleted;
use Illuminate\Database\Eloquent\Model;

class Post extends Model implements Redirectable, AcceptsImages, CanBeSearched
{
    use UserContentItem, Rateable;

    const COMMENTS_PER_PAGE     = 10;

    protected $fillable = [
        'user_id',
        'title',
        'body',
        'slug',
    ];

    /* Relationships */

    /**
     * A post belongs to a user.
     */
    public function user()
    {
        return $this->belongsTo('Forum\User');
    }

    /**
     * A post can have many images.
     */
    public function images()
    {
        return $this->morphMany('Forum\Image', 'imageable');
    }

    /**
     * A post can have many comments.
     */
    public function comments()
    {
        return $this->hasMany('Forum\Comment');
    }

    /**
     * A post can have many reports.
     */
    public function reports()
    {
        return $this->morphMany('Forum\Report', 'reportable');
    }

    /**
     * A post can have users subscribed to notifications.
     */
    public function notificationSubscriptions()
    {
        return $this->hasMany('Forum\notificationSubscriptions');
    }

    // Slug, body

    public function setSlugAttribute($value)
    {
        $slug = $value;
        $count = 1;
        while (Post::where('slug', $slug)->count())
        {
            $count++;
            $slug = $value . '-' . $count;
        }

        $this->attributes['slug'] = $slug;
    }

    public function setBodyAttribute($value)
    {
        $this->attributes['body'] = TextHelper::formatBlankLines($value);
    }

    public function getLinkCount()
    {
        return TextHelper::getLinkCount($this->body);
    }

    /* Search */

    public function scopeGetDefaultSearchResults($query)
    {
        $date = new DateTime;
        $date->modify('-1 week');
        $lastWeek = $date->format('Y-m-d H:i:s');

        return $query->withCount('ratings')
            ->where('created_at', '>=', $lastWeek)      // Show posts from this week.
            ->orderBy('ratings_count', 'desc')          // Order posts by ratings.
            ->orderBy('created_at', 'desc')             // Show newly created posts first.
            ->get();
    }

    public function scopeGetSearchResults($query, $search)
    {
        $searchValues = preg_split('/\s+/', $search, -1, PREG_SPLIT_NO_EMPTY);

        $query->where(function ($query) use ($searchValues) {
            foreach ($searchValues as $value) $query->orWhere('body', 'LIKE', "%$value%");
        });

        return $query->withCount('ratings')->orderBy('ratings_count', 'desc')->get();
    }

    /* Comments */

    private function getFilteredComments()
    {
        return $this->comments()->orderBy('created_at');
    }

    public function getCommentPaginator()
    {
        return $this->getFilteredComments()->paginate(self::COMMENTS_PER_PAGE);
    }

    public function getPageForComment(Comment $comment)
    {
        // We start the search from the first page.
        $page = 1;

        // Whether or not the page of the comment was found.
        $found = false;

        do
        {
            // Get the comments for each page (1, 2, 3 etc).
            $items = $this->getFilteredComments()->forPage($page, self::COMMENTS_PER_PAGE)->get();

            // Iterate through the comments on each page.
            foreach ($items as $item)
            {
                // If the comment is found on that page, return the page number.
                if ($item->id == $comment->id)
                {
                    $found = true;
                    return $page;
                }
            }

            // If the comment is not on the first page, keep searching.
            $page++;
        } while(!$found);

        return 0;
    }

    public function getLastCommentPage()
    {
        return $this->getCommentPaginator()->lastPage();
    }

    /* Similar */

    public function scopeGetSimilar($query)
    {
        $searchValues = preg_split('/\s+/', $this->body, -1, PREG_SPLIT_NO_EMPTY);

        $query->where('id', '!=', $this->id)
        ->where(function ($query) use ($searchValues) {
            foreach ($searchValues as $value) $query->orWhere('body', 'LIKE', "%$value%");
        });

        if (auth()->check()) $query->where('user_id', '!=', auth()->user()->id);
        return $query->orderBy('created_at', 'desc')->take(1)->first();
    }

    public function hasSimilar()
    {
        return $this->getSimilar()->count();
    }

    /* Links */

    public function route()
    {
        $id = $this->id;
        return route('view-post', $id);
    }

    public function redirect()
    {
        return redirect()->to($this->route());
    }

    public function delete($user = null)
    {
        event(new PostDeleted(isset($user) ? $user : $this->user, $this));

        // Delete all post images.

        $this->images()->each(function ($image) {
            $image->delete();
        });

        $this->comments->each(function ($comment) {
            $comment->images()->each(function ($image) {
                $image->delete();
            });

            $comment->replies->each(function ($reply) {
                $reply->images()->each(function ($image) {
                    $image->delete();
                });
            });
        });

        // Delete all post ratings.

        $this->ratings->each(function ($rating) {
            $rating->delete();
        });

        $this->comments->each(function ($comment) {
            $comment->ratings->each(function ($rating) {
                $rating->delete();
            });

            $comment->replies->each(function ($reply) {
                $reply->ratings->each(function ($rating) {
                    $rating->delete();
                });
            });
        });

        // Call default delete.

        parent::delete();
    }
}
