@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.vehicleAssign.title_singular') }}
    </div>

    <div class="card-body">
        @if (session('warning'))
    <div class="alert alert-warning">
        {{ session('warning') }}
    </div>
    @endif
        <form method="POST" action="{{ route("admin.vehicle-assigns.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="driver_id">{{ trans('cruds.vehicleAssign.fields.driver') }}</label>
                <select class="form-control select2 {{ $errors->has('driver') ? 'is-invalid' : '' }}" name="driver_id" id="driver_id" required>
                    @foreach($drivers as $id => $entry)
                        <option value="{{ $id }}" {{ old('driver_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('driver'))
                    <span class="text-danger">{{ $errors->first('driver') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.vehicleAssign.fields.driver_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="route_id">{{ trans('cruds.vehicleAssign.fields.route') }}</label>
                <select class="form-control select2 {{ $errors->has('route') ? 'is-invalid' : '' }}" name="route_id" id="route_id" required>
                    @foreach($routes as $id => $entry)
                        <option value="{{ $id }}" {{ old('route_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('route'))
                    <span class="text-danger">{{ $errors->first('route') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.vehicleAssign.fields.route_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="vehicle_name_id">{{ trans('cruds.vehicleAssign.fields.vehicle_name') }}</label>
                <select class="form-control select2 {{ $errors->has('vehicle_name') ? 'is-invalid' : '' }}" name="vehicle_name_id" id="vehicle_name_id">
                    @foreach($vehicle_names as $id => $entry)
                        <option value="{{ $id }}" {{ old('vehicle_name_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('vehicle_name'))
                    <span class="text-danger">{{ $errors->first('vehicle_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.vehicleAssign.fields.vehicle_name_helper') }}</span>
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
