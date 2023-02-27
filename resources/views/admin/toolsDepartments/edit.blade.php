@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.toolsDepartment.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.tools-departments.update", [$toolsDepartment->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.toolsDepartment.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $toolsDepartment->name) }}" required>
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.toolsDepartment.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="degreetype_id">{{ trans('cruds.toolsDepartment.fields.degreetype') }}</label>
                <select class="form-control select2 {{ $errors->has('degreetype') ? 'is-invalid' : '' }}" name="degreetype_id" id="degreetype_id" required>
                    @foreach($degreetypes as $id => $entry)
                        <option value="{{ $id }}" {{ (old('degreetype_id') ? old('degreetype_id') : $toolsDepartment->degreetype->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('degreetype'))
                    <span class="text-danger">{{ $errors->first('degreetype') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.toolsDepartment.fields.degreetype_helper') }}</span>
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