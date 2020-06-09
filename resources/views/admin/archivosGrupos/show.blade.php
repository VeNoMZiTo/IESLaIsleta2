@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.archivosGrupo.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.archivos-grupos.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.archivosGrupo.fields.id') }}
                        </th>
                        <td>
                            {{ $archivosGrupo->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.archivosGrupo.fields.grupo') }}
                        </th>
                        <td>
                            {{ $archivosGrupo->grupo->grupo ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.archivosGrupo.fields.archivos') }}
                        </th>
                        <td>
                            @foreach($archivosGrupo->archivos as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.archivosGrupo.fields.texto') }}
                        </th>
                        <td>
                            {!! $archivosGrupo->texto !!}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.archivos-grupos.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection