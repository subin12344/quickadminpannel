@extends('layouts.admin')
@section('content')
@can('course_enroll_master_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.course-enroll-masters.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.courseEnrollMaster.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.courseEnrollMaster.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-CourseEnrollMaster">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.courseEnrollMaster.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.courseEnrollMaster.fields.degreetype') }}
                    </th>
                    <th>
                        {{ trans('cruds.courseEnrollMaster.fields.academic') }}
                    </th>
                    <th>
                        {{ trans('cruds.academicYear.fields.to') }}
                    </th>
                    <th>
                        {{ trans('cruds.courseEnrollMaster.fields.batch') }}
                    </th>
                    <th>
                        {{ trans('cruds.courseEnrollMaster.fields.course') }}
                    </th>
                    <th>
                        {{ trans('cruds.courseEnrollMaster.fields.section') }}
                    </th>
                    <th>
                        {{ trans('cruds.courseEnrollMaster.fields.status_at') }}
                    </th>
                    <th>
                        {{ trans('cruds.courseEnrollMaster.fields.enroll_number') }}
                    </th>
                    <th>
                        {{ trans('cruds.courseEnrollMaster.fields.department') }}
                    </th>
                    <th>
                        &nbsp;
                    </th>
                </tr>
            </thead>
        </table>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('course_enroll_master_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.course-enroll-masters.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).data(), function (entry) {
          return entry.id
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

  let dtOverrideGlobals = {
    buttons: dtButtons,
    processing: true,
    serverSide: true,
    retrieve: true,
    aaSorting: [],
    ajax: "{{ route('admin.course-enroll-masters.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'degreetype_name', name: 'degreetype.name' },
{ data: 'academic_name', name: 'academic.name' },
{ data: 'academic.to', name: 'academic.to' },
{ data: 'batch_name', name: 'batch.name' },
{ data: 'course_name', name: 'course.name' },
{ data: 'section_name', name: 'section.name' },
{ data: 'status_at', name: 'status_at' },
{ data: 'enroll_number', name: 'enroll_number' },
{ data: 'department_name', name: 'department.name' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 10,
  };
  let table = $('.datatable-CourseEnrollMaster').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection