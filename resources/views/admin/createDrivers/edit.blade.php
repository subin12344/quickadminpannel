@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.createDriver.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.create-drivers.update", [$createDriver->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="licence_no">{{ trans('cruds.createDriver.fields.licence_no') }}</label>
                <input class="form-control {{ $errors->has('licence_no') ? 'is-invalid' : '' }}" type="text" name="licence_no" id="licence_no" value="{{ old('licence_no', $createDriver->licence_no) }}" required>
                @if($errors->has('licence_no'))
                    <span class="text-danger">{{ $errors->first('licence_no') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.createDriver.fields.licence_no_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="expirydate">{{ trans('cruds.createDriver.fields.expirydate') }}</label>
                <input class="form-control date {{ $errors->has('expirydate') ? 'is-invalid' : '' }}" type="text" name="expirydate" id="expirydate" value="{{ old('expirydate', $createDriver->expirydate) }}">
                @if($errors->has('expirydate'))
                    <span class="text-danger">{{ $errors->first('expirydate') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.createDriver.fields.expirydate_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.createDriver.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $createDriver->name) }}" required>
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.createDriver.fields.name_helper') }}</span>
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