<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreVehicleAssignRequest;
use App\Http\Requests\UpdateVehicleAssignRequest;
use App\Models\CreateDriver;
use App\Models\Createvehicle;
use App\Models\TransportRoute;
use App\Models\VehicleAssign;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VehicleAssignController extends Controller
{
    public function index()
    {
        $vehicleAssigns = VehicleAssign::with(['driver', 'route', 'vehicle_name'])->get();
        return view('admin.vehicleAssigns.index', compact('vehicleAssigns'));
    }

    public function create()
    {
        $drivers = CreateDriver::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        $routes = TransportRoute::pluck('route_name', 'id')->prepend(trans('global.pleaseSelect'), '');
        $vehicle_names = Createvehicle::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        return view('admin.vehicleAssigns.create', compact('drivers', 'routes', 'vehicle_names'));
    }

    public function store(StoreVehicleAssignRequest $request)
    {
        VehicleAssign::create($request->all());
        return redirect()->route('admin.vehicle-assigns.index');
    }

    public function edit(VehicleAssign $vehicleAssign)
    {
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

    public function destroy(VehicleAssign $vehicleAssign)
    {
        $vehicleAssign->delete();
        return back();
    }

    public function massDestroy()
    {
        VehicleAssign::whereIn('id', request('ids'))->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
