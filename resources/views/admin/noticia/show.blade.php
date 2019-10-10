@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.noticium.title') }}
    </div>

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.noticium.fields.id') }}
                        </th>
                        <td>
                            {{ $noticium->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.noticium.fields.titulo') }}
                        </th>
                        <td>
                            {{ $noticium->titulo }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.noticium.fields.subtitulo') }}
                        </th>
                        <td>
                            {{ $noticium->subtitulo }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.noticium.fields.fecha') }}
                        </th>
                        <td>
                            {{ $noticium->fecha }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.noticium.fields.autor') }}
                        </th>
                        <td>
                            {{ $noticium->autor }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.noticium.fields.foto') }}
                        </th>
                        <td>
                            @foreach($noticium->foto as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank">
                                    <img src="{{ $media->getUrl('thumb') }}" width="50px" height="50px">
                                </a>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.noticium.fields.descripcion') }}
                        </th>
                        <td>
                            {!! $noticium->descripcion !!}
                        </td>
                    </tr>
                </tbody>
            </table>
            <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                {{ trans('global.back_to_list') }}
            </a>
        </div>


    </div>
</div>
@endsection