@extends('layouts.admin')
@section('content')
@can('actividade_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.actividades.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.actividade.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.actividade.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Actividade">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.actividade.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.actividade.fields.titulo') }}
                        </th>
                        <th>
                            {{ trans('cruds.actividade.fields.fecha') }}
                        </th>
                        <th>
                            {{ trans('cruds.actividade.fields.foto') }}
                        </th>
                        <th>
                            {{ trans('cruds.actividade.fields.autor') }}
                        </th>
                        <th>
                            {{ trans('cruds.actividade.fields.archivos') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($actividades as $key => $actividade)
                        <tr data-entry-id="{{ $actividade->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $actividade->id ?? '' }}
                            </td>
                            <td>
                                {{ $actividade->titulo ?? '' }}
                            </td>
                            <td>
                                {{ $actividade->fecha ?? '' }}
                            </td>
                            <td>
                                @foreach($actividade->foto as $key => $media)
                                    <a href="{{ $media->getUrl() }}" target="_blank">
                                        <img src="{{ $media->getUrl('thumb') }}" width="50px" height="50px">
                                    </a>
                                @endforeach
                            </td>
                            <td>
                                {{ $actividade->autor ?? '' }}
                            </td>
                            <td>
                                @foreach($actividade->archivos as $key => $media)
                                    <a href="{{ $media->getUrl() }}" target="_blank">
                                        {{ trans('global.view_file') }}
                                    </a>
                                @endforeach
                            </td>
                            <td>
                                @can('actividade_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.actividades.show', $actividade->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('actividade_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.actividades.edit', $actividade->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('actividade_delete')
                                    <form action="{{ route('admin.actividades.destroy', $actividade->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('actividade_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.actividades.massDestroy') }}",
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
    order: [[ 1, 'asc' ]],
    pageLength: 10,
  });
  $('.datatable-Actividade:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection