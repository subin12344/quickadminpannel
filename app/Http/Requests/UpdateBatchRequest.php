<?php

namespace App\Http\Requests;

use App\Models\Batch;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateBatchRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('batch_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'max:20',
                'required',
            ],
            'from' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'to' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'admission_date' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'date_leaving' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'syllabus_year_id' => [
                'required',
                'integer',
            ],
            'academic_year_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
