<?php

namespace Forum\Traits;

use Storage;
use Image;
use Carbon\Carbon;
use Forum\Image as ImageMedia;
use Forum\Jobs\UploadImage;
use Forum\Interfaces\AcceptsImages;
use Forum\Http\Requests\Request;
use Illuminate\Http\UploadedFile;

trait UploadsImages
{
    protected function uploadImage(Request $request, $field, AcceptsImages $item, $update = false)
    {
        if ($request->hasFile($field))
        {
            $image = $request->file($field);
            $this->handleImageUpload($image, $item, $update);
        }
    }

    protected function uploadImages(Request $request, $field, AcceptsImages $item, $update = false)
    {
        if ($request->hasFile($field))
        {
            $count = count($request->file($field));

            if ($count > 10) {
                return false;
            }

            foreach ($request->file($field) as $image)
            {
                $this->handleImageUpload($image, $item, $update);
            }
        }

        return true;
    }

    private function handleImageUpload(UploadedFile $image, AcceptsImages $item, $update = false)
    {
        $id = uniqid();
        $path = Storage::disk('images')->getDriver()->getAdapter()->getPathPrefix();

        Storage::disk('images')->put($id . '.png', file_get_contents($image->getRealPath()));
        Image::make($path . $id . '.png')->encode('png')->orientate()->save();

        $image = new ImageMedia(['url' => $id]);
        $item->images()->save($image);

        if ($update)
        {
            $item->updated_at = Carbon::now()->toDateTimeString();
            $item->save();
        }
    }
}
