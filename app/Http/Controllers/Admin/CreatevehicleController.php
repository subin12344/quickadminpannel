<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCreatevehicleRequest;
use App\Http\Requests\StoreCreatevehicleRequest;
use App\Http\Requests\UpdateCreatevehicleRequest;
use App\Models\Createvehicle;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CreatevehicleController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('createvehicle_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $createvehicles = Createvehicle::all();

        return view('admin.createvehicles.index', compact('createvehicles'));
    }

    public function create()
    {
        abort_if(Gate::denies('createvehicle_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.createvehicles.create');
    }

    public function store(StoreCreatevehicleRequest $request)
    {
        $createvehicle = Createvehicle::create($request->all());

        return redirect()->route('admin.createvehicles.index');
    }

    public function edit(Createvehicle $createvehicle)
    {
        abort_if(Gate::denies('createvehicle_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.createvehicles.edit', compact('createvehicle'));
    }

    public function update(UpdateCreatevehicleRequest $request, Createvehicle $createvehicle)
    {
        $createvehicle->update($request->all());

        return redirect()->route('admin.createvehicles.index');
    }

    public function show(Createvehicle $createvehicle)
    {
        abort_if(Gate::denies('createvehicle_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.createvehicles.show', compact('createvehicle'));
    }

    public function destroy(Createvehicle $createvehicle)
    {
        abort_if(Gate::denies('createvehicle_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $createvehicle->delete();

        return back();
    }

    public function massDestroy(MassDestroyCreatevehicleRequest $request)
    {
        $createvehicles = Createvehicle::find(request('ids'));

        foreach ($createvehicles as $createvehicle) {
            $createvehicle->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
