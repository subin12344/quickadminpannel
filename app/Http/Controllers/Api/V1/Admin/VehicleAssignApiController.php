<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreVehicleAssignRequest;
use App\Http\Requests\UpdateVehicleAssignRequest;
use App\Http\Resources\Admin\VehicleAssignResource;
use App\Models\VehicleAssign;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VehicleAssignApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('vehicle_assign_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new VehicleAssignResource(VehicleAssign::with(['driver', 'route', 'vehicle_name'])->get());
    }

    public function store(StoreVehicleAssignRequest $request)
    {
        $vehicleAssign = VehicleAssign::create($request->all());

        return (new VehicleAssignResource($vehicleAssign))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(VehicleAssign $vehicleAssign)
    {
        abort_if(Gate::denies('vehicle_assign_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new VehicleAssignResource($vehicleAssign->load(['driver', 'route', 'vehicle_name']));
    }

    public function update(UpdateVehicleAssignRequest $request, VehicleAssign $vehicleAssign)
    {
        $vehicleAssign->update($request->all());

        return (new VehicleAssignResource($vehicleAssign))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(VehicleAssign $vehicleAssign)
    {
        abort_if(Gate::denies('vehicle_assign_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $vehicleAssign->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
