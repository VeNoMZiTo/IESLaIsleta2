@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.horario.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.horarios.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.horario.fields.id') }}
                        </th>
                        <td>
                            {{ $horario->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.horario.fields.grupo') }}
                        </th>
                        <td>
                            {{ $horario->grupo->nombre ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.horario.fields.horario') }}
                        </th>
                        <td>
                            {{ App\Horario::HORARIO_SELECT[$horario->horario] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.horario.fields.dia') }}
                        </th>
                        <td>
                            {{ App\Horario::DIA_SELECT[$horario->dia] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.horario.fields.asignatura') }}
                        </th>
                        <td>
                            {{ $horario->asignatura }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.horario.fields.color') }}
                        </th>
                        <td>
                            {{ $horario->color }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.horarios.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection