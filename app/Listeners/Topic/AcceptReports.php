<?php

namespace Forum\Listeners\Topic;

use Forum\Events\Admin\ReportAccepted;

class AcceptReports
{
    public function onPostEdit($event)
    {
        $post = $event->post;
        $user = $event->user;
        $this->acceptPendingReports($post, $user);
    }

    public function onCommentEdit($event)
    {
        $comment = $event->comment;
        $user = $event->user;
        $this->acceptPendingReports($comment, $user);
    }

    public function onReplyEdit($event)
    {
        $reply = $event->reply;
        $user = $event->user;
        $this->acceptPendingReports($reply, $user);
    }

    public function onPostDelete($event)
    {
        $post = $event->post;
        $user = $event->user;
        $this->acceptPendingReports($post, $user, true);
    }

    public function onCommentDelete($event)
    {
        $comment = $event->comment;
        $user = $event->user;
        $this->acceptPendingReports($comment, $user, true);
    }

    public function onReplyDelete($event)
    {
        $reply = $event->reply;
        $user = $event->user;
        $this->acceptPendingReports($reply, $user, true);
    }

    private function acceptPendingReports($item, $user, $deleted = false)
    {
        if ($item->reports->count() && $user->admin)
        {
            $item->reports->each(function ($report) use ($item, $deleted) {
                $report->status = 'accepted';

                if ($deleted)
                {
                    $report->action = 'delete';

                    if (property_exists($item, 'title'))
                    {
                        $report->deleted_data = $item->title;
                    }
                    else
                    {
                        $report->deleted_data = $item->body;
                    }
                }
                else
                {
                    $report->action = 'edit';
                }

                $report->save();
                event(new ReportAccepted($report));
            });
        }
    }

    public function subscribe($events)
    {
        $events->listen(
            'Forum\Events\Topic\PostEdited',
            'Forum\Listeners\Topic\AcceptReports@onPostEdit'
        );

        $events->listen(
            'Forum\Events\Topic\CommentEdited',
            'Forum\Listeners\Topic\AcceptReports@onCommentEdit'
        );

        $events->listen(
            'Forum\Events\Topic\ReplyEdited',
            'Forum\Listeners\Topic\AcceptReports@onReplyEdit'
        );

        $events->listen(
            'Forum\Events\Topic\PostDeleted',
            'Forum\Listeners\Topic\AcceptReports@onPostDelete'
        );

        $events->listen(
            'Forum\Events\Topic\CommentDeleted',
            'Forum\Listeners\Topic\AcceptReports@onCommentDelete'
        );

        $events->listen(
            'Forum\Events\Topic\ReplyDeleted',
            'Forum\Listeners\Topic\AcceptReports@onReplyDelete'
        );
    }
}