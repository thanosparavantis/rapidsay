<?php

namespace Forum\Http\Requests\Topic;

use Forum\Http\Requests\Request;

class PostRequest extends Request
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
        $rules = [
            'post_name' => 'honeypot',
            'post_time' => 'required|honeytime:1',
            'body' => 'required|between:3,10000',
        ];

        if ($this->hasFile('images'))
        {
            $bound = count($this->images) - 1;
            foreach(range(0, $bound) as $index)
            {
                $rules['images.' . $index] = 'file|mimes:png,jpeg,bmp|max:10000';
            }
        }

        return $rules;
    }
}
