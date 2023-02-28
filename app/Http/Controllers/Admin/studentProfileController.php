<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyStudentprofileRequest;
use App\Http\Requests\StoreStudentprofileRequest;
use App\Http\Requests\UpdateStudentprofileRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\AssignStudent;
use App\Models\users;

class StudentprofileController extends Controller
{

    public function index($id)
    {
        // abort_if(Gate::denies('studentprofile_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        dd($id);
        // $studentprofiles = AssignStudent::with(['name', 'master', 'route', 'vehicle_name', 'stop_name', 'amount'])->get();
        $studentprofiles = Users::find($id);
        // return view('posts.show', compact('post'));

        return view('admin.studentprofiles.index', compact('studentprofiles'));
    }

    public function create()
    {
        // abort_if(Gate::denies('studentprofile_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.studentprofiles.create');
    }

    public function store(StoreStudentprofileRequest $request)
    {
        $studentprofile = Studentprofile::create($request->all());

        return redirect()->route('admin.studentprofiles.index');
    }

    public function edit(Studentprofile $studentprofile)
    {
        // abort_if(Gate::denies('studentprofile_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.studentprofiles.edit', compact('studentprofile'));
    }

    public function update(UpdateStudentprofileRequest $request, Studentprofile $studentprofile)
    {
        $studentprofile->update($request->all());

        return redirect()->route('admin.studentprofiles.index');
    }

    public function show(Studentprofile $studentprofile)
    {
        // abort_if(Gate::denies('studentprofile_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.studentprofiles.show', compact('studentprofile'));
    }

    public function destroy(Studentprofile $studentprofile)
    {
        // abort_if(Gate::denies('studentprofile_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $studentprofile->delete();

        return back();
    }

    public function massDestroy(MassDestroyStudentprofileRequest $request)
    {
        $studentprofiles = Studentprofile::find(request('ids'));

        foreach ($studentprofiles as $studentprofile) {
            $studentprofile->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
