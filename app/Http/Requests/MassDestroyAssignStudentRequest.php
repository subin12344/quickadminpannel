<?php

namespace App\Http\Requests;

use App\Models\AssignStudent;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyAssignStudentRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('assign_student_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:assign_students,id',
        ];
    }
}
