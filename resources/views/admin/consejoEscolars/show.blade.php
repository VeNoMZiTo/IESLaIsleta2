@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.consejoEscolar.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.consejo-escolars.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.consejoEscolar.fields.id') }}
                        </th>
                        <td>
                            {{ $consejoEscolar->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.consejoEscolar.fields.titulo') }}
                        </th>
                        <td>
                            {{ $consejoEscolar->titulo }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.consejoEscolar.fields.subtitulo') }}
                        </th>
                        <td>
                            {{ $consejoEscolar->subtitulo }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.consejoEscolar.fields.texto') }}
                        </th>
                        <td>
                            {!! $consejoEscolar->texto !!}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.consejo-escolars.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection