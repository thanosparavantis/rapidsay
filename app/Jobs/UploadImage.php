<?php

namespace Forum\Jobs;

use Image;
use Storage;
use Carbon\Carbon;
use Forum\Post;
use Forum\Image as ImageMedia;
use Forum\Interfaces\AcceptsImages;
use Forum\Jobs\Job;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UploadImage extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    private $item, $id, $update;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(AcceptsImages $item, $id, $update)
    {
        $this->item = $item;
        $this->id = $id;
        $this->update = $update;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $path = Storage::disk('images')->getDriver()->getAdapter()->getPathPrefix();
        Image::make($path . $this->id . '.png')->encode('png')->save();

        $image = new ImageMedia(['url' => $this->id]);
        $this->item->images()->save($image);

        if ($this->update) {
            $this->item->updated_at = Carbon::now()->toDateTimeString();
            $this->item->save();
        }
    }
}
