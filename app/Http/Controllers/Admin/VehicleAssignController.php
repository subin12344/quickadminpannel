<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyVehicleAssignRequest;
use App\Http\Requests\StoreVehicleAssignRequest;
use App\Http\Requests\UpdateVehicleAssignRequest;
use App\Models\CreateDriver;
use App\Models\Createvehicle;
use App\Models\TransportRoute;
use App\Models\VehicleAssign;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VehicleAssignController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('vehicle_assign_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $vehicleAssigns = VehicleAssign::with(['driver', 'route', 'vehicle_name'])->get();

        return view('admin.vehicleAssigns.index', compact('vehicleAssigns'));
    }

    public function create()
    {
        abort_if(Gate::denies('vehicle_assign_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $drivers = CreateDriver::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $routes = TransportRoute::pluck('route_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $vehicle_names = Createvehicle::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.vehicleAssigns.create', compact('drivers', 'routes', 'vehicle_names'));
    }

    public function store(StoreVehicleAssignRequest $request)
    {
        $vehicleAssign = VehicleAssign::create($request->all());

        return redirect()->route('admin.vehicle-assigns.index');
    }

    public function edit(VehicleAssign $vehicleAssign)
    {
        abort_if(Gate::denies('vehicle_assign_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $drivers = CreateDriver::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $routes = TransportRoute::pluck('route_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $vehicle_names = Createvehicle::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $vehicleAssign->load('driver', 'route', 'vehicle_name');

        return view('admin.vehicleAssigns.edit', compact('drivers', 'routes', 'vehicleAssign', 'vehicle_names'));
    }

    public function update(UpdateVehicleAssignRequest $request, VehicleAssign $vehicleAssign)
    {
        $vehicleAssign->update($request->all());

        return redirect()->route('admin.vehicle-assigns.index');
    }

    public function show(VehicleAssign $vehicleAssign)
    {
        abort_if(Gate::denies('vehicle_assign_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $vehicleAssign->load('driver', 'route', 'vehicle_name');

        return view('admin.vehicleAssigns.show', compact('vehicleAssign'));
    }

    public function destroy(VehicleAssign $vehicleAssign)
    {
        abort_if(Gate::denies('vehicle_assign_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $vehicleAssign->delete();

        return back();
    }

    public function massDestroy(MassDestroyVehicleAssignRequest $request)
    {
        $vehicleAssigns = VehicleAssign::find(request('ids'));

        foreach ($vehicleAssigns as $vehicleAssign) {
            $vehicleAssign->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
