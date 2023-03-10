@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.batch.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.batches.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.batch.fields.id') }}
                        </th>
                        <td>
                            {{ $batch->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.batch.fields.name') }}
                        </th>
                        <td>
                            {{ $batch->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.batch.fields.admission_date') }}
                        </th>
                        <td>
                            {{ $batch->admission_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.batch.fields.date_leaving') }}
                        </th>
                        <td>
                            {{ $batch->date_leaving }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.batch.fields.syllabus_year') }}
                        </th>
                        <td>
                            {{ $batch->syllabus_year->year ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.batch.fields.academic_year') }}
                        </th>
                        <td>
                            {{ $batch->academic_year->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.batches.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection