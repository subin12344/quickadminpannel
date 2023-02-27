@extends('layouts.admin')
@section('content')
@can('transport_stop_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.transport-stops.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.transportStop.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.transportStop.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-TransportStop">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.transportStop.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.transportStop.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.transportStop.fields.route_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.transportStop.fields.amount') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($transportStops as $key => $transportStop)
                        <tr data-entry-id="{{ $transportStop->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $transportStop->id ?? '' }}
                            </td>
                            <td>
                                {{ $transportStop->name ?? '' }}
                            </td>
                            <td>
                                {{ $transportStop->route_name->route_name ?? '' }}
                            </td>
                            <td>
                                {{ $transportStop->amount ?? '' }}
                            </td>
                            <td>
                                @can('transport_stop_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.transport-stops.show', $transportStop->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('transport_stop_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.transport-stops.edit', $transportStop->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('transport_stop_delete')
                                    <form action="{{ route('admin.transport-stops.destroy', $transportStop->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('transport_stop_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.transport-stops.massDestroy') }}",
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
  let table = $('.datatable-TransportStop:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection