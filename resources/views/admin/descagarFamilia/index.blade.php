@extends('layouts.admin')
@section('content')
@can('descagar_familium_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.descagar-familia.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.descagarFamilium.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.descagarFamilium.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-DescagarFamilium">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.descagarFamilium.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.descagarFamilium.fields.archivo') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($descagarFamilia as $key => $descagarFamilium)
                        <tr data-entry-id="{{ $descagarFamilium->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $descagarFamilium->id ?? '' }}
                            </td>
                            <td>
                                @if($descagarFamilium->archivo)
                                    <a href="{{ $descagarFamilium->archivo->getUrl() }}" target="_blank">
                                        {{ trans('global.view_file') }}
                                    </a>
                                @endif
                            </td>
                            <td>
                                @can('descagar_familium_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.descagar-familia.show', $descagarFamilium->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('descagar_familium_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.descagar-familia.edit', $descagarFamilium->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('descagar_familium_delete')
                                    <form action="{{ route('admin.descagar-familia.destroy', $descagarFamilium->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('descagar_familium_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.descagar-familia.massDestroy') }}",
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
    order: [[ 1, 'desc' ]],
    pageLength: 10,
  });
  $('.datatable-DescagarFamilium:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection