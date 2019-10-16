@extends('master')
@section('css')
@endsection
@section('content')
<div id='blog-noticias' class="container g-py-100 ">
    <div class="text-center g-mb-30">
        <h2 class="h1 g-color-black g-font-weight-700 text-uppercase mb-4">Noticias</h2>
        <div class="d-inline-block g-width-70 g-height-2 g-bg-black mb-4 g-bg-primary"></div>
    </div>
    <div id='pagination-1' class="pagination__list row justify-content-center">
        @foreach($noticias as $n)
        <div class="col-lg-6 pagination__item">
            <!-- Blog Minimal Blocks -->
            <article class="g-mb-100">
                <div class="g-mb-30">
                    <div class="media g-mb-25 d-flex align-items-center">
                        <i class="fa fa-user g-font-size-25 mr-3"></i>
                        <div class="media-body">
                            <h4 class="h6 g-color-primary mb-0">{{$n->autor}}</h4>
                            <span class="d-block g-color-gray-dark-v4 g-font-size-12">{{$n->fecha}}</span>
                        </div>
                    </div>

                    <img class="img-fluid w-100 g-mb-25 shadow-img" src="{{$n->foto[0]->getUrl()}}" alt="">
                    <h2 class="h4 g-color-black g-font-weight-600 mb-3">
                        <a class="u-link-v5 g-color-black g-color-primary--hover" href="/noticia/{{$n->id}}-{{$n->titulo}}">{{$n->titulo}}</a>
                    </h2>
                    <div class="g-color-gray-dark-v4 g-line-height-1_8 text-justify noticias-descripcion">
                        {!! $n->descripcion !!}
                    </div>
                    <a class="g-font-size-13" href="/noticia/{{$n->id}}-{{$n->titulo}}">Leer más...</a>
                </div>

                <ul class="d-flex justify-content-end list-inline g-brd-y g-brd-gray-light-v3 g-font-size-13 g-py-13 mb-0">
                    <li class="list-inline-item mr-auto">
                        <i class="align-middle g-color-primary g-font-size-default mr-1 icon-share"></i>
                        <a class="g-color-gray-dark-v4 g-color-primary--hover g-transition-0_3 g-text-underline--none--hover" href="#noticia-{{$n->id}}" data-modal-target="#noticia-{{$n->id}}" data-modal-effect="slide">Compartir</a>
                    </li>
                </ul>
            </article>
            <!-- End Blog Minimal Blocks -->
        </div>
        @endforeach
    </div>
</div>
@foreach($noticias as $n)
    <div id="noticia-{{$n->id}}" class="text-left g-max-width-600 g-bg-white g-overflow-y-auto g-pa-20" style="display: none;">
        <button type="button" class="close" onclick="Custombox.modal.close();">
            <i class="hs-icon hs-icon-close"></i>
        </button>
        <div class="u-heading-v2-6--bottom g-mb-40">
            <h2 class="u-heading-v2__title g-mb-10">Comparte la Noticia</h2>
            <h4 class="g-font-weight-200">{{$n->titulo}}</h4>
        </div>
        <ul class="u-list-inline">
            <li class="list-inline-item g-mb-10 fb-share-button" data-href="{{$actual_link = "http://$_SERVER[HTTP_HOST]"}}/noticia/{{$n->id}}-{{$n->titulo}}" data-layout="button" data-size="small">
                <a target='_blank' class="fb-xfbml-parse-ignore u-tags-v1 g-color-facebook g-brd-around g-brd-gray-light-v3 g-brd-facebook--hover g-bg-blue-opacity-0_1 g-bg-facebook--hover g-color-white--hover g-rounded-50 g-py-4 g-px-15" href="https://www.facebook.com/sharer/sharer.php?u={{$actual_link = "http://$_SERVER[HTTP_HOST]"}}/noticia/{{$n->id}}-{{$n->titulo}}">
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
            <input id='urlnoticia' class="form-control form-control-md rounded-0" type="text" value="{{$actual_link = "http://$_SERVER[HTTP_HOST]"}}/noticia/{{$n->id}}-{{$n->titulo}}">
            <div class="input-group-append box-copy">
                <span class="input-group-text rounded-0 copy"><i class="fa fa-copy"></i></span>
            </div>
        </div>
    </div>
@endforeach
@endsection
@section('js')
    <script type="text/javascript" src="./js/jQuery.paginate.js"></script>
    <script>
        $('#pagination-1').paginate({
            items_per_page: 6
        });
        $(".prev, .next").click(function() {
            $('html, body').animate({
                scrollTop: $('body').offset().top
            }, 1500);
        });
        $(".u-pagination-v1__item").click(function() {
            setTimeout(function(){
                $('html, body').animate({
                    scrollTop: $('body').offset().top
                }, 1500);
            },500);
        });
    </script>
@endsection
