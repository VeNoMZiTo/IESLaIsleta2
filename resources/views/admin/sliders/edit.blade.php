@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.slider.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.sliders.update", [$slider->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('titulo') ? 'has-error' : '' }}">
                <label for="titulo">{{ trans('cruds.slider.fields.titulo') }}*</label>
                <input type="text" id="titulo" name="titulo" class="form-control" value="{{ old('titulo', isset($slider) ? $slider->titulo : '') }}" required>
                @if($errors->has('titulo'))
                    <p class="help-block">
                        {{ $errors->first('titulo') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.slider.fields.titulo_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('descripcion') ? 'has-error' : '' }}">
                <label for="descripcion">{{ trans('cruds.slider.fields.descripcion') }}*</label>
                <input type="text" id="descripcion" name="descripcion" class="form-control" value="{{ old('descripcion', isset($slider) ? $slider->descripcion : '') }}" required>
                @if($errors->has('descripcion'))
                    <p class="help-block">
                        {{ $errors->first('descripcion') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.slider.fields.descripcion_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('boton') ? 'has-error' : '' }}">
                <label for="boton">{{ trans('cruds.slider.fields.boton') }}</label>
                <input type="text" id="boton" name="boton" class="form-control" value="{{ old('boton', isset($slider) ? $slider->boton : '') }}">
                @if($errors->has('boton'))
                    <p class="help-block">
                        {{ $errors->first('boton') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.slider.fields.boton_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('foto') ? 'has-error' : '' }}">
                <label for="foto">{{ trans('cruds.slider.fields.foto') }}*</label>
                <div class="needsclick dropzone" id="foto-dropzone">

                </div>
                @if($errors->has('foto'))
                    <p class="help-block">
                        {{ $errors->first('foto') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.slider.fields.foto_helper') }}
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>


    </div>
</div>
@endsection

@section('scripts')
<script>
    Dropzone.options.fotoDropzone = {
    url: '{{ route('admin.sliders.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="foto"]').remove()
      $('form').append('<input type="hidden" name="foto" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="foto"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($slider) && $slider->foto)
      var file = {!! json_encode($slider->foto) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="foto" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}
</script>
@stop