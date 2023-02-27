<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCreatevehicleRequest;
use App\Http\Requests\UpdateCreatevehicleRequest;
use App\Http\Resources\Admin\CreatevehicleResource;
use App\Models\Createvehicle;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CreatevehicleApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('createvehicle_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CreatevehicleResource(Createvehicle::all());
    }

    public function store(StoreCreatevehicleRequest $request)
    {
        $createvehicle = Createvehicle::create($request->all());

        return (new CreatevehicleResource($createvehicle))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Createvehicle $createvehicle)
    {
        abort_if(Gate::denies('createvehicle_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CreatevehicleResource($createvehicle);
    }

    public function update(UpdateCreatevehicleRequest $request, Createvehicle $createvehicle)
    {
        $createvehicle->update($request->all());

        return (new CreatevehicleResource($createvehicle))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Createvehicle $createvehicle)
    {
        abort_if(Gate::denies('createvehicle_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $createvehicle->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
