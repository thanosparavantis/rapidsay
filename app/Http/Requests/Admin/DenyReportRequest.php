<?php

namespace Forum\Http\Requests\Admin;

use Forum\Report;
use Forum\Http\Requests\Request;

class DenyReportRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $report = Report::findOrFail(request()->id);
        return $report->status === 'pending';
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
