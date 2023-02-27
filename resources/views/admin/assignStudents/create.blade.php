@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.assignStudent.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.assign-students.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="name_id">{{ trans('cruds.assignStudent.fields.name') }}</label>
                <select class="form-control select2 {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name_id" id="name_id" required>
                    @foreach($names as $id => $entry)
                        <option value="{{ $id }}" {{ old('name_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assignStudent.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="master_id">{{ trans('cruds.assignStudent.fields.master') }}</label>
                <select class="form-control select2 {{ $errors->has('master') ? 'is-invalid' : '' }}" name="master_id" id="master_id" required>
                    @foreach($masters as $id => $entry)
                        <option value="{{ $id }}" {{ old('master_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('master'))
                    <span class="text-danger">{{ $errors->first('master') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assignStudent.fields.master_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="route_id">{{ trans('cruds.assignStudent.fields.route') }}</label>
                <select class="form-control select2 {{ $errors->has('route') ? 'is-invalid' : '' }}" name="route_id" id="route_id" required>
                    @foreach($routes as $id => $entry)
                        <option value="{{ $id }}" {{ old('route_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('route'))
                    <span class="text-danger">{{ $errors->first('route') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assignStudent.fields.route_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="vehicle_name_id">{{ trans('cruds.assignStudent.fields.vehicle_name') }}</label>
                <select class="form-control select2 {{ $errors->has('vehicle_name') ? 'is-invalid' : '' }}" name="vehicle_name_id" id="vehicle_name_id" required>
                    @foreach($vehicle_names as $id => $entry)
                        <option value="{{ $id }}" {{ old('vehicle_name_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('vehicle_name'))
                    <span class="text-danger">{{ $errors->first('vehicle_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assignStudent.fields.vehicle_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="stop_name_id">{{ trans('cruds.assignStudent.fields.stop_name') }}</label>
                <select class="form-control select2 {{ $errors->has('stop_name') ? 'is-invalid' : '' }}" name="stop_name_id" id="stop_name_id" required>
                    @foreach($stop_names as $id => $entry)
                        <option value="{{ $id }}" {{ old('stop_name_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('stop_name'))
                    <span class="text-danger">{{ $errors->first('stop_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assignStudent.fields.stop_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="fromdate">{{ trans('cruds.assignStudent.fields.fromdate') }}</label>
                <input class="form-control date {{ $errors->has('fromdate') ? 'is-invalid' : '' }}" type="text" name="fromdate" id="fromdate" value="{{ old('fromdate') }}" required>
                @if($errors->has('fromdate'))
                    <span class="text-danger">{{ $errors->first('fromdate') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assignStudent.fields.fromdate_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="todate">{{ trans('cruds.assignStudent.fields.todate') }}</label>
                <input class="form-control date {{ $errors->has('todate') ? 'is-invalid' : '' }}" type="text" name="todate" id="todate" value="{{ old('todate') }}" required>
                @if($errors->has('todate'))
                    <span class="text-danger">{{ $errors->first('todate') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assignStudent.fields.todate_helper') }}</span>
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