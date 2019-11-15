@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.impreso.title') }}
    </div>

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.impreso.fields.id') }}
                        </th>
                        <td>
                            {{ $impreso->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.impreso.fields.nombre') }}
                        </th>
                        <td>
                            {{ $impreso->nombre }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.impreso.fields.archivo') }}
                        </th>
                        <td>
                            {{ $impreso->archivo }}
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