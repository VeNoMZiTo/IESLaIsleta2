@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.citaPrevium.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.cita-previa.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.citaPrevium.fields.id') }}
                        </th>
                        <td>
                            {{ $citaPrevium->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.citaPrevium.fields.asignatura') }}
                        </th>
                        <td>
                            {{ $citaPrevium->asignatura->nombre ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.citaPrevium.fields.curso') }}
                        </th>
                        <td>
                            {{ $citaPrevium->curso->curso ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.citaPrevium.fields.fecha') }}
                        </th>
                        <td>
                            {{ $citaPrevium->fecha }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.cita-previa.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection