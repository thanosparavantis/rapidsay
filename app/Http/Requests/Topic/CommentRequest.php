<?php

namespace Forum\Http\Requests\Topic;

use Auth;
use Forum\Http\Requests\Request;

class CommentRequest extends Request
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
            'comment_name' => 'honeypot',
            'comment_time' => 'required|honeytime:1',
            'comment_body' => 'required|max:10000',
            'comment_image' => 'file|mimes:png,jpeg,bmp|max:10000',
        ];
    }
}
