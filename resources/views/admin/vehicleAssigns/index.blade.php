@extends('layouts.admin')
@section('content')
@can('vehicle_assign_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.vehicle-assigns.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.vehicleAssign.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.vehicleAssign.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-VehicleAssign">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.vehicleAssign.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.vehicleAssign.fields.driver') }}
                        </th>
                        <th>
                            {{ trans('cruds.vehicleAssign.fields.route') }}
                        </th>
                        <th>
                            {{ trans('cruds.vehicleAssign.fields.vehicle_name') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($vehicleAssigns as $key => $vehicleAssign)
                        <tr data-entry-id="{{ $vehicleAssign->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $vehicleAssign->id ?? '' }}
                            </td>
                            <td>
                                {{ $vehicleAssign->driver->name ?? '' }}
                            </td>
                            <td>
                                {{ $vehicleAssign->route->route_name ?? '' }}
                            </td>
                            <td>
                                {{ $vehicleAssign->vehicle_name->name ?? '' }}
                            </td>
                            <td>
                                @can('vehicle_assign_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.vehicle-assigns.show', $vehicleAssign->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('vehicle_assign_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.vehicle-assigns.edit', $vehicleAssign->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('vehicle_assign_delete')
                                    <form action="{{ route('admin.vehicle-assigns.destroy', $vehicleAssign->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('vehicle_assign_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.vehicle-assigns.massDestroy') }}",
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
  let table = $('.datatable-VehicleAssign:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection