<?php

namespace Forum\Http\Requests\User;

use Forum\Http\Requests\Request;

class UpdateProfileRequest extends Request
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
            'first_name' => 'alpha|max:35',
            'last_name' => 'alpha|max:35',
            'description' => 'max:300',
            'profile_picture' => 'file|mimes:png,jpeg,bmp|max:10000'
        ];
    }
}
