@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.equipoDocente.title') }}
    </div>

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.equipoDocente.fields.id') }}
                        </th>
                        <td>
                            {{ $equipoDocente->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.equipoDocente.fields.profesores') }}
                        </th>
                        <td>
                            {{ $equipoDocente->profesores }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.equipoDocente.fields.cargo') }}
                        </th>
                        <td>
                            {{ $equipoDocente->cargo }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.equipoDocente.fields.email') }}
                        </th>
                        <td>
                            {{ $equipoDocente->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.equipoDocente.fields.departamento') }}
                        </th>
                        <td>
                            {{ $equipoDocente->departamento->nombre ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.equipoDocente.fields.descarga') }}
                        </th>
                        <td>
                            {{ $equipoDocente->descarga }}
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