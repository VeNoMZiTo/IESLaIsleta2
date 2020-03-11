@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.actividade.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.actividades.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.actividade.fields.id') }}
                        </th>
                        <td>
                            {{ $actividade->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.actividade.fields.titulo') }}
                        </th>
                        <td>
                            {{ $actividade->titulo }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.actividade.fields.fecha') }}
                        </th>
                        <td>
                            {{ $actividade->fecha }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.actividade.fields.foto') }}
                        </th>
                        <td>
                            @foreach($actividade->foto as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank">
                                    <img src="{{ $media->getUrl('thumb') }}" width="50px" height="50px">
                                </a>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.actividade.fields.autor') }}
                        </th>
                        <td>
                            {{ $actividade->autor }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.actividade.fields.descripcion') }}
                        </th>
                        <td>
                            {!! $actividade->descripcion !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.actividade.fields.archivos') }}
                        </th>
                        <td>
                            @foreach($actividade->archivos as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.actividades.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection