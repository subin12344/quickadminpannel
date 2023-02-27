<?php

namespace App\Http\Requests;

use App\Models\VehicleAssign;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateVehicleAssignRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('vehicle_assign_edit');
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
