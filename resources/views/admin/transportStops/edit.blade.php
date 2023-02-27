@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.transportStop.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.transport-stops.update", [$transportStop->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.transportStop.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $transportStop->name) }}" required>
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.transportStop.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="route_name_id">{{ trans('cruds.transportStop.fields.route_name') }}</label>
                <select class="form-control select2 {{ $errors->has('route_name') ? 'is-invalid' : '' }}" name="route_name_id" id="route_name_id" required>
                    @foreach($route_names as $id => $entry)
                        <option value="{{ $id }}" {{ (old('route_name_id') ? old('route_name_id') : $transportStop->route_name->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('route_name'))
                    <span class="text-danger">{{ $errors->first('route_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.transportStop.fields.route_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="amount">{{ trans('cruds.transportStop.fields.amount') }}</label>
                <input class="form-control {{ $errors->has('amount') ? 'is-invalid' : '' }}" type="number" name="amount" id="amount" value="{{ old('amount', $transportStop->amount) }}" step="0.01">
                @if($errors->has('amount'))
                    <span class="text-danger">{{ $errors->first('amount') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.transportStop.fields.amount_helper') }}</span>
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