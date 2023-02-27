@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.createvehicle.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.createvehicles.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.createvehicle.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.createvehicle.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="vehicle_no">{{ trans('cruds.createvehicle.fields.vehicle_no') }}</label>
                <input class="form-control {{ $errors->has('vehicle_no') ? 'is-invalid' : '' }}" type="text" name="vehicle_no" id="vehicle_no" value="{{ old('vehicle_no', '') }}">
                @if($errors->has('vehicle_no'))
                    <span class="text-danger">{{ $errors->first('vehicle_no') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.createvehicle.fields.vehicle_no_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="seats">{{ trans('cruds.createvehicle.fields.seats') }}</label>
                <input class="form-control {{ $errors->has('seats') ? 'is-invalid' : '' }}" type="number" name="seats" id="seats" value="{{ old('seats', '') }}" step="1">
                @if($errors->has('seats'))
                    <span class="text-danger">{{ $errors->first('seats') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.createvehicle.fields.seats_helper') }}</span>
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