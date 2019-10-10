@extends('master')
@section('css')
@endsection
@section('content')
<div class="container g-py-100">
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
                        <a class="u-link-v5 g-color-black g-color-primary--hover" href="/unoticias">{{$n->titulo}}</a>
                    </h2>
                    <div class="g-color-gray-dark-v4 g-line-height-1_8 text-justify noticias-descripcion">
                        {!! $n->descripcion !!}
                    </div>
                    <a class="g-font-size-13" href="/unoticias">Leer más...</a>
                </div>

                <ul class="d-flex justify-content-end list-inline g-brd-y g-brd-gray-light-v3 g-font-size-13 g-py-13 mb-0">
                    <li class="list-inline-item mr-auto">
                        <i class="align-middle g-color-primary g-font-size-default mr-1 icon-share"></i>
                        <a class="g-color-gray-dark-v4 g-color-primary--hover g-transition-0_3 g-text-underline--none--hover" href="#" href="#noticia-1" data-modal-target="#noticia-1" data-modal-effect="slide">Compartir</a>
                    </li>
                </ul>
            </article>
            <!-- End Blog Minimal Blocks -->
        </div>
        @endforeach
    </div>
</div>
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
