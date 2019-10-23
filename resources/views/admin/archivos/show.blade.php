@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.archivo.title') }}
    </div>

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.archivo.fields.id') }}
                        </th>
                        <td>
                            {{ $archivo->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.archivo.fields.docentes') }}
                        </th>
                        <td>
                            {{ $archivo->docentes }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.archivo.fields.directiva') }}
                        </th>
                        <td>
                            {{ $archivo->directiva }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.archivo.fields.tutoria') }}
                        </th>
                        <td>
                            {{ $archivo->tutoria }}
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