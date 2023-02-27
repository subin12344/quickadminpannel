@extends('layouts.admin')
@section('content')
@can('batch_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.batches.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.batch.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.batch.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Batch">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.batch.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.batch.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.batch.fields.admission_date') }}
                        </th>
                        <th>
                            {{ trans('cruds.batch.fields.date_leaving') }}
                        </th>
                        <th>
                            {{ trans('cruds.batch.fields.syllabus_year') }}
                        </th>
                        <th>
                            {{ trans('cruds.batch.fields.academic_year') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($batches as $key => $batch)
                        <tr data-entry-id="{{ $batch->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $batch->id ?? '' }}
                            </td>
                            <td>
                                {{ $batch->name ?? '' }}
                            </td>
                            <td>
                                {{ $batch->admission_date ?? '' }}
                            </td>
                            <td>
                                {{ $batch->date_leaving ?? '' }}
                            </td>
                            <td>
                                {{ $batch->syllabus_year->year ?? '' }}
                            </td>
                            <td>
                                {{ $batch->academic_year->name ?? '' }}
                            </td>
                            <td>
                                @can('batch_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.batches.show', $batch->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('batch_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.batches.edit', $batch->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('batch_delete')
                                    <form action="{{ route('admin.batches.destroy', $batch->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('batch_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.batches.massDestroy') }}",
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
    pageLength: 100,
  });
  let table = $('.datatable-Batch:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection