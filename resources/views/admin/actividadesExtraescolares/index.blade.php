@extends('layouts.admin')
@section('content')
@can('actividades_extraescolare_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.actividades-extraescolares.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.actividadesExtraescolare.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.actividadesExtraescolare.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-ActividadesExtraescolare">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.actividadesExtraescolare.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.actividadesExtraescolare.fields.titulo') }}
                        </th>
                        <th>
                            {{ trans('cruds.actividadesExtraescolare.fields.subtitulo') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($actividadesExtraescolares as $key => $actividadesExtraescolare)
                        <tr data-entry-id="{{ $actividadesExtraescolare->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $actividadesExtraescolare->id ?? '' }}
                            </td>
                            <td>
                                {{ $actividadesExtraescolare->titulo ?? '' }}
                            </td>
                            <td>
                                {{ $actividadesExtraescolare->subtitulo ?? '' }}
                            </td>
                            <td>
                                @can('actividades_extraescolare_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.actividades-extraescolares.show', $actividadesExtraescolare->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('actividades_extraescolare_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.actividades-extraescolares.edit', $actividadesExtraescolare->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('actividades_extraescolare_delete')
                                    <form action="{{ route('admin.actividades-extraescolares.destroy', $actividadesExtraescolare->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('actividades_extraescolare_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.actividades-extraescolares.massDestroy') }}",
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
  $('.datatable-ActividadesExtraescolare:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection