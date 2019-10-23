@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.equipoDirectivo.title') }}
    </div>

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.equipoDirectivo.fields.id') }}
                        </th>
                        <td>
                            {{ $equipoDirectivo->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.equipoDirectivo.fields.cargo') }}
                        </th>
                        <td>
                            {{ $equipoDirectivo->cargo }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.equipoDirectivo.fields.nombre') }}
                        </th>
                        <td>
                            {{ $equipoDirectivo->nombre }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.equipoDirectivo.fields.abreviatura_departamento') }}
                        </th>
                        <td>
                            {{ $equipoDirectivo->abreviatura_departamento }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.equipoDirectivo.fields.departamento') }}
                        </th>
                        <td>
                            {{ $equipoDirectivo->departamento->nombre ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.equipoDirectivo.fields.email') }}
                        </th>
                        <td>
                            {{ $equipoDirectivo->email }}
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