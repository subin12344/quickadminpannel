<?php

namespace App\Http\Requests;

use App\Models\TransportStop;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreTransportStopRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('transport_stop_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'route_name_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
