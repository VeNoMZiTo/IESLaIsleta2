@extends('layouts.admin')
@section('content')
@can('tutorium_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.tutoria.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.tutorium.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.tutorium.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Tutorium">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.tutorium.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.tutorium.fields.nivel') }}
                        </th>
                        <th>
                            {{ trans('cruds.tutorium.fields.grupo') }}
                        </th>
                        <th>
                            {{ trans('cruds.tutorium.fields.tutor') }}
                        </th>
                        <th>
                            {{ trans('cruds.tutorium.fields.abreviatura_departamento') }}
                        </th>
                        <th>
                            {{ trans('cruds.tutorium.fields.departamento') }}
                        </th>
                        <th>
                            {{ trans('cruds.tutorium.fields.email') }}
                        </th>
                        <th>
                            {{ trans('cruds.tutorium.fields.hora_atencion') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tutoria as $key => $tutorium)
                        <tr data-entry-id="{{ $tutorium->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $tutorium->id ?? '' }}
                            </td>
                            <td>
                                {{ $tutorium->nivel ?? '' }}
                            </td>
                            <td>
                                {{ $tutorium->grupo ?? '' }}
                            </td>
                            <td>
                                {{ $tutorium->tutor ?? '' }}
                            </td>
                            <td>
                                {{ $tutorium->abreviatura_departamento ?? '' }}
                            </td>
                            <td>
                                {{ $tutorium->departamento->nombre ?? '' }}
                            </td>
                            <td>
                                {{ $tutorium->email ?? '' }}
                            </td>
                            <td>
                                {{ $tutorium->hora_atencion ?? '' }}
                            </td>
                            <td>
                                @can('tutorium_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.tutoria.show', $tutorium->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('tutorium_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.tutoria.edit', $tutorium->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('tutorium_delete')
                                    <form action="{{ route('admin.tutoria.destroy', $tutorium->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('tutorium_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.tutoria.massDestroy') }}",
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
  $('.datatable-Tutorium:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection