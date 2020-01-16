@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.team.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.teams.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.team.fields.id') }}
                        </th>
                        <td>
                            {{ $team->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.team.fields.name') }}
                        </th>
                        <td>
                            {{ $team->name }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.teams.index') }}">
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
            <a class="nav-link" href="#team_users" role="tab" data-toggle="tab">
                {{ trans('cruds.user.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#team_departamentos" role="tab" data-toggle="tab">
                {{ trans('cruds.departamento.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#team_asginaturas" role="tab" data-toggle="tab">
                {{ trans('cruds.asginatura.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="team_users">
            @includeIf('admin.teams.relationships.teamUsers', ['users' => $team->teamUsers])
        </div>
        <div class="tab-pane" role="tabpanel" id="team_departamentos">
            @includeIf('admin.teams.relationships.teamDepartamentos', ['departamentos' => $team->teamDepartamentos])
        </div>
        <div class="tab-pane" role="tabpanel" id="team_asginaturas">
            @includeIf('admin.teams.relationships.teamAsginaturas', ['asginaturas' => $team->teamAsginaturas])
        </div>
    </div>
</div>

@endsection