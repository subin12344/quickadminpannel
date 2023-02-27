<?php

namespace App\Http\Requests;

use App\Models\CourseEnrollMaster;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCourseEnrollMasterRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('course_enroll_master_create');
    }

    public function rules()
    {
        return [
            'degreetype_id' => [
                'required',
                'integer',
            ],
            'batch_id' => [
                'required',
                'integer',
            ],
            'course_id' => [
                'required',
                'integer',
            ],
            'status_at' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'enroll_number' => [
                'string',
                'required',
            ],
        ];
    }
}
