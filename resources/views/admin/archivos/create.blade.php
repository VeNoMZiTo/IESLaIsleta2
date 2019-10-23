@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.archivo.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.archivos.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('docentes') ? 'has-error' : '' }}">
                <label for="docentes">{{ trans('cruds.archivo.fields.docentes') }}</label>
                <div class="needsclick dropzone" id="docentes-dropzone">

                </div>
                @if($errors->has('docentes'))
                    <p class="help-block">
                        {{ $errors->first('docentes') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.archivo.fields.docentes_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('directiva') ? 'has-error' : '' }}">
                <label for="directiva">{{ trans('cruds.archivo.fields.directiva') }}</label>
                <div class="needsclick dropzone" id="directiva-dropzone">

                </div>
                @if($errors->has('directiva'))
                    <p class="help-block">
                        {{ $errors->first('directiva') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.archivo.fields.directiva_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('tutoria') ? 'has-error' : '' }}">
                <label for="tutoria">{{ trans('cruds.archivo.fields.tutoria') }}</label>
                <div class="needsclick dropzone" id="tutoria-dropzone">

                </div>
                @if($errors->has('tutoria'))
                    <p class="help-block">
                        {{ $errors->first('tutoria') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.archivo.fields.tutoria_helper') }}
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
    Dropzone.options.docentesDropzone = {
    url: '{{ route('admin.archivos.storeMedia') }}',
    maxFilesize: 2, // MB
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2
    },
    success: function (file, response) {
      $('form').find('input[name="docentes"]').remove()
      $('form').append('<input type="hidden" name="docentes" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="docentes"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($archivo) && $archivo->docentes)
      var file = {!! json_encode($archivo->docentes) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="docentes" value="' + file.file_name + '">')
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
<script>
    Dropzone.options.directivaDropzone = {
    url: '{{ route('admin.archivos.storeMedia') }}',
    maxFilesize: 2, // MB
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2
    },
    success: function (file, response) {
      $('form').find('input[name="directiva"]').remove()
      $('form').append('<input type="hidden" name="directiva" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="directiva"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($archivo) && $archivo->directiva)
      var file = {!! json_encode($archivo->directiva) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="directiva" value="' + file.file_name + '">')
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
<script>
    Dropzone.options.tutoriaDropzone = {
    url: '{{ route('admin.archivos.storeMedia') }}',
    maxFilesize: 2, // MB
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2
    },
    success: function (file, response) {
      $('form').find('input[name="tutoria"]').remove()
      $('form').append('<input type="hidden" name="tutoria" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="tutoria"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($archivo) && $archivo->tutoria)
      var file = {!! json_encode($archivo->tutoria) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="tutoria" value="' + file.file_name + '">')
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