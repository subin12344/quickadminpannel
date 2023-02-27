<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAssignStudentRequest;
use App\Http\Requests\StoreAssignStudentRequest;
use App\Http\Requests\UpdateAssignStudentRequest;
use App\Models\AssignStudent;
use App\Models\CourseEnrollMaster;
use App\Models\Createvehicle;
use App\Models\TransportRoute;
use App\Models\TransportStop;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AssignStudentController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('assign_student_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $assignStudents = AssignStudent::with(['name', 'master', 'route', 'vehicle_name', 'stop_name', 'amount'])->get();

        return view('admin.assignStudents.index', compact('assignStudents'));
    }

    public function create()
    {
        abort_if(Gate::denies('assign_student_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $names = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $masters = CourseEnrollMaster::pluck('enroll_number', 'id')->prepend(trans('global.pleaseSelect'), '');

        $routes = TransportRoute::pluck('route_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $vehicle_names = Createvehicle::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $stop_names = TransportStop::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.assignStudents.create', compact('masters', 'names', 'routes', 'stop_names', 'vehicle_names'));
    }

    public function store(StoreAssignStudentRequest $request)
    {
        $assignStudent = AssignStudent::create($request->all());

        return redirect()->route('admin.assign-students.index');
    }

    public function edit(AssignStudent $assignStudent)
    {
        abort_if(Gate::denies('assign_student_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $names = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $masters = CourseEnrollMaster::pluck('enroll_number', 'id')->prepend(trans('global.pleaseSelect'), '');

        $routes = TransportRoute::pluck('route_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $vehicle_names = Createvehicle::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $stop_names = TransportStop::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $assignStudent->load('name', 'master', 'route', 'vehicle_name', 'stop_name', 'amount');

        return view('admin.assignStudents.edit', compact('assignStudent', 'masters', 'names', 'routes', 'stop_names', 'vehicle_names'));
    }

    public function update(UpdateAssignStudentRequest $request, AssignStudent $assignStudent)
    {
        $assignStudent->update($request->all());

        return redirect()->route('admin.assign-students.index');
    }

    public function show(AssignStudent $assignStudent)
    {
        abort_if(Gate::denies('assign_student_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $assignStudent->load('name', 'master', 'route', 'vehicle_name', 'stop_name', 'amount');

        return view('admin.assignStudents.show', compact('assignStudent'));
    }

    public function destroy(AssignStudent $assignStudent)
    {
        abort_if(Gate::denies('assign_student_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $assignStudent->delete();

        return back();
    }

    public function massDestroy(MassDestroyAssignStudentRequest $request)
    {
        $assignStudents = AssignStudent::find(request('ids'));

        foreach ($assignStudents as $assignStudent) {
            $assignStudent->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
