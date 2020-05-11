@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.impreso.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.impresos.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
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
                            @if($impreso->archivo)
                                <a href="{{ $impreso->archivo->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.impresos.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection