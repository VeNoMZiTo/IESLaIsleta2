@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.actividade.title') }}
    </div>

    <div class="card-body">
        <div class="mb-2">
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
                </tbody>
            </table>
            <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                {{ trans('global.back_to_list') }}
            </a>
        </div>


    </div>
</div>
@endsection