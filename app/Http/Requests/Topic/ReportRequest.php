<?php

namespace Forum\Http\Requests\Topic;

use Forum\ModelHelper;
use Forum\Http\Requests\Request;

class ReportRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $item = ModelHelper::resolve(request()->type, request()->id);
        return request()->user()->can('report', $item);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'description' => 'required|max:1000'
        ];
    }
}
