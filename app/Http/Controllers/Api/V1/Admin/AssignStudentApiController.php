<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAssignStudentRequest;
use App\Http\Requests\UpdateAssignStudentRequest;
use App\Http\Resources\Admin\AssignStudentResource;
use App\Models\AssignStudent;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AssignStudentApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('assign_student_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AssignStudentResource(AssignStudent::with(['name', 'master', 'route', 'vehicle_name', 'stop_name', 'amount'])->get());
    }

    public function store(StoreAssignStudentRequest $request)
    {
        $assignStudent = AssignStudent::create($request->all());

        return (new AssignStudentResource($assignStudent))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(AssignStudent $assignStudent)
    {
        abort_if(Gate::denies('assign_student_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AssignStudentResource($assignStudent->load(['name', 'master', 'route', 'vehicle_name', 'stop_name', 'amount']));
    }

    public function update(UpdateAssignStudentRequest $request, AssignStudent $assignStudent)
    {
        $assignStudent->update($request->all());

        return (new AssignStudentResource($assignStudent))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(AssignStudent $assignStudent)
    {
        abort_if(Gate::denies('assign_student_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $assignStudent->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
