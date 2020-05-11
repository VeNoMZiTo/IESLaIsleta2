@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.ampa.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.ampas.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.ampa.fields.id') }}
                        </th>
                        <td>
                            {{ $ampa->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ampa.fields.titulo') }}
                        </th>
                        <td>
                            {{ $ampa->titulo }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ampa.fields.subtitulo') }}
                        </th>
                        <td>
                            {{ $ampa->subtitulo }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ampa.fields.texto') }}
                        </th>
                        <td>
                            {!! $ampa->texto !!}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.ampas.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection