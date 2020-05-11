@extends('master')
@section('title','Documentos Institucionales')
@section('css')
@endsection
@section('content')

    <section>
        <div class='container g-py-100'>
            <div class='row text-center g-mb-30'>
                <div class="text-center col-12">
                    <h2 class="h1 g-color-black mb-4">Documentos institucionales</h2>
                    <div class="d-inline-block g-width-70 g-height-2 g-bg-primary mb-4"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 g-mb-50 g-mb-0--lg">
                    <img class="img-fluid u-shadow-v1-5 rounded h-100 object-fit-cover" src="/img/fotos-centro/biblioteca.jpg" alt="IES La Isleta Centro">
                </div>

                <div class="col-lg-6">
                    <header class="u-heading-v2-3--bottom g-brd-primary g-mb-20">
                        <h2 class="h3 u-heading-v2__title">Descargar documentos institucionales</h2>
                    </header>
                    <p class="lead g-mb-15">
                        Cualquier duda o sugerencia puede contactar con <a href="/consultas">nosotros</a>.
                    </p>
                    <div class="row">
                        @foreach($documentosInstitucionales as $d)
                            <div class='col-md-6 g-mb-30'>
                                <a class='media g-mb-15 cartaDescarga' href='{{$d->archivo->first()->getUrl()}}' download>
                                    <div class='d-flex align-self-center mr-3'>
                                        @php
                                            $tipo = explode('.',$d->archivo->first()->file_name);
                                            $tipo = $tipo[count($tipo) - 1];
                                            switch ($tipo){
                                                case 'jpg':
                                                case 'jpeg':
                                                case 'png':
                                                case 'gif':
                                                case 'webp':
                                                    $icono = '<i class="icon-finance-097 u-line-icon-pro"></i>';
                                                    break;
                                                case 'pdf':
                                                    $icono = '<i class="icon-education-101 u-line-icon-pro"></i>';
                                                    break;
                                                 default:
                                                    $icono = '<i class="icon-education-087 u-line-icon-pro"></i>';
                                                    break;
                                            }
                                        @endphp
                                        <span class='u-icon-v2 g-color-gray-dark-v4 rounded-circle'>
                                    {!! $icono !!}
                                </span>
                                    </div>
                                    <div class='media-body align-self-center'>
                                        <h3 class='h5 g-color-black mb-0'>{{$d->nombre}}</h3>

                                        <span class='d-block g-color-gray-dark-v4'>Archivo tipo : <b>{{$tipo}}</b></span>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')
@endsection
