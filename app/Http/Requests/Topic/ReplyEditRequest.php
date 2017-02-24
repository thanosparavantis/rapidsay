<?php

namespace Forum\Http\Requests\Topic;

use Forum\Reply;
use Forum\Http\Requests\Request;

class ReplyEditRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $reply = Reply::findOrFail(request()->id);
        return request()->user()->can('edit', $reply);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'reply_edit_body' => 'required|max:10000',
            'reply_edit_image' => 'file|mimes:png,jpeg,bmp|max:10000',
        ];
    }
}
