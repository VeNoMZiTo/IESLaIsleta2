@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.descargar.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.descargars.update", [$descargar->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="docente">{{ trans('cruds.descargar.fields.docente') }}</label>
                <div class="needsclick dropzone {{ $errors->has('docente') ? 'is-invalid' : '' }}" id="docente-dropzone">
                </div>
                @if($errors->has('docente'))
                    <span class="text-danger">{{ $errors->first('docente') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.descargar.fields.docente_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="directiva">{{ trans('cruds.descargar.fields.directiva') }}</label>
                <div class="needsclick dropzone {{ $errors->has('directiva') ? 'is-invalid' : '' }}" id="directiva-dropzone">
                </div>
                @if($errors->has('directiva'))
                    <span class="text-danger">{{ $errors->first('directiva') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.descargar.fields.directiva_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection

@section('scripts')
<script>
    Dropzone.options.docenteDropzone = {
    url: '{{ route('admin.descargars.storeMedia') }}',
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
      $('form').find('input[name="docente"]').remove()
      $('form').append('<input type="hidden" name="docente" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="docente"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($descargar) && $descargar->docente)
      var file = {!! json_encode($descargar->docente) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="docente" value="' + file.file_name + '">')
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
    url: '{{ route('admin.descargars.storeMedia') }}',
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
@if(isset($descargar) && $descargar->directiva)
      var file = {!! json_encode($descargar->directiva) !!}
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
@endsection