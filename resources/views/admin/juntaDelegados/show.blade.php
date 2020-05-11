@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.juntaDelegado.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.junta-delegados.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.juntaDelegado.fields.id') }}
                        </th>
                        <td>
                            {{ $juntaDelegado->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.juntaDelegado.fields.titulo') }}
                        </th>
                        <td>
                            {{ $juntaDelegado->titulo }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.juntaDelegado.fields.subtitulo') }}
                        </th>
                        <td>
                            {{ $juntaDelegado->subtitulo }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.juntaDelegado.fields.texto') }}
                        </th>
                        <td>
                            {!! $juntaDelegado->texto !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.juntaDelegado.fields.imagen') }}
                        </th>
                        <td>
                            @if($juntaDelegado->imagen)
                                <a href="{{ $juntaDelegado->imagen->getUrl() }}" target="_blank">
                                    <img src="{{ $juntaDelegado->imagen->getUrl('thumb') }}" width="50px" height="50px">
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.junta-delegados.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection