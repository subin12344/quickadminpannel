<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreToolsSectionIdRequest;
use App\Http\Requests\UpdateToolsSectionIdRequest;
use App\Http\Resources\Admin\ToolsSectionIdResource;
use App\Models\ToolsSectionId;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ToolsSectionIdApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('tools_section_id_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ToolsSectionIdResource(ToolsSectionId::all());
    }

    public function store(StoreToolsSectionIdRequest $request)
    {
        $toolsSectionId = ToolsSectionId::create($request->all());

        return (new ToolsSectionIdResource($toolsSectionId))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ToolsSectionId $toolsSectionId)
    {
        abort_if(Gate::denies('tools_section_id_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ToolsSectionIdResource($toolsSectionId);
    }

    public function update(UpdateToolsSectionIdRequest $request, ToolsSectionId $toolsSectionId)
    {
        $toolsSectionId->update($request->all());

        return (new ToolsSectionIdResource($toolsSectionId))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ToolsSectionId $toolsSectionId)
    {
        abort_if(Gate::denies('tools_section_id_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $toolsSectionId->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
