<div class="m-3">
    @can('asginatura_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route("admin.asginaturas.create") }}">
                    {{ trans('global.add') }} {{ trans('cruds.asginatura.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.asginatura.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-Asginatura">
                    <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th>
                                {{ trans('cruds.asginatura.fields.id') }}
                            </th>
                            <th>
                                {{ trans('cruds.asginatura.fields.nombre') }}
                            </th>
                            <th>
                                {{ trans('cruds.asginatura.fields.cursos') }}
                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($asginaturas as $key => $asginatura)
                            <tr data-entry-id="{{ $asginatura->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $asginatura->id ?? '' }}
                                </td>
                                <td>
                                    {{ $asginatura->nombre ?? '' }}
                                </td>
                                <td>
                                    @foreach($asginatura->cursos as $key => $item)
                                        <span class="badge badge-info">{{ $item->curso }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    @can('asginatura_show')
                                        <a class="btn btn-xs btn-primary" href="{{ route('admin.asginaturas.show', $asginatura->id) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan

                                    @can('asginatura_edit')
                                        <a class="btn btn-xs btn-info" href="{{ route('admin.asginaturas.edit', $asginatura->id) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan

                                    @can('asginatura_delete')
                                        <form action="{{ route('admin.asginaturas.destroy', $asginatura->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
</div>
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('asginatura_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.asginaturas.massDestroy') }}",
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
  $('.datatable-Asginatura:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection