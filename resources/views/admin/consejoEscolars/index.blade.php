@extends('layouts.admin')
@section('content')
@can('consejo_escolar_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.consejo-escolars.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.consejoEscolar.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.consejoEscolar.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-ConsejoEscolar">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.consejoEscolar.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.consejoEscolar.fields.titulo') }}
                        </th>
                        <th>
                            {{ trans('cruds.consejoEscolar.fields.subtitulo') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($consejoEscolars as $key => $consejoEscolar)
                        <tr data-entry-id="{{ $consejoEscolar->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $consejoEscolar->id ?? '' }}
                            </td>
                            <td>
                                {{ $consejoEscolar->titulo ?? '' }}
                            </td>
                            <td>
                                {{ $consejoEscolar->subtitulo ?? '' }}
                            </td>
                            <td>
                                @can('consejo_escolar_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.consejo-escolars.show', $consejoEscolar->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('consejo_escolar_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.consejo-escolars.edit', $consejoEscolar->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('consejo_escolar_delete')
                                    <form action="{{ route('admin.consejo-escolars.destroy', $consejoEscolar->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('consejo_escolar_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.consejo-escolars.massDestroy') }}",
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
  $('.datatable-ConsejoEscolar:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection