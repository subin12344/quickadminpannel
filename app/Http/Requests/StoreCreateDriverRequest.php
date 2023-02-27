<?php

namespace App\Http\Requests;

use App\Models\CreateDriver;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCreateDriverRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('create_driver_create');
    }

    public function rules()
    {
        return [
            'licence_no' => [
                'string',
                'required',
            ],
            'expirydate' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'name' => [
                'string',
                'required',
            ],
        ];
    }
}
