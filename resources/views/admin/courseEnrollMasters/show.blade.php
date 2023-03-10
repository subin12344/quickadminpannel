@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.courseEnrollMaster.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.course-enroll-masters.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.courseEnrollMaster.fields.id') }}
                        </th>
                        <td>
                            {{ $courseEnrollMaster->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.courseEnrollMaster.fields.degreetype') }}
                        </th>
                        <td>
                            {{ $courseEnrollMaster->degreetype->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.courseEnrollMaster.fields.academic') }}
                        </th>
                        <td>
                            {{ $courseEnrollMaster->academic->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.courseEnrollMaster.fields.batch') }}
                        </th>
                        <td>
                            {{ $courseEnrollMaster->batch->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.courseEnrollMaster.fields.course') }}
                        </th>
                        <td>
                            {{ $courseEnrollMaster->course->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.courseEnrollMaster.fields.section') }}
                        </th>
                        <td>
                            {{ $courseEnrollMaster->section->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.courseEnrollMaster.fields.status_at') }}
                        </th>
                        <td>
                            {{ $courseEnrollMaster->status_at }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.courseEnrollMaster.fields.enroll_number') }}
                        </th>
                        <td>
                            {{ $courseEnrollMaster->enroll_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.courseEnrollMaster.fields.department') }}
                        </th>
                        <td>
                            {{ $courseEnrollMaster->department->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.course-enroll-masters.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection