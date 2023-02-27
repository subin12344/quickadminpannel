<?php

namespace App\Http\Requests;

use App\Models\AssignStudent;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateAssignStudentRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('assign_student_edit');
    }

    public function rules()
    {
        return [
            'name_id' => [
                'required',
                'integer',
            ],
            'master_id' => [
                'required',
                'integer',
            ],
            'route_id' => [
                'required',
                'integer',
            ],
            'vehicle_name_id' => [
                'required',
                'integer',
            ],
            'stop_name_id' => [
                'required',
                'integer',
            ],
            'fromdate' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'todate' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
        ];
    }
}
