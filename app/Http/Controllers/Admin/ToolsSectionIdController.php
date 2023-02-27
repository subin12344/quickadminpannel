<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyToolsSectionIdRequest;
use App\Http\Requests\StoreToolsSectionIdRequest;
use App\Http\Requests\UpdateToolsSectionIdRequest;
use App\Models\ToolsSectionId;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ToolsSectionIdController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('tools_section_id_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $toolsSectionIds = ToolsSectionId::all();

        return view('admin.toolsSectionIds.index', compact('toolsSectionIds'));
    }

    public function create()
    {
        abort_if(Gate::denies('tools_section_id_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.toolsSectionIds.create');
    }

    public function store(StoreToolsSectionIdRequest $request)
    {
        $toolsSectionId = ToolsSectionId::create($request->all());

        return redirect()->route('admin.tools-section-ids.index');
    }

    public function edit(ToolsSectionId $toolsSectionId)
    {
        abort_if(Gate::denies('tools_section_id_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.toolsSectionIds.edit', compact('toolsSectionId'));
    }

    public function update(UpdateToolsSectionIdRequest $request, ToolsSectionId $toolsSectionId)
    {
        $toolsSectionId->update($request->all());

        return redirect()->route('admin.tools-section-ids.index');
    }

    public function show(ToolsSectionId $toolsSectionId)
    {
        abort_if(Gate::denies('tools_section_id_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.toolsSectionIds.show', compact('toolsSectionId'));
    }

    public function destroy(ToolsSectionId $toolsSectionId)
    {
        abort_if(Gate::denies('tools_section_id_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $toolsSectionId->delete();

        return back();
    }

    public function massDestroy(MassDestroyToolsSectionIdRequest $request)
    {
        $toolsSectionIds = ToolsSectionId::find(request('ids'));

        foreach ($toolsSectionIds as $toolsSectionId) {
            $toolsSectionId->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
