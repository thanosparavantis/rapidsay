<?php

namespace Forum\Http\Requests\Admin;

use Cache;
use Forum\Http\Requests\Request;

class AnnounceRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return !Cache::has('announcement');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'announcement_key' => 'required|trans_key',
        ];
    }
}
