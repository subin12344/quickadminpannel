<?php

namespace App\Http\Requests;

use App\Models\Createvehicle;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCreatevehicleRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('createvehicle_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'vehicle_no' => [
                'string',
                'nullable',
            ],
            'seats' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
