<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCreateDriverRequest;
use App\Http\Requests\StoreCreateDriverRequest;
use App\Http\Requests\UpdateCreateDriverRequest;
use App\Models\CreateDriver;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CreateDriverController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('create_driver_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $createDrivers = CreateDriver::all();

        return view('admin.createDrivers.index', compact('createDrivers'));
    }

    public function create()
    {
        abort_if(Gate::denies('create_driver_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.createDrivers.create');
    }

    public function store(StoreCreateDriverRequest $request)
    {
        $createDriver = CreateDriver::create($request->all());

        return redirect()->route('admin.create-drivers.index');
    }

    public function edit(CreateDriver $createDriver)
    {
        abort_if(Gate::denies('create_driver_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.createDrivers.edit', compact('createDriver'));
    }

    public function update(UpdateCreateDriverRequest $request, CreateDriver $createDriver)
    {
        $createDriver->update($request->all());

        return redirect()->route('admin.create-drivers.index');
    }

    public function show(CreateDriver $createDriver)
    {
        abort_if(Gate::denies('create_driver_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.createDrivers.show', compact('createDriver'));
    }

    public function destroy(CreateDriver $createDriver)
    {
        abort_if(Gate::denies('create_driver_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $createDriver->delete();

        return back();
    }

    public function massDestroy(MassDestroyCreateDriverRequest $request)
    {
        $createDrivers = CreateDriver::find(request('ids'));

        foreach ($createDrivers as $createDriver) {
            $createDriver->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
