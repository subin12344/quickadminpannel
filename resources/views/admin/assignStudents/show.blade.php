@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.assignStudent.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.assign-students.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.assignStudent.fields.id') }}
                        </th>
                        <td>
                            {{ $assignStudent->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignStudent.fields.name') }}
                        </th>
                        <td>
                            {{ $assignStudent->name->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignStudent.fields.master') }}
                        </th>
                        <td>
                            {{ $assignStudent->master->enroll_number ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignStudent.fields.route') }}
                        </th>
                        <td>
                            {{ $assignStudent->route->route_name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignStudent.fields.vehicle_name') }}
                        </th>
                        <td>
                            {{ $assignStudent->vehicle_name->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignStudent.fields.stop_name') }}
                        </th>
                        <td>
                            {{ $assignStudent->stop_name->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignStudent.fields.fromdate') }}
                        </th>
                        <td>
                            {{ $assignStudent->fromdate }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignStudent.fields.todate') }}
                        </th>
                        <td>
                            {{ $assignStudent->todate }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignStudent.fields.amount') }}
                        </th>
                        <td>
                            {{ $assignStudent->amount->amount ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.assign-students.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection