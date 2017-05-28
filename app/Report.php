<?php

namespace Forum;

use Forum\Interfaces\Redirectable;
use Illuminate\Database\Eloquent\Model;

class Report extends Model implements Redirectable
{
    private $REPORTS_PER_PAGE = 10;
    protected $fillable = ['reporter_id', 'reportable_id', 'reportable_type', 'description', 'status', 'action', 'deleted_data'];

    public function reporter()
    {
        return $this->belongsTo('Forum\User', 'reporter_id');
    }

    public function reportable()
    {
        return $this->morphTo();
    }

    public function scopePendingPaginator($query)
    {
        return $query->where('status', 'pending')
        ->orderBy('created_at', 'desc')
        ->simplePaginate($this->REPORTS_PER_PAGE);
    }

    public static function getPendingCount()
    {
        return self::where('status', 'pending')->count();
    }

    public function route()
    {
        if ($this->reportable)
        {
            return $this->reportable->route();
        }
        else
        {
            return null;
        }
    }

    public function redirect()
    {
        if ($this->reportable)
        {
            return $this->reportable->redirect();
        }
        else
        {
            return null;
        }
    }

    public function getType()
    {
        return ModelHelper::namespaceModelToString($this->reportable_type);
    }

    public function getItem()
    {
        return ModelHelper::resolve($this->getType(), $this->reportable_id);
    }
}
