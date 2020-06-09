@extends('layouts.admin')
@section('content')
@can('archivos_grupo_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.archivos-grupos.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.archivosGrupo.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.archivosGrupo.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-ArchivosGrupo">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.archivosGrupo.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.archivosGrupo.fields.grupo') }}
                        </th>
                        <th>
                            {{ trans('cruds.archivosGrupo.fields.archivos') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($archivosGrupos as $key => $archivosGrupo)
                        <tr data-entry-id="{{ $archivosGrupo->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $archivosGrupo->id ?? '' }}
                            </td>
                            <td>
                                {{ $archivosGrupo->grupo->grupo ?? '' }}
                            </td>
                            <td>
                                @foreach($archivosGrupo->archivos as $key => $media)
                                    <a href="{{ $media->getUrl() }}" target="_blank">
                                        {{ trans('global.view_file') }}
                                    </a>
                                @endforeach
                            </td>
                            <td>
                                @can('archivos_grupo_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.archivos-grupos.show', $archivosGrupo->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('archivos_grupo_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.archivos-grupos.edit', $archivosGrupo->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('archivos_grupo_delete')
                                    <form action="{{ route('admin.archivos-grupos.destroy', $archivosGrupo->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('archivos_grupo_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.archivos-grupos.massDestroy') }}",
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
  let table = $('.datatable-ArchivosGrupo:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection