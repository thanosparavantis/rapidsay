<?php

namespace Forum\Http\Requests\Topic;

use Forum\Http\Requests\Request;

class ReplyRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'reply_name' => 'honeypot',
            'reply_time' => 'required|honeytime:1',
            'reply_body' => 'required|max:10000',
            'reply_image' => 'file|mimes:png,jpeg,bmp|max:10000',
        ];
    }
}
