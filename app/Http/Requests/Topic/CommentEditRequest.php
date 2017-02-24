<?php

namespace Forum\Http\Requests\Topic;

use Forum\Comment;
use Forum\Http\Requests\Request;

class CommentEditRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $comment = Comment::findOrFail(request()->id);
        return request()->user()->can('edit', $comment);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'comment_edit_body' => 'required|max:10000',
            'comment_edit_image' => 'file|mimes:png,jpeg,bmp|max:10000',
        ];
    }
}
