@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.horario.title') }}
    </div>

    <div class="card-body">
        <div class="mb-2">
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
                            {{ trans('cruds.horario.fields.curso') }}
                        </th>
                        <td>
                            {{ App\Horario::CURSO_SELECT[$horario->curso] ?? '' }}
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
                </tbody>
            </table>
            <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                {{ trans('global.back_to_list') }}
            </a>
        </div>


    </div>
</div>
@endsection