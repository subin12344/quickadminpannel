@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.courseEnrollMaster.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.course-enroll-masters.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="degreetype_id">{{ trans('cruds.courseEnrollMaster.fields.degreetype') }}</label>
                <select class="form-control select2 {{ $errors->has('degreetype') ? 'is-invalid' : '' }}" name="degreetype_id" id="degreetype_id" required>
                    @foreach($degreetypes as $id => $entry)
                        <option value="{{ $id }}" {{ old('degreetype_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('degreetype'))
                    <span class="text-danger">{{ $errors->first('degreetype') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.courseEnrollMaster.fields.degreetype_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="academic_id">{{ trans('cruds.courseEnrollMaster.fields.academic') }}</label>
                <select class="form-control select2 {{ $errors->has('academic') ? 'is-invalid' : '' }}" name="academic_id" id="academic_id">
                    @foreach($academics as $id => $entry)
                        <option value="{{ $id }}" {{ old('academic_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('academic'))
                    <span class="text-danger">{{ $errors->first('academic') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.courseEnrollMaster.fields.academic_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="batch_id">{{ trans('cruds.courseEnrollMaster.fields.batch') }}</label>
                <select class="form-control select2 {{ $errors->has('batch') ? 'is-invalid' : '' }}" name="batch_id" id="batch_id" required>
                    @foreach($batches as $id => $entry)
                        <option value="{{ $id }}" {{ old('batch_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('batch'))
                    <span class="text-danger">{{ $errors->first('batch') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.courseEnrollMaster.fields.batch_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="course_id">{{ trans('cruds.courseEnrollMaster.fields.course') }}</label>
                <select class="form-control select2 {{ $errors->has('course') ? 'is-invalid' : '' }}" name="course_id" id="course_id" required>
                    @foreach($courses as $id => $entry)
                        <option value="{{ $id }}" {{ old('course_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('course'))
                    <span class="text-danger">{{ $errors->first('course') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.courseEnrollMaster.fields.course_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="section_id">{{ trans('cruds.courseEnrollMaster.fields.section') }}</label>
                <select class="form-control select2 {{ $errors->has('section') ? 'is-invalid' : '' }}" name="section_id" id="section_id">
                    @foreach($sections as $id => $entry)
                        <option value="{{ $id }}" {{ old('section_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('section'))
                    <span class="text-danger">{{ $errors->first('section') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.courseEnrollMaster.fields.section_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="status_at">{{ trans('cruds.courseEnrollMaster.fields.status_at') }}</label>
                <input class="form-control {{ $errors->has('status_at') ? 'is-invalid' : '' }}" type="number" name="status_at" id="status_at" value="{{ old('status_at', '0') }}" step="1" required>
                @if($errors->has('status_at'))
                    <span class="text-danger">{{ $errors->first('status_at') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.courseEnrollMaster.fields.status_at_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="enroll_number">{{ trans('cruds.courseEnrollMaster.fields.enroll_number') }}</label>
                <input class="form-control {{ $errors->has('enroll_number') ? 'is-invalid' : '' }}" type="text" name="enroll_number" id="enroll_number" value="{{ old('enroll_number', '') }}" required>
                @if($errors->has('enroll_number'))
                    <span class="text-danger">{{ $errors->first('enroll_number') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.courseEnrollMaster.fields.enroll_number_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="department_id">{{ trans('cruds.courseEnrollMaster.fields.department') }}</label>
                <select class="form-control select2 {{ $errors->has('department') ? 'is-invalid' : '' }}" name="department_id" id="department_id">
                    @foreach($departments as $id => $entry)
                        <option value="{{ $id }}" {{ old('department_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('department'))
                    <span class="text-danger">{{ $errors->first('department') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.courseEnrollMaster.fields.department_helper') }}</span>
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