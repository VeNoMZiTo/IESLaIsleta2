@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.tutorium.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.tutoria.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.tutorium.fields.id') }}
                        </th>
                        <td>
                            {{ $tutorium->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tutorium.fields.nivel') }}
                        </th>
                        <td>
                            {{ $tutorium->nivel }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tutorium.fields.grupo') }}
                        </th>
                        <td>
                            {{ $tutorium->grupo }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tutorium.fields.tutor') }}
                        </th>
                        <td>
                            {{ $tutorium->tutor }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tutorium.fields.abreviatura_departamento') }}
                        </th>
                        <td>
                            {{ $tutorium->abreviatura_departamento }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tutorium.fields.email') }}
                        </th>
                        <td>
                            {{ $tutorium->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tutorium.fields.hora_atencion') }}
                        </th>
                        <td>
                            {{ $tutorium->hora_atencion }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.tutoria.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection