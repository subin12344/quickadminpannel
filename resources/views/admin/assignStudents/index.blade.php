@extends('layouts.admin')
@section('content')
@can('assign_student_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.assign-students.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.assignStudent.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.assignStudent.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-AssignStudent">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.assignStudent.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.assignStudent.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.assignStudent.fields.master') }}
                        </th>
                        <th>
                            {{ trans('cruds.assignStudent.fields.route') }}
                        </th>
                        <th>
                            {{ trans('cruds.assignStudent.fields.vehicle_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.assignStudent.fields.stop_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.assignStudent.fields.fromdate') }}
                        </th>
                        <th>
                            {{ trans('cruds.assignStudent.fields.todate') }}
                        </th>
                        <th>
                            {{ trans('cruds.assignStudent.fields.amount') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($assignStudents as $key => $assignStudent)
                        <tr data-entry-id="{{ $assignStudent->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $assignStudent->id ?? '' }}
                            </td>
                            <td>
                                {{ $assignStudent->name->name ?? '' }}
                            </td>
                            <td>
                                {{ $assignStudent->master->id ?? '' }}
                            </td>
                            <td>
                                {{ $assignStudent->route->route_name ?? '' }}
                            </td>
                            <td>
                                {{ $assignStudent->vehicle_name->name ?? '' }}
                            </td>
                            <td>
                                {{ $assignStudent->stop_name->name ?? '' }}
                            </td>
                            <td>
                                {{ $assignStudent->fromdate ?? '' }}
                            </td>
                            <td>
                                {{ $assignStudent->todate ?? '' }}
                            </td>
                            <td>
                                {{ $assignStudent->stop_name->amount ?? '' }}
                            </td>
                            <td>
                                @can('assign_student_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.assign-students.show', $assignStudent->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('assign_student_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.assign-students.edit', $assignStudent->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('assign_student_delete')
                                    <form action="{{ route('admin.assign-students.destroy', $assignStudent->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('assign_student_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.assign-students.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 10,
  });
  let table = $('.datatable-AssignStudent:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection