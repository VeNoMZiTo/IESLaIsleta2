@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.curso.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.cursos.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.curso.fields.id') }}
                        </th>
                        <td>
                            {{ $curso->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.curso.fields.nivel') }}
                        </th>
                        <td>
                            {{ App\Curso::NIVEL_SELECT[$curso->nivel] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.curso.fields.curso') }}
                        </th>
                        <td>
                            {{ App\Curso::CURSO_SELECT[$curso->curso] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.curso.fields.asignatura') }}
                        </th>
                        <td>
                            {{ $curso->asignatura->asginaturas ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.cursos.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection