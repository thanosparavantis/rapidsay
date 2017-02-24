<?php

namespace Forum\Http\Controllers\Topic;

use Auth;
use Storage;
use Forum\Post;
use Forum\Image;
use Forum\Comment;
use Forum\Reply;
use Forum\Report;
use Forum\ModelHelper;
use Carbon\Carbon;
use Forum\Http\Requests\Topic\ReportRequest;
use Forum\Http\Controllers\Controller;

class TopicController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['only' => ['deleteImage', 'showReport', 'report']]);
    }

    public function deleteImage($type, $id, $url)
    {
        $item = ModelHelper::resolve($type, $id);
        $image = $item->images()->where('url', $url)->firstOrFail();

        if ($this->authorize('edit', $item))
        {
            Storage::disk('images')->delete($image->url . '.png');
            $image->delete();

            $item->updated_at = Carbon::now()->toDateTimeString();
            $item->save();

            return redirect()->back();
        }
    }

    public function showReport($type, $id)
    {
        $item = ModelHelper::resolve($type, $id);

        if ($this->authorize('report', $item)) {
            return view('topic.report', ['item' => $item, 'type' => $type, 'id' => $id]);
        }
    }

    public function report(ReportRequest $request, $type, $id)
    {
        $item = ModelHelper::resolve($type, $id);

        $report = new Report([
            'reporter_id' => auth()->user()->id,
            'description' => $request->description,
        ]);

        $item->reports()->save($report);

        if (method_exists($item, 'post'))
        {
            return $item->post->redirect()->with('status', trans('report.message.received'));
        }
        else if (method_exists($item, 'comment'))
        {
            return $item->comment->post->redirect()->with('status', trans('report.message.received'));
        }
        else
        {
            return $item->redirect()->with('status', trans('report.message.received'));
        }
    }
}
