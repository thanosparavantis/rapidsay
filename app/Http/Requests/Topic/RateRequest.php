<?php

namespace Forum\Http\Requests\Topic;

use Forum\Http\Requests\Request;

class RateRequest extends Request
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
            'plain' => 'boolean',
        ];
    }
}
