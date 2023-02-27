@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.createvehicle.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.createvehicles.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.createvehicle.fields.id') }}
                        </th>
                        <td>
                            {{ $createvehicle->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.createvehicle.fields.name') }}
                        </th>
                        <td>
                            {{ $createvehicle->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.createvehicle.fields.vehicle_no') }}
                        </th>
                        <td>
                            {{ $createvehicle->vehicle_no }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.createvehicle.fields.seats') }}
                        </th>
                        <td>
                            {{ $createvehicle->seats }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.createvehicles.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection