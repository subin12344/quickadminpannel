<?php

namespace App\Http\Requests;

use App\Models\Createvehicle;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyCreatevehicleRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('createvehicle_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:createvehicles,id',
        ];
    }
}
