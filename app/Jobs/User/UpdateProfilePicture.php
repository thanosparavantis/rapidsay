<?php

namespace Forum\Jobs\User;

use Storage;
use Image;
use Forum\User;
use Forum\Jobs\Job;
use Illuminate\Http\UploadedFile;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UpdateProfilePicture extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    private $user, $id;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(User $user, $id)
    {
        $this->user = $user;
        $this->id = $id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Image::make(Storage::disk('profile-pictures')->getDriver()->getAdapter()->getPathPrefix() . $this->id . '.png')->encode('png')->orientate()->fit(250, 250, function ($constraint) {
            $constraint->upsize();
        })->save();

        $this->user->profile_picture = $this->id;
        $this->user->save();
    }
}
