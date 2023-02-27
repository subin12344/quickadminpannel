@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.transportStop.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.transport-stops.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.transportStop.fields.id') }}
                        </th>
                        <td>
                            {{ $transportStop->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transportStop.fields.name') }}
                        </th>
                        <td>
                            {{ $transportStop->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transportStop.fields.route_name') }}
                        </th>
                        <td>
                            {{ $transportStop->route_name->route_name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transportStop.fields.amount') }}
                        </th>
                        <td>
                            {{ $transportStop->amount }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.transport-stops.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection