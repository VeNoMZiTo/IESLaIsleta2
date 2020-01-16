@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.grupo.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.grupos.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.grupo.fields.id') }}
                        </th>
                        <td>
                            {{ $grupo->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.grupo.fields.curso') }}
                        </th>
                        <td>
                            {{ $grupo->curso }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.grupos.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#curso_horarios" role="tab" data-toggle="tab">
                {{ trans('cruds.horario.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#curso_cita_previa" role="tab" data-toggle="tab">
                {{ trans('cruds.citaPrevium.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#cursos_asginaturas" role="tab" data-toggle="tab">
                {{ trans('cruds.asginatura.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="curso_horarios">
            @includeIf('admin.grupos.relationships.cursoHorarios', ['horarios' => $grupo->cursoHorarios])
        </div>
        <div class="tab-pane" role="tabpanel" id="curso_cita_previa">
            @includeIf('admin.grupos.relationships.cursoCitaPrevia', ['citaPrevia' => $grupo->cursoCitaPrevia])
        </div>
        <div class="tab-pane" role="tabpanel" id="cursos_asginaturas">
            @includeIf('admin.grupos.relationships.cursosAsginaturas', ['asginaturas' => $grupo->cursosAsginaturas])
        </div>
    </div>
</div>

@endsection