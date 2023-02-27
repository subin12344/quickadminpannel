<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCourseEnrollMasterRequest;
use App\Http\Requests\StoreCourseEnrollMasterRequest;
use App\Http\Requests\UpdateCourseEnrollMasterRequest;
use App\Models\AcademicYear;
use App\Models\Batch;
use App\Models\CourseEnrollMaster;
use App\Models\ToolsCourse;
use App\Models\ToolsDegreeType;
use App\Models\ToolsDepartment;
use App\Models\ToolsSectionId;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class CourseEnrollMasterController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('course_enroll_master_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = CourseEnrollMaster::with(['degreetype', 'academic', 'batch', 'course', 'section', 'department'])->select(sprintf('%s.*', (new CourseEnrollMaster)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'course_enroll_master_show';
                $editGate      = 'course_enroll_master_edit';
                $deleteGate    = 'course_enroll_master_delete';
                $crudRoutePart = 'course-enroll-masters';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->addColumn('degreetype_name', function ($row) {
                return $row->degreetype ? $row->degreetype->name : '';
            });

            $table->addColumn('academic_name', function ($row) {
                return $row->academic ? $row->academic->name : '';
            });

            $table->editColumn('academic.to', function ($row) {
                return $row->academic ? (is_string($row->academic) ? $row->academic : $row->academic->to) : '';
            });
            $table->addColumn('batch_name', function ($row) {
                return $row->batch ? $row->batch->name : '';
            });

            $table->addColumn('course_name', function ($row) {
                return $row->course ? $row->course->name : '';
            });

            $table->addColumn('section_name', function ($row) {
                return $row->section ? $row->section->name : '';
            });

            $table->editColumn('status_at', function ($row) {
                return $row->status_at ? $row->status_at : '';
            });
            $table->editColumn('enroll_number', function ($row) {
                return $row->enroll_number ? $row->enroll_number : '';
            });
            $table->addColumn('department_name', function ($row) {
                return $row->department ? $row->department->name : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'degreetype', 'academic', 'batch', 'course', 'section', 'department']);

            return $table->make(true);
        }

        return view('admin.courseEnrollMasters.index');
    }

    public function create()
    {
        abort_if(Gate::denies('course_enroll_master_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $degreetypes = ToolsDegreeType::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $academics = AcademicYear::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $batches = Batch::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $courses = ToolsCourse::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $sections = ToolsSectionId::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $departments = ToolsDepartment::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.courseEnrollMasters.create', compact('academics', 'batches', 'courses', 'degreetypes', 'departments', 'sections'));
    }

    public function store(StoreCourseEnrollMasterRequest $request)
    {
        $courseEnrollMaster = CourseEnrollMaster::create($request->all());

        return redirect()->route('admin.course-enroll-masters.index');
    }

    public function edit(CourseEnrollMaster $courseEnrollMaster)
    {
        abort_if(Gate::denies('course_enroll_master_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $degreetypes = ToolsDegreeType::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $academics = AcademicYear::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $batches = Batch::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $courses = ToolsCourse::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $sections = ToolsSectionId::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $departments = ToolsDepartment::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $courseEnrollMaster->load('degreetype', 'academic', 'batch', 'course', 'section', 'department');

        return view('admin.courseEnrollMasters.edit', compact('academics', 'batches', 'courseEnrollMaster', 'courses', 'degreetypes', 'departments', 'sections'));
    }

    public function update(UpdateCourseEnrollMasterRequest $request, CourseEnrollMaster $courseEnrollMaster)
    {
        $courseEnrollMaster->update($request->all());

        return redirect()->route('admin.course-enroll-masters.index');
    }

    public function show(CourseEnrollMaster $courseEnrollMaster)
    {
        abort_if(Gate::denies('course_enroll_master_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $courseEnrollMaster->load('degreetype', 'academic', 'batch', 'course', 'section', 'department');

        return view('admin.courseEnrollMasters.show', compact('courseEnrollMaster'));
    }

    public function destroy(CourseEnrollMaster $courseEnrollMaster)
    {
        abort_if(Gate::denies('course_enroll_master_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $courseEnrollMaster->delete();

        return back();
    }

    public function massDestroy(MassDestroyCourseEnrollMasterRequest $request)
    {
        $courseEnrollMasters = CourseEnrollMaster::find(request('ids'));

        foreach ($courseEnrollMasters as $courseEnrollMaster) {
            $courseEnrollMaster->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
