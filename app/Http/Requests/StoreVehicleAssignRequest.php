<?php

namespace App\Http\Requests;

use App\Models\VehicleAssign;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreVehicleAssignRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('vehicle_assign_create');
    }

    public function rules()
    {
        return [
            'driver_id' => [
                'required',
                'integer',
            ],
            'route_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
