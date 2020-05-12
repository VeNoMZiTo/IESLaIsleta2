@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.actividadesExtraescolare.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.actividades-extraescolares.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.actividadesExtraescolare.fields.id') }}
                        </th>
                        <td>
                            {{ $actividadesExtraescolare->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.actividadesExtraescolare.fields.titulo') }}
                        </th>
                        <td>
                            {{ $actividadesExtraescolare->titulo }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.actividadesExtraescolare.fields.subtitulo') }}
                        </th>
                        <td>
                            {{ $actividadesExtraescolare->subtitulo }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.actividadesExtraescolare.fields.texto') }}
                        </th>
                        <td>
                            {!! $actividadesExtraescolare->texto !!}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.actividades-extraescolares.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection