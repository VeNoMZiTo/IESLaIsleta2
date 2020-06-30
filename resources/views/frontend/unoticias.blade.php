@extends('master')
@php
    $mediador = $articulo;
    if(count($mediador->foto)){
        $image = $mediador->foto;
    }else{
        $image = '/img/fondos/placeholder.jpg';
    }
@endphp
@section('title',$mediador->titulo)
@section('meta')
<!-- Facebook-->
    <meta property="og:url"           content="ies.adrianrm.com" />
    <meta property="og:title"         content="Ies La Isleta" />
    <meta property="og:description"   content="{{$mediador->titulo}}" />
    <meta property="og:image"         content="{{$image == '/img/fondos/placeholder.jpg' ? $image : $image[0]->getUrl()}}"/>
@endsection
@section('content')
<section id='zona-noticia' class="container g-py-100 ">
    <div class="row g-mb-40">
        <!-- Carousel Images -->
        <div class="col-md-12 text-center g-mb-30">
            <div class="js-carousel text-center g-pb-30 shadow-img" data-infinite="true" data-arrows-classes="u-arrow-v1 g-absolute-centered--y g-width-35 g-height-40 g-font-size-18 g-color-gray g-bg-white g-mt-minus-10" data-arrow-left-classes="fa fa-angle-left g-left-0" data-arrow-right-classes="fa fa-angle-right g-right-0" style='height: 500px;'>
                @if($image == '/img/fondos/placeholder.jpg')
                    <div class="js-slide">
                        <a class="js-fancybox" href="javascript:;" data-fancybox="lightbox-gallery--07-1" data-src="{{$image}}" data-caption="Foto provisional" data-animate-in="bounceInDown" data-animate-out="bounceOutDown" data-speed="1000" data-overlay-blur-bg="true">
                            <img class="img-fluid g-rounded-6 " src="{{$image}}" alt="" width="1110" style="height: 500px;">
                        </a>
                    </div>
                @else
                    @foreach($image as $i)
                    <div class="js-slide">
                        <a class="js-fancybox" href="javascript:;" data-fancybox="lightbox-gallery--07-1" data-src="{{$i->getUrl()}}" data-caption="{{$mediador->titulo}}" data-animate-in="bounceInDown" data-animate-out="bounceOutDown" data-speed="1000" data-overlay-blur-bg="true">
                            <img class="img-fluid g-rounded-6 " src="{{$i->getUrl()}}" alt="" width="1110" style="height: 500px;">
                        </a>
                    </div>
                    @endforeach
                @endif
            </div>
        </div>
        <!-- End Carousel Images -->
        <div class="col-md-8 g-mb-30">
            <div class="mb-5">
                <h2 class="g-color-black mb-1">{{$mediador->titulo}}</h2>
                <span class="d-block lead mb-4 ">{{$mediador->subtitulo}}</span>
                <div class='text-justify'>
                    {!! $mediador->descripcion !!}
                </div>
            </div>
            @if(count($mediador->archivos)!=0)
            <div class="u-heading-v3-1 g-mt-60">
                <h3 class="h5 u-heading-v3__title g-brd-primary">Archivos para descargar</h3>
            </div>
            <ul class="list-unstyled g-color-gray-dark-v4 mb-0 g-pt-20">
                @foreach($mediador->archivos as $a)
                    @php
                    $title=explode('_',$a->getUrl());
                    @endphp
                <li class="d-flex g-mb-10 g-font-weight-600 g-color-primary">
                    <a href="{{$a->getUrl()}}" download>
                        <i class="fa fa-file g-mt-5 g-mr-10"></i>{{$title[1]}}
                    </a>
                </li>
                @endforeach
            </ul>
            @endif
        </div>

        <div class="col-md-4 g-mb-30">
            <!-- Client -->
            <div class="mb-5">
                <h3 class="h5 g-color-black mb-3">Fecha</h3>
                <a class="g-color-gray-dark-v4 g-text-underline--none--hover" >
                    {{$mediador->fecha}}
                </a>
            </div>
            <!-- End Client -->

            <!-- Designers -->
            <div class="mb-5">
                <h3 class="h5 g-color-black mb-3">Autor</h3>
                <ul class="list-unstyled">
                    <li class="my-3">
                        <a class="g-color-gray-dark-v4 g-text-underline--none--hover">
                            {{$mediador->autor}}
                        </a>
                    </li>
                </ul>
            </div>
            <!-- End Designers -->

        </div>
        <div class="u-divider u-divider-center u-divider-linear-gradient u-divider-linear-gradient--gray-light-v3 w-100 mx-auto g-my-40">
            <i class="fa fa-circle u-divider__icon g-bg-white g-color-primary"></i>
        </div>
        <div class="col-12">
            <ul class="d-flex justify-content-center list-inline g-font-size-18 g-py-13 mb-0">
                    <li class="list-inline-item mr-5 mb-1">
                        <a class="btn u-btn-outline-primary g-rounded-25 g-font-size-18" href="#modal-compartir" data-modal-target="#modal-compartir" data-modal-effect="slide">
                            <i class="mr-1 icon-share"></i>
                            Compartir
                        </a>
                    </li>
                    <li class="list-inline-item ml-5 mb-1">
                        <a id='myprint' class="btn  u-btn-outline-brown g-rounded-25 g-font-size-18" href="javascript: void(0)">
                            <i class="mr-1 fa fa-print"></i>
                            Imprimir
                        </a>
                    </li>
                </ul>
        </div>
    </div>
    <div id="modal-compartir" class="text-left g-max-width-600 g-bg-white g-overflow-y-auto g-pa-20" style="display: none;">
        <button type="button" class="close" onclick="Custombox.modal.close();">
            <i class="hs-icon hs-icon-close"></i>
        </button>
        <div class="u-heading-v2-6--bottom g-mb-40">
            <h2 class="u-heading-v2__title g-mb-10">Comparte la Noticia</h2>
            <h4 class="g-font-weight-200">{{$mediador->titulo}}</h4>
        </div>
        <ul class="u-list-inline">
            <li class="list-inline-item g-mb-10">
                <a class="u-tags-v1 g-color-facebook g-brd-around g-brd-gray-light-v3 g-brd-facebook--hover g-bg-blue-opacity-0_1 g-bg-facebook--hover g-color-white--hover g-rounded-50 g-py-4 g-px-15" href="#">
                    <i class="fa fa-facebook mr-1"></i>
                    Facebook
                </a>
            </li>
            <li class="list-inline-item g-mb-10">
                <a class="u-tags-v1 g-color-twitter g-brd-around g-brd-gray-light-v3 g-brd-twitter--hover g-bg-blue-opacity-0_1 g-bg-twitter--hover g-color-white--hover g-rounded-50 g-py-4 g-px-15" href="#">
                    <i class="fa fa-twitter mr-1"></i>
                    Twitter
                </a>
            </li>
            <li class="list-inline-item g-mb-10">
                <a class="u-tags-v1 g-color-pink g-brd-around g-brd-gray-light-v3 g-brd-pink--hover g-bg-pink--hover g-color-white--hover g-rounded-50 g-py-4 g-px-15" href="#">
                    <i class="fa fa-envelope mr-1"></i>
                    Correo
                </a>
            </li>
        </ul>
        <hr class="w-50 g-my-15">
        <label>Dirección URL de la noticia:</label>
        <div class="input-group g-brd-primary--focus">
            <input id='urlnoticia' class="form-control form-control-md rounded-0" type="text" value="{{$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"}}">
            <div class="input-group-append box-copy">
                <span class="input-group-text rounded-0 copy"><i class="fa fa-copy"></i></span>
            </div>
        </div>
    </div>

</section>
@endsection
@section('js')

<script language="javascript" type="text/javascript">
    $(document).on('click','#myprint',function(){
        printerDiv();
    });
    function printerDiv(divID) {
        var divElements = $('#zona-noticia').html();
        var oldPage = document.body.innerHTML;
        $('main').html("<html><head><title></title></head><body><div class='container'>" + divElements + "</div></body>");
        window.print();
        document.body.innerHTML = oldPage;

    }
</script>
@endsection
