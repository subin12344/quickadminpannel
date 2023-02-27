@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.createDriver.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.create-drivers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.createDriver.fields.id') }}
                        </th>
                        <td>
                            {{ $createDriver->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.createDriver.fields.licence_no') }}
                        </th>
                        <td>
                            {{ $createDriver->licence_no }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.createDriver.fields.expirydate') }}
                        </th>
                        <td>
                            {{ $createDriver->expirydate }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.createDriver.fields.name') }}
                        </th>
                        <td>
                            {{ $createDriver->name }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.create-drivers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection