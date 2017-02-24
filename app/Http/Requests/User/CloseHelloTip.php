<?php

namespace Forum\Http\Requests\User;

use Forum\Http\Requests\Request;

class CloseHelloTip extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return !auth()->user()->hasClosedHelloTip();
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
