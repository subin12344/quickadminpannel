@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.transportRoute.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.transport-routes.update", [$transportRoute->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="route_name">{{ trans('cruds.transportRoute.fields.route_name') }}</label>
                <input class="form-control {{ $errors->has('route_name') ? 'is-invalid' : '' }}" type="text" name="route_name" id="route_name" value="{{ old('route_name', $transportRoute->route_name) }}" required>
                @if($errors->has('route_name'))
                    <span class="text-danger">{{ $errors->first('route_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.transportRoute.fields.route_name_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection