<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTransportStopRequest;
use App\Http\Requests\UpdateTransportStopRequest;
use App\Http\Resources\Admin\TransportStopResource;
use App\Models\TransportStop;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TransportStopApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('transport_stop_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TransportStopResource(TransportStop::with(['route_name'])->get());
    }

    public function store(StoreTransportStopRequest $request)
    {
        $transportStop = TransportStop::create($request->all());

        return (new TransportStopResource($transportStop))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(TransportStop $transportStop)
    {
        abort_if(Gate::denies('transport_stop_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TransportStopResource($transportStop->load(['route_name']));
    }

    public function update(UpdateTransportStopRequest $request, TransportStop $transportStop)
    {
        $transportStop->update($request->all());

        return (new TransportStopResource($transportStop))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(TransportStop $transportStop)
    {
        abort_if(Gate::denies('transport_stop_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $transportStop->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
