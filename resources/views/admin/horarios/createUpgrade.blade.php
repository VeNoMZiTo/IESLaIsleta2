@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }} {{ trans('cruds.horario.title_singular') }}
        </div>

        <div class="card-body">
            <form action="{{ route("admin.horarios.store") }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group {{ $errors->has('horario') ? 'has-error' : '' }}">
                    <label for="horario">{{ trans('cruds.horario.fields.horario') }}*</label>
                    <select id="horario" name="horario" class="form-control" required>
                        <option value="" disabled {{ old('horario', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                        @foreach(App\Horario::HORARIO_SELECT as $key => $label)
                            <option value="{{ $key }}" {{ old('horario', null) === (string)$key ? 'selected' : '' }}>{{ $label }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('horario'))
                        <p class="help-block">
                            {{ $errors->first('horario') }}
                        </p>
                    @endif
                </div>
                <div class="form-group {{ $errors->has('dia') ? 'has-error' : '' }}">
                    <label for="dia">{{ trans('cruds.horario.fields.dia') }}*</label>
                    <select id="dia" name="dia" class="form-control" required>
                        <option value="" disabled {{ old('dia', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                        @foreach(App\Horario::DIA_SELECT as $key => $label)
                            <option value="{{ $key }}" {{ old('dia', null) === (string)$key ? 'selected' : '' }}>{{ $label }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('dia'))
                        <p class="help-block">
                            {{ $errors->first('dia') }}
                        </p>
                    @endif
                </div>
                <div class="form-group {{ $errors->has('curso_id') ? 'has-error' : '' }}">
                    <label for="curso">{{ trans('cruds.horario.fields.curso') }}*</label>
                    <select name="curso_id" id="curso" class="form-control select2" required>
                        @foreach($cursos as $id => $curso)
                            <option value="{{ $id }}" {{ (isset($horario) && $horario->curso ? $horario->curso->id : old('curso_id')) == $id ? 'selected' : '' }}>{{ $curso }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('curso_id'))
                        <p class="help-block">
                            {{ $errors->first('curso_id') }}
                        </p>
                    @endif
                </div>
                <div class="form-group {{ $errors->has('asignatura') ? 'has-error' : '' }}">
                    <label for="asignatura">{{ trans('cruds.horario.fields.asignatura') }}*</label>
                    <input type="text" id="asignatura" name="asignatura" class="form-control" value="{{ old('asignatura', isset($horario) ? $horario->asignatura : '') }}" required>
                    @if($errors->has('asignatura'))
                        <p class="help-block">
                            {{ $errors->first('asignatura') }}
                        </p>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.horario.fields.asignatura_helper') }}
                    </p>
                </div>
                <div class="form-group {{ $errors->has('color') ? 'has-error' : '' }}">
                    <label for="color">{{ trans('cruds.horario.fields.color') }}*</label>
                    <input type="text" id="color" name="color" class="form-control" value="{{ old('color', isset($horario) ? $horario->color : '') }}" required>
                    @if($errors->has('color'))
                        <p class="help-block">
                            {{ $errors->first('color') }}
                        </p>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.horario.fields.color_helper') }}
                    </p>
                </div>
                <!--Hay que crear un @-section en admin para js-->
                <div class="row mb-4 caja-colores">
                    <div class="col-2">
                        <div class="cubo-color">
                            <div class="cubo-top" style="background:#007bff" data-color="#007bff">

                            </div>
                            <div class="cubo-bot">
                                Azul
                            </div>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="cubo-color">
                            <div class="cubo-top" style="background:#6610f2" data-color="#6610f2">

                            </div>
                            <div class="cubo-bot">
                                Lila
                            </div>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="cubo-color">
                            <div class="cubo-top" style="background:#6f42c1" data-color="#6f42c1">

                            </div>
                            <div class="cubo-bot">
                                Purpura
                            </div>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="cubo-color">
                            <div class="cubo-top" style="background:#e83e8c" data-color="#e83e8c">

                            </div>
                            <div class="cubo-bot">
                                Rosa
                            </div>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="cubo-color">
                            <div class="cubo-top" style="background:#dc3545" data-color="#dc3545">

                            </div>
                            <div class="cubo-bot">
                                Rojo
                            </div>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="cubo-color">
                            <div class="cubo-top" style="background:#fd7e14" data-color="#fd7e14">

                            </div>
                            <div class="cubo-bot">
                                Naranja
                            </div>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="cubo-color">
                            <div class="cubo-top" style="background:#ffc107" data-color="#ffc107">

                            </div>
                            <div class="cubo-bot">
                                Amarillo
                            </div>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="cubo-color">
                            <div class="cubo-top" style="background:#28a745" data-color="#28a745">

                            </div>
                            <div class="cubo-bot">
                                Verde
                            </div>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="cubo-color">
                            <div class="cubo-top" style="background:#20c997" data-color="#20c997">

                            </div>
                            <div class="cubo-bot">
                                Verde azulado
                            </div>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="cubo-color">
                            <div class="cubo-top" style="background:#17a2b8" data-color="#17a2b8">

                            </div>
                            <div class="cubo-bot">
                                Cyan
                            </div>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="cubo-color">
                            <div class="cubo-top" style="background:#fff" data-color="#fff">

                            </div>
                            <div class="cubo-bot">
                                Blanco
                            </div>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="cubo-color">
                            <div class="cubo-top" style="background:#6c757d" data-color="#6c757d">

                            </div>
                            <div class="cubo-bot">
                                Gris
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-4 caja-selector-color">
                    <div class="u-heading-v7-2 g-mb-30 col-12 text-center">
                        <h2 class="h3 u-heading-v7__title">¡Crea un color!</h2>
                        <div class="titulo-color g-brd-primary g-height-20">
                            <i class="fa fa-paint-brush titulo-color__icon g-color-primary"></i>
                        </div>
                    </div>
                    <div class="col-5">
                        <div class="panel bgcolor">
                            <table class="tabla-color">
                                <caption>Ajustes</caption>
                                <tbody>
                                <tr><th>RGB</th><td><input id="bgcolor-rgb" onchange="setString('bgcolor', this.value)" /></td></tr>
                                <tr><th>HEX</th><td><input id="bgcolor-hex" onchange="setString('bgcolor', this.value)" /></td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                    <div class="col-2 caja-boton-color">
                        <button id="bgcolor-button">Elige un color</button>
                    </div>
                    <div class="col-5 caja-preview-color">
                        <div id="preview-color">
                            <span class="oscuro">Texto oscuro</span>
                            <span class="normal">Texto normal</span>
                            <span class="claro">Texto claro</span>
                        </div>
                    </div>

                </div>
                <div>
                    <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
                </div>
            </form>
        </div>
    </div>
@endsection
@section('js')
    <script src="/js/jscolor.js"></script>
    <script>
        $('.cubo-top').click(function () {
            $('#color').val($(this).attr('data-color'));
        });
        var options = {
            valueElement: null,
            width: 300,
            height: 120,
            sliderSize: 20,
            position: 'top',
            borderColor: '#CCC',
            insetColor: '#CCC',
            backgroundColor: '#202020'
        };

        var pickers = {};

        pickers.bgcolor = new jscolor('bgcolor-button', options);
        pickers.bgcolor.onFineChange = "update('bgcolor')";
        pickers.bgcolor.fromString('AB2567');


        function update (id) {
            document.getElementById('preview-color').style.backgroundColor =
                pickers.bgcolor.toHEXString();


            document.getElementById(id + '-rgb').value = pickers[id].toRGBString();
            document.getElementById('color').value = pickers[id].toHEXString();
            document.getElementById(id + '-hex').value = pickers[id].toHEXString();

        }

        function setRGB (id, r, g, b) {
            pickers[id].fromRGB(r, g, b);
            update(id);
        }

        function setString (id, str) {
            pickers[id].fromString(str);
            update(id);
        }
    </script>
@endsection
