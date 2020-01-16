@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.asginatura.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.asginaturas.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.asginatura.fields.id') }}
                        </th>
                        <td>
                            {{ $asginatura->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.asginatura.fields.nombre') }}
                        </th>
                        <td>
                            {{ $asginatura->nombre }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.asginatura.fields.cursos') }}
                        </th>
                        <td>
                            @foreach($asginatura->cursos as $key => $cursos)
                                <span class="label label-info">{{ $cursos->curso }}</span>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.asginaturas.index') }}">
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
            <a class="nav-link" href="#asignatura_cita_previa" role="tab" data-toggle="tab">
                {{ trans('cruds.citaPrevium.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="asignatura_cita_previa">
            @includeIf('admin.asginaturas.relationships.asignaturaCitaPrevia', ['citaPrevia' => $asginatura->asignaturaCitaPrevia])
        </div>
    </div>
</div>

@endsection