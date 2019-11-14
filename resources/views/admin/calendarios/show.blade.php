@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.calendario.title') }}
    </div>

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.calendario.fields.id') }}
                        </th>
                        <td>
                            {{ $calendario->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.calendario.fields.tipo') }}
                        </th>
                        <td>
                            {{ App\Calendario::TIPO_SELECT[$calendario->tipo] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.calendario.fields.tema') }}
                        </th>
                        <td>
                            {{ $calendario->tema }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.calendario.fields.fecha') }}
                        </th>
                        <td>
                            {{ $calendario->fecha }}
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