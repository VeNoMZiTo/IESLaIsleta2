@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.descargar.title') }}
    </div>

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.descargar.fields.id') }}
                        </th>
                        <td>
                            {{ $descargar->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.descargar.fields.docente') }}
                        </th>
                        <td>
                            {{ $descargar->docente }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.descargar.fields.directiva') }}
                        </th>
                        <td>
                            {{ $descargar->directiva }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.descargar.fields.tutoria') }}
                        </th>
                        <td>
                            {{ $descargar->tutoria }}
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