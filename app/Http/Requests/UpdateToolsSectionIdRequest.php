<?php

namespace App\Http\Requests;

use App\Models\ToolsSectionId;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateToolsSectionIdRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('tools_section_id_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
