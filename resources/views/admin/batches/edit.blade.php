@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.batch.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.batches.update", [$batch->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.batch.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $batch->name) }}" required>
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.batch.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="from">{{ trans('cruds.batch.fields.from') }}</label>
                <input class="form-control {{ $errors->has('from') ? 'is-invalid' : '' }}" type="number" name="from" id="from" value="{{ old('from', $batch->from) }}" step="1" required>
                @if($errors->has('from'))
                    <span class="text-danger">{{ $errors->first('from') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.batch.fields.from_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="to">{{ trans('cruds.batch.fields.to') }}</label>
                <input class="form-control {{ $errors->has('to') ? 'is-invalid' : '' }}" type="number" name="to" id="to" value="{{ old('to', $batch->to) }}" step="1" required>
                @if($errors->has('to'))
                    <span class="text-danger">{{ $errors->first('to') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.batch.fields.to_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="admission_date">{{ trans('cruds.batch.fields.admission_date') }}</label>
                <input class="form-control date {{ $errors->has('admission_date') ? 'is-invalid' : '' }}" type="text" name="admission_date" id="admission_date" value="{{ old('admission_date', $batch->admission_date) }}" required>
                @if($errors->has('admission_date'))
                    <span class="text-danger">{{ $errors->first('admission_date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.batch.fields.admission_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="date_leaving">{{ trans('cruds.batch.fields.date_leaving') }}</label>
                <input class="form-control date {{ $errors->has('date_leaving') ? 'is-invalid' : '' }}" type="text" name="date_leaving" id="date_leaving" value="{{ old('date_leaving', $batch->date_leaving) }}">
                @if($errors->has('date_leaving'))
                    <span class="text-danger">{{ $errors->first('date_leaving') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.batch.fields.date_leaving_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="syllabus_year_id">{{ trans('cruds.batch.fields.syllabus_year') }}</label>
                <select class="form-control select2 {{ $errors->has('syllabus_year') ? 'is-invalid' : '' }}" name="syllabus_year_id" id="syllabus_year_id" required>
                    @foreach($syllabus_years as $id => $entry)
                        <option value="{{ $id }}" {{ (old('syllabus_year_id') ? old('syllabus_year_id') : $batch->syllabus_year->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('syllabus_year'))
                    <span class="text-danger">{{ $errors->first('syllabus_year') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.batch.fields.syllabus_year_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="academic_year_id">{{ trans('cruds.batch.fields.academic_year') }}</label>
                <select class="form-control select2 {{ $errors->has('academic_year') ? 'is-invalid' : '' }}" name="academic_year_id" id="academic_year_id" required>
                    @foreach($academic_years as $id => $entry)
                        <option value="{{ $id }}" {{ (old('academic_year_id') ? old('academic_year_id') : $batch->academic_year->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('academic_year'))
                    <span class="text-danger">{{ $errors->first('academic_year') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.batch.fields.academic_year_helper') }}</span>
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