<?php

namespace Forum\Http\Requests\User;

use Forum\User;
use Forum\Http\Requests\Request;

class SubscribeRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $subscription = User::findOrFail(request()->userId);
        return request()->user()->can('subscribe', $subscription);
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
