@extends('layouts.admin')
@section('content')
@can('impreso_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.impresos.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.impreso.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.impreso.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Impreso">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.impreso.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.impreso.fields.nombre') }}
                        </th>
                        <th>
                            {{ trans('cruds.impreso.fields.archivo') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($impresos as $key => $impreso)
                        <tr data-entry-id="{{ $impreso->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $impreso->id ?? '' }}
                            </td>
                            <td>
                                {{ $impreso->nombre ?? '' }}
                            </td>
                            <td>
                                @if($impreso->archivo)
                                    <a href="{{ $impreso->archivo->getUrl() }}" target="_blank">
                                        {{ trans('global.view_file') }}
                                    </a>
                                @endif
                            </td>
                            <td>
                                @can('impreso_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.impresos.show', $impreso->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('impreso_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.impresos.edit', $impreso->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('impreso_delete')
                                    <form action="{{ route('admin.impresos.destroy', $impreso->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('impreso_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.impresos.massDestroy') }}",
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
    pageLength: 25,
  });
  $('.datatable-Impreso:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection