@extends('layouts.admin')
@section('content')
@can('descargar_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.descargars.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.descargar.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.descargar.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Descargar">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.descargar.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.descargar.fields.docente') }}
                        </th>
                        <th>
                            {{ trans('cruds.descargar.fields.directiva') }}
                        </th>
                        <th>
                            {{ trans('cruds.descargar.fields.tutoria') }}
                        </th>
                        <th>
                            {{ trans('cruds.descargar.fields.calescolar') }}
                        </th>
                        <th>
                            {{ trans('cruds.descargar.fields.calpadres') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($descargars as $key => $descargar)
                        <tr data-entry-id="{{ $descargar->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $descargar->id ?? '' }}
                            </td>
                            <td>
                                @if($descargar->docente)
                                    <a href="{{ $descargar->docente->getUrl() }}" target="_blank">
                                        {{ trans('global.view_file') }}
                                    </a>
                                @endif
                            </td>
                            <td>
                                @if($descargar->directiva)
                                    <a href="{{ $descargar->directiva->getUrl() }}" target="_blank">
                                        {{ trans('global.view_file') }}
                                    </a>
                                @endif
                            </td>
                            <td>
                                @if($descargar->tutoria)
                                    <a href="{{ $descargar->tutoria->getUrl() }}" target="_blank">
                                        {{ trans('global.view_file') }}
                                    </a>
                                @endif
                            </td>
                            <td>
                                @if($descargar->calescolar)
                                    <a href="{{ $descargar->calescolar->getUrl() }}" target="_blank">
                                        {{ trans('global.view_file') }}
                                    </a>
                                @endif
                            </td>
                            <td>
                                @if($descargar->calpadres)
                                    <a href="{{ $descargar->calpadres->getUrl() }}" target="_blank">
                                        {{ trans('global.view_file') }}
                                    </a>
                                @endif
                            </td>
                            <td>
                                @can('descargar_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.descargars.show', $descargar->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('descargar_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.descargars.edit', $descargar->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('descargar_delete')
                                    <form action="{{ route('admin.descargars.destroy', $descargar->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('descargar_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.descargars.massDestroy') }}",
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
  $('.datatable-Descargar:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection