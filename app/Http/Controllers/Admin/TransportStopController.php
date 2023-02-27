<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyTransportStopRequest;
use App\Http\Requests\StoreTransportStopRequest;
use App\Http\Requests\UpdateTransportStopRequest;
use App\Models\TransportRoute;
use App\Models\TransportStop;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TransportStopController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('transport_stop_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $transportStops = TransportStop::with(['route_name'])->get();

        return view('admin.transportStops.index', compact('transportStops'));
    }

    public function create()
    {
        abort_if(Gate::denies('transport_stop_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $route_names = TransportRoute::pluck('route_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.transportStops.create', compact('route_names'));
    }

    public function store(StoreTransportStopRequest $request)
    {
        $transportStop = TransportStop::create($request->all());

        return redirect()->route('admin.transport-stops.index');
    }

    public function edit(TransportStop $transportStop)
    {
        abort_if(Gate::denies('transport_stop_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $route_names = TransportRoute::pluck('route_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $transportStop->load('route_name');

        return view('admin.transportStops.edit', compact('route_names', 'transportStop'));
    }

    public function update(UpdateTransportStopRequest $request, TransportStop $transportStop)
    {
        $transportStop->update($request->all());

        return redirect()->route('admin.transport-stops.index');
    }

    public function show(TransportStop $transportStop)
    {
        abort_if(Gate::denies('transport_stop_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $transportStop->load('route_name');

        return view('admin.transportStops.show', compact('transportStop'));
    }

    public function destroy(TransportStop $transportStop)
    {
        abort_if(Gate::denies('transport_stop_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $transportStop->delete();

        return back();
    }

    public function massDestroy(MassDestroyTransportStopRequest $request)
    {
        $transportStops = TransportStop::find(request('ids'));

        foreach ($transportStops as $transportStop) {
            $transportStop->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
