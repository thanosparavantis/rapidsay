<?php

namespace Forum\Http\Requests\Topic;

use Forum\Post;
use Forum\Http\Requests\Request;

class PostEditRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $post = Post::findOrFail(request()->id);
        return auth()->user()->can('edit', $post);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'post_edit_body' => 'required|between:3,10000',
        ];

        if ($this->hasFile('post_edit_images'))
        {
            $bound = count($this->edit_images) - 1;
            foreach(range(0, $bound) as $index)
            {
                $rules['post_edit_images.' . $index] = 'file|mimes:png,jpeg,bmp|max:10000';
            }
        }

        return $rules;
    }
}
