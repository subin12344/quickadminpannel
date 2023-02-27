@extends('layouts.admin')
@section('content')
@can('tools_department_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.tools-departments.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.toolsDepartment.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.toolsDepartment.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-ToolsDepartment">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.toolsDepartment.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.toolsDepartment.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.toolsDepartment.fields.degreetype') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($toolsDepartments as $key => $toolsDepartment)
                        <tr data-entry-id="{{ $toolsDepartment->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $toolsDepartment->id ?? '' }}
                            </td>
                            <td>
                                {{ $toolsDepartment->name ?? '' }}
                            </td>
                            <td>
                                {{ $toolsDepartment->degreetype->name ?? '' }}
                            </td>
                            <td>
                                @can('tools_department_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.tools-departments.show', $toolsDepartment->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('tools_department_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.tools-departments.edit', $toolsDepartment->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('tools_department_delete')
                                    <form action="{{ route('admin.tools-departments.destroy', $toolsDepartment->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('tools_department_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.tools-departments.massDestroy') }}",
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
  let table = $('.datatable-ToolsDepartment:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection