<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCreateDriverRequest;
use App\Http\Requests\UpdateCreateDriverRequest;
use App\Http\Resources\Admin\CreateDriverResource;
use App\Models\CreateDriver;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CreateDriverApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('create_driver_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CreateDriverResource(CreateDriver::all());
    }

    public function store(StoreCreateDriverRequest $request)
    {
        $createDriver = CreateDriver::create($request->all());

        return (new CreateDriverResource($createDriver))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(CreateDriver $createDriver)
    {
        abort_if(Gate::denies('create_driver_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CreateDriverResource($createDriver);
    }

    public function update(UpdateCreateDriverRequest $request, CreateDriver $createDriver)
    {
        $createDriver->update($request->all());

        return (new CreateDriverResource($createDriver))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(CreateDriver $createDriver)
    {
        abort_if(Gate::denies('create_driver_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $createDriver->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
