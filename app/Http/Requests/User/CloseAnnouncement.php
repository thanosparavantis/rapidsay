<?php

namespace Forum\Http\Requests\User;

use Forum\Http\Requests\Request;

class CloseAnnouncement extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return !auth()->user()->hasClosedAnnouncement();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }
}
