<?php

namespace Forum;

use \Illuminate\Console\AppNamespaceDetectorTrait;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use AppNamespaceDetectorTrait;

    protected $fillable = ['type', 'type_id', 'action', 'from_id', 'to_id', 'data', 'deleted_data', 'seen'];
    protected $casts = ['seen' => 'boolean'];

    public function user()
    {
        $this->belongsTo('Forum\User');
    }

    public function getIcon()
    {
        return config('glyphicons.' . $this->type);
    }

    public function getMessage()
    {
        $variables = [];
        $variables['someone'] = $this->getFrom();
        if (!$this->data) $variables['reference'] = $this->getReference();
        if ($extra = $this->getExtraData()) $variables['extra'] = $extra;

        return trans('notification.' . $this->type . '.' . $this->action, $variables);
    }

    private function getFrom()
    {
        if ($this->from_id)
        {
            $user = User::findOrFail($this->from_id);
            return '<a href="' . route('user-profile', $user->username) . '">' . $user->fullName() . '</a>';
        }
        else
        {
            return trans('notification.admin');
        }
    }

    private function getReference()
    {
        $item = $this->getItem();
        $text = TextHelper::raw(str_limit($this->getText(), 140));

        if ($item && $this->getRoute())
        {
            return '<a href="' . $this->getRoute() . '">' . $text . '</a>';
        }
        else
        {
            return $text;
        }
    }

    private function getText()
    {
        if ($this->deleted_data)
        {
            return $this->deleted_data;
        }
        else
        {
            $item = $this->getItem();

            if ($this->type === 'post')
            {
                return $item->body;
            }
            else if ($this->type === 'comment')
            {
                return $this->action === 'create' ? $item->post->body : $item->body;
            }
            else if ($this->type === 'reply')
            {
                return $this->action === 'create' ? $item->comment->body : $item->body;
            }
            else if ($this->type === 'rating')
            {
                return $item->rateable->body;
            }
            else if ($this->type === 'report')
            {
                if ($item->reportable)
                {
                    return $item->reportable->body;
                }
                else
                {
                    return $item->deleted_data;
                }
            }
            else
            {
                return trans('notification.you');
            }
        }
    }

    private function getExtraData()
    {
        if ($this->data)
        {
            return $this->data;
        }
        else
        {
            $item = $this->getItem();

            if ($item && $item instanceof Report)
            {
                $action = $item->action;

                if ($action === 'edit')
                {
                    return trans('notification.edited');
                }
                else
                {
                    return trans('notification.deleted');
                }
            }

            return null;
        }
    }

    private function getRoute()
    {
        return $this->getItem()->route();
    }

    private function getItem()
    {
        $namespace = $this->getAppNamespace() . ucfirst($this->type);

        if ($this->type === 'subscriber') {
            $namespace = $this->getAppNamespace() . 'User';
        }

        return $namespace::find($this->type_id);
    }
}
