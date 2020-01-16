@extends('master')
@section('title','Inicio')
@section('css')
    <!-- Revolution Slider -->
    <link rel="stylesheet" href="vendor/revolution-slider/revolution/fonts/pe-icon-7-stroke/css/pe-icon-7-stroke.css">
    <link rel="stylesheet" href="vendor/revolution-slider/revolution/css/settings.css">
    <link rel="stylesheet" href="vendor/revolution-slider/revolution/css/layers.css">
    <link rel="stylesheet" href="vendor/revolution-slider/revolution/css/navigation.css">
@endsection

@section('slider')

    <section class="s-slider">
        <div id="rev_slider_486_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container u-shadow-v1-5"
             data-alias="news-gallery36"
             data-source="gallery">
            <div id="rev_slider_486_1" class="rev_slider fullwidthabanner" style="display: none;"
                 data-version="5.4.1">
                <ul>
                    @php
                        $contador=1687;

                    @endphp
                    @foreach($slider as $s)
                        @php
                        $dataIndex='rs-'.$contador;
                        $contador++;
                        @endphp
                    <li data-index="{{$dataIndex}}"
                        data-transition="parallaxvertical"
                        data-slotamount="default"
                        data-hideafterloop="0"
                        data-hideslideonmobile="off"
                        data-easein="default"
                        data-easeout="default"
                        data-masterspeed="default"
                        data-thumb="{{$s->foto->getUrl()}}"
                        data-rotate="0"
                        data-fstransition="fade"
                        data-fsmasterspeed="1500"
                        data-fsslotamount="7"
                        data-saveperformance="off"
                        data-title="{{$s->titulo}}"
                        data-description="{{$s->descripcion}}">
                        <img class="rev-slidebg" src="{{$s->foto->getUrl()}}" alt="Image description"
                             data-bgfit="cover"
                             data-bgrepeat="no-repeat"
                             data-bgparallax="10">

                        <!-- LAYER NR. 1 -->
                        <div id="slide-1687-layer-3" class="tp-caption tp-shape tp-shapewrapper tp-resizeme" style="z-index: 5; background-color: rgba(0, 0, 0, .65);"
                             data-x="['center','center','center','center']"
                             data-y="['middle','middle','middle','middle']"
                             data-hoffset="['0','0','0','0']"
                             data-voffset="['0','0','0','0']"
                             data-width="full"
                             data-height="full"
                             data-whitespace="normal"
                             data-type="shape"
                             data-basealign="slide"
                             data-responsive_offset="on"
                             data-frames='[
                         {"from":"opacity:0;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},
                         {"delay":"wait","speed":1000,"to":"opacity:0;","ease":"Power3.easeInOut"}
                       ]'
                             data-textAlign="['left','left','left','left']"
                             data-paddingtop="[0,0,0,0]"
                             data-paddingright="[0,0,0,0]"
                             data-paddingbottom="[0,0,0,0]"
                             data-paddingleft="[0,0,0,0]"></div>

                        <!-- LAYER NR. 2 -->
                        <div id="slide-1687-layer-1" class="tp-caption Newspaper-Title tp-resizeme" style="z-index: 6; min-width: 600px; max-width: 1200px; white-space: normal;"
                             data-x="['left','left','left','left']"
                             data-y="['top','top','top','top']"
                             data-hoffset="['50','50','50','30']"
                             data-voffset="['165','135','105','130']"
                             data-fontsize="['35','30','30','30']"
                             data-lineheight="['55','55','55','35']"
                             data-width="['850','500','500','420']"
                             data-height="none"
                             data-whitespace="normal"
                             data-type="text"
                             data-responsive_offset="on"
                             data-frames='[
                         {"from":"y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},
                         {"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}
                       ]'
                             data-textAlign="['left','left','left','left']"
                             data-paddingtop="[0,0,0,0]"
                             data-paddingright="[0,0,0,0]"
                             data-paddingbottom="[10,10,10,10]"
                             data-paddingleft="[0,0,0,0]">{{$s->descripcion}}
                        </div>

                        <!-- LAYER NR. 3 -->
                        <div id="slide-1687-layer-2" class="tp-caption Newspaper-Subtitle tp-resizeme" style="z-index: 7; white-space: nowrap; text-transform: uppercase;"
                             data-x="['left','left','left','left']"
                             data-y="['top','top','top','top']"
                             data-hoffset="['50','50','50','30']"
                             data-voffset="['140','110','80','100']"
                             data-width="none"
                             data-height="none"
                             data-whitespace="nowrap"
                             data-type="text"
                             data-responsive_offset="on"
                             data-frames='[
                         {"from":"y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},
                         {"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}
                       ]'
                             data-textAlign="['left','left','left','left']"
                             data-paddingtop="[0,0,0,0]"
                             data-paddingright="[0,0,0,0]"
                             data-paddingbottom="[0,0,0,0]"
                             data-paddingleft="[0,0,0,0]">{{$s->titulo}}
                        </div>
                        @if(!is_null($s->boton))
                            <a id="slide-1687-layer-5" class="tp-caption Newspaper-Button rev-btn" href='{{$s->boton}}' style="z-index: 8;font-size:20px;border-radius:0.25rem; background:white; color:black; white-space: nowrap; text-transform: uppercase; outline: none; box-shadow: none; box-sizing: border-box; -moz-box-sizing: border-box; -webkit-box-sizing: border-box; cursor: pointer;"
                               data-x="['left','left','left','left']"
                               data-y="['top','top','top','top']"
                               data-hoffset="['53','53','53','30']"
                               data-voffset="['300','331','301','245']"
                               data-width="none"
                               data-height="none"
                               data-whitespace="nowrap"
                               data-type="button"
                               data-responsive_offset="on"
                               data-responsive="off"
                               data-frames='[
                         {"from":"y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},
                         {"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;","ease":"Power3.easeInOut"},
                         {"frame":"hover","speed":"300","ease":"Power1.easeInOut","to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":"c:rgba(255, 255, 255, 1.00);bg:rgba(29, 136, 115, 1.00);bc:rgba(29, 136, 115, 1.00);bw:1px 1px 1px 1px;"}
                       ]'
                               data-textAlign="['left','left','left','left']"
                               data-paddingtop="[21,21,21,21]"
                               data-paddingright="[44,44,44,44]"
                               data-paddingbottom="[21,21,21,21]"
                               data-paddingleft="[44,44,44,44]"><i class="fa fa-play"></i>
                            </a>
                        @else
                        @endif
                        <!-- LAYER NR. 4 -->
                    </li>
                    @endforeach
                </ul>

                <div class="tp-bannertimer tp-bottom" style="height: 5px; background-color: rgba(166, 216, 236, 1);"></div>
            </div>
        </div>
    </section>
@endsection

@section('content')
    <section id='s-actividad' class="g-py-20">
        <div id="boxactividades" class="container-fluid">
            <div class="u-heading-v3-1 g-mb-20 text-center">
                <h2 class="text-uppercase h3 u-heading-v3__title g-brd-primary">De especial interés</h2>
            </div>
            <div class="justify-content-center d-flex">
                    <div id="actividades" class="row justify-content-center">
                        @foreach($actividades as $a)
                            @php
                            $mes=['','Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic'];
                            @endphp
                        <div class="col-12 col-lg-6 col-xl-3 g-mb-15 news">
                            <!-- Article -->
                            <article class="g-brd-around g-brd-gray-light-v4 g-pa-5 u-shadow-v4" >
                                <figure class="g-pos-rel">
                                    <img class="img-fluid w-100 g-mb-10" src="{{$a->foto[0]->getUrl()}}" alt="">
                                    <figcaption class="text-uppercase text-center g-line-height-1_2 g-bg-white-opacity-0_8 g-color-gray-dark-v2 g-pos-abs g-top-20 g-px-15 g-py-10">
                                        <strong class="d-block numero">{{substr($a->fecha,0,2)}}</strong>
                                        <hr class="g-brd-gray-dark-v2 my-1">
                                        <small class="d-block mes">{{$mes[intval(substr($a->fecha,3,2))]}}</small>
                                    </figcaption>
                                </figure>
                                <div class="g-pa-20">
                                    <div class="u-heading-v2-6--bottom g-brd-primary g-mb-20">
                                        <h4 class="h4 u-heading-v2__title g-font-weight-300 g-mb-0">
                                            <a class="u-link-v5 g-color-main g-color-primary--hover actividades-titulo" href="/actividad/{{$a->id}}-{{$a->titulo}}">{{$a->titulo}}</a>
                                        </h4>
                                    </div>

                                    <div class="g-font-size-15 actividades-descripcion">
                                        {!! $a->descripcion !!}
                                    </div>
                                </div>
                            </article>
                            <!-- End Article -->
                        </div>
                        @endforeach
                    </div>
                </div>
        </div>
    </section>
    <section id="news" class="g-bg-gray-light-v5 g-pb-40 u-shadow-v1-5">
        <div class="container g-pt-100 g-pb-50 blog ">
            <div class='row blog-row'>
                <div class='col-12 px-0'>
                    <div class="u-heading-v3-1 g-mb-30">
                        <h2 class="h5 u-heading-v3__title g-font-primary g-font-weight-700 g-color-gray-dark-v1 text-uppercase g-brd-primary">Últimas noticias</h2>
                    </div>
                </div>
            </div>
            <div class="row blog-row">
                <div class="col-12 col-lg-6 principal ">

                    @if(isset($noticias[0]))
                    <img src="{{$noticias[0]->foto[0]->getUrl()}}" class="img-fluid u-shadow-v2 fotoprincipal">
                    <div class="overlay-f-principal"></div>
                    <div class=" boxprincipal g-pt-15--md">
                        <ul class="list-inline g-color-white g-font-weight-600 g-font-size-12">
                            <li class="list-inline-item mr-0">{{$noticias[0]->autor}}</li>
                            <li class="list-inline-item mx-2">&#183;</li>
                            <li class="list-inline-item">{{$noticias[0]->fecha}}</li>
                            <li class="list-inline-item mx-2 redes-title">&#183;</li>
                            <li class="list-inline-item redes-title">
                                <a class="u-link-v5 g-color-white g-color-primary--hover" href="#noticia-{{$noticias[0]->id}}" data-modal-target="#noticia-{{$noticias[0]->id}}" data-modal-effect="slide">Compartir</a>
                            </li>
                        </ul>
                        <h2 class="h2 g-color-black g-font-weight-600 mb-4">
                            <a class="u-link-v5 g-color-white g-color-primary--hover" href="/noticia/{{$noticias[0]->id}}-{{$noticias[0]->titulo}}">{{$noticias[0]->titulo}}</a>
                        </h2>
                        <a href="/noticia/{{$noticias[0]->id}}-{{$noticias[0]->titulo}}" class="btn g-bg-primary g-brd-primary--hover g-color-white btn-lg">Leer más</a>
                    </div>
                    <hr class='p-0 my-1 redes-principal'/>
                    <ul class="list-inline mb-0 redes-principal">
                        <li class="list-inline-item g-mr-15">
                            <a class='d-flex align-items-center u-link-v5 g-color-gray-dark-v3 g-color-primary--hover' href="#noticia-{{$noticias[0]->id}}" data-modal-target="#noticia-{{$noticias[0]->id}}" data-modal-effect="slide">
                                <span class="u-icon-v3 u-icon-size--sm g-bg-facebook g-bg-gray-light-v5  rounded-circle">
                                    <i class="icon-share"></i>
                                </span>
                                Compartir
                            </a>
                        </li>
                    </ul>
                    <hr class='separador-principal' style="border-top-color: transparent !important;"/>
                    @endif
                </div>


                <div class="js-carousel col-12 col-lg-6 carousel-noticias"
                     data-infinite="true"
                     data-slides-show="2"
                     data-slides-scroll="1"
                     data-vertical="true"
                     data-autoplay="true"
                     data-pauseOnHover="true"
                     data-responsive='[{
                     "breakpoint": 1200,
                     "settings": {
                         "slidesToShow": 2,
                         "slidesToScroll": 1
                     }
                     }, {
                       "breakpoint": 992,
                       "settings": {
                         "slidesToShow": 1,
                         "slidesToScroll": 1
                       }
                     }, {
                       "breakpoint": 768,
                       "settings": {
                         "slidesToShow": 1,
                         "slidesToScroll": 1
                       }
                     }, {
                       "breakpoint": 576,
                       "settings": {
                         "slidesToShow": 1,
                         "slidesToScroll": 1
                       }
                     }]'>
                    @foreach($noticias as $n)
                        @if(!$loop->first)
                        <div class="js-slide g-px-15 row fotos g-my-20">
                            <div class="col-12 col-lg-6">
                                <img src="{{$n->foto[0]->getUrl()}}" class="img-fluid u-shadow-v2 rounded">
                            </div>
                            <div class="col-12 col-lg-6 ">
                                <div class="g-pt-15 g-pt-0--lg">
                                    <ul class="list-inline g-color-gray-dark-v4 g-font-weight-600 g-font-size-12">
                                        <li class="list-inline-item mr-0">{{$n->autor}}</li>
                                        <li class="list-inline-item mx-2">&#183;</li>
                                        <li class="list-inline-item">{{$n->fecha}}</li>
                                    </ul>
                                    <h4 class="h6 g-color-black g-font-weight-600 mb-4">
                                        <a class="u-link-v5 g-color-black g-color-primary--hover" href="/noticia/{{$n->id}}-{{$n->titulo}}">{{$n->titulo}}</a>
                                    </h4>
                                    <div class="noticias-descripcion">
                                        {!! $n->descripcion !!}
                                    </div>
                                    <hr class='p-0 my-1'/>
                                    <ul class="list-inline mb-0">
                                        <li class="list-inline-item g-mr-15 ">
                                            <a class='d-flex align-items-center u-link-v5 g-color-gray-dark-v3 g-color-primary--hover' href="#noticia-{{$n->id}}" data-modal-target="#noticia-{{$n->id}}" data-modal-effect="slide">
                                            <span class="u-icon-v3 u-icon-size--sm g-bg-facebook g-bg-gray-light-v5  rounded-circle">
                                                <i class="icon-share"></i>
                                            </span>
                                            Compartir
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="u-divider u-divider-solid g-my-80 text-center u-divider-linear-gradient--primary">
                <a href='/noticias' class='u-link-v5 a-noticias'><i class="u-divider__icon g-bg-primary g-color-white w-auto position-relative p-3 rounded g-bg-white--hover g-color-primary--hover g-brd-primary--hover g-brd-transparent g-transition-0_2">Anteriores Noticias</i></a>
            </div>
        </div>
    </section>

    <div id="iniciocontact" class="shortcode-html ">
        <!-- Contact Info -->
        <div class="g-bg-black-opacity-0_9 g-color-white text-center g-py-50 footer-1 u-shadow-v1-5" >
            <div class="container">

                <address class="row g-color-white-opacity-0_8 mb-0">
                    <div class="col-sm-6 col-md-4 g-brd-right--md g-brd-gray-dark-v1 g-mb-60 g-mb-0--md">
                        <i class="icon-line icon-map d-inline-block display-5  g-mb-25 g-color-primary--hover"></i>
                        <h5 class=" text-uppercase g-mb-5">Dirección</h5>
                        <h6><strong> Calle Juan Rejón, 58, 35008<br> Las Palmas de Gran Canaria, Las Palmas</strong></h6>
                    </div>

                    <div class="col-sm-6 col-md-4 g-brd-right--md g-brd-gray-dark-v1 g-mb-60 g-mb-0--md">
                        <i class="icon-call-in d-inline-block display-5 g-mb-25 g-color-primary--hover"></i>
                        <h5 class=" text-uppercase g-mb-5">Teléfono</h5>
                        <h5><strong><a href='tel:928 468 550'>928 468 550</a></strong></h5>
                    </div>

                    <div class="col-sm-6 col-md-4 g-brd-right--md  g-mb-60 g-mb-0--md">
                        <i class="icon-envelope d-inline-block display-5 g-mb-25 g-color-primary--hover"></i>
                        <h5 class=" text-uppercase g-mb-5">Email</h5>
                        <h5>
                            <a class="" href="mailto:info@ieslaisleta.net">
                                <strong>info@ieslaisleta.net</strong>
                            </a>
                        </h5>
                    </div>
                </address>
            </div>
        </div>
        <!-- End Contact Info -->
        <!-- Google Map -->
        <div class="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3517.9103710796107!2d-15.422621871163937!3d28.14921659375105!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x6b0970ce7d71a8eb!2sIES+La+Isleta!5e0!3m2!1ses!2ses!4v1560123502071!5m2!1ses!2ses" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe></iframe>
        </div>
        <!-- End Google Map -->
        <!-- Social Links -->
        <ul class="row no-gutters list-inline g-mb-0">
            <li class="col list-inline-item g-mr-0">
                <a class="d-block g-color-white-opacity-0_8 g-bg-twitter g-color-white--hover g-opacity-1--hover g-font-size-16 text-center g-transition-0_2 g-pa-15" href="https://twitter.com/IESLaIsleta" target="_blank">
                    <i class="fa fa-twitter"></i>
                </a>
            </li>

            <li class="col list-inline-item g-mr-0">
                <a class="d-block g-color-white-opacity-0_8 g-bg-facebook g-color-white--hover g-opacity-1--hover g-font-size-16 text-center g-transition-0_2 g-pa-15" href="https://www.facebook.com/ies.laisleta.98" target="_blank">
                    <i class="fa fa-facebook"></i>
                </a>
            </li>
            <li class="col list-inline-item g-mr-0">
                <a class="d-block g-color-white-opacity-0_8 instagramcolor g-color-white--hover g-opacity-1--hover g-font-size-16 text-center g-transition-0_2 g-pa-15" href="https://www.instagram.com/ieslaisleta/" target="_blank">
                    <i class="fa fa-instagram"></i>
                </a>
            </li>

        </ul>
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
            <li class="list-inline-item g-mb-10 fb-share-button" data-href="{{$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"}}noticia/{{$n->id}}-{{$n->titulo}}" data-layout="button" data-size="small">
                <a target='_blank' class="fb-xfbml-parse-ignore u-tags-v1 g-color-facebook g-brd-around g-brd-gray-light-v3 g-brd-facebook--hover g-bg-blue-opacity-0_1 g-bg-facebook--hover g-color-white--hover g-rounded-50 g-py-4 g-px-15" href="https://www.facebook.com/sharer/sharer.php?u={{$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"}}noticia/{{$n->id}}-{{$n->titulo}}">
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
            <input id='urlnoticia' class="form-control form-control-md rounded-0" type="text" value="{{$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"}}noticia/{{$n->id}}-{{$n->titulo}}">
            <div class="input-group-append box-copy">
                <span class="input-group-text rounded-0 copy"><i class="fa fa-copy"></i></span>
            </div>
        </div>
    </div>
    @endforeach
@endsection
@section('js')

<script>
    $(document).ready(function () {
        var CarouselItems=$('.carousel-noticias .js-slide');
        var AlturaSlide=[];
        for(let x=0; x<CarouselItems.length; x++){
            AlturaSlide[x]=CarouselItems.eq(x).height();
        }
        var AlturaMaxima = Math.max.apply(Math, AlturaSlide);
        CarouselItems.height(AlturaMaxima);
    });

    // initialization of carousel
    var tpj = jQuery;
    var revapi486;
    tpj(document).ready(function () {
        if (tpj('#rev_slider_486_1').revolution == undefined) {
            revslider_showDoubleJqueryError('#rev_slider_486_1');
        } else {
            revapi486 = tpj('#rev_slider_486_1').show().revolution({
                sliderType: 'standard',
                jsFileLocation: 'revolution/js/',
                sliderLayout: 'fullwidth',
                dottedOverlay: 'none',
                delay: 9000,
                navigation: {
                    keyboardNavigation: 'on',
                    keyboard_direction: 'horizontal',
                    mouseScrollNavigation: 'off',
                    mouseScrollReverse: 'default',
                    onHoverStop: 'on',
                    touch: {
                        touchenabled: 'on',
                        swipe_threshold: 75,
                        swipe_min_touches: 1,
                        swipe_direction: 'horizontal',
                        drag_block_vertical: false
                    },
                    arrows: {
                        style: 'gyges',
                        enable: true,
                        hide_onmobile: false,
                        hide_over: 778,
                        hide_onleave: false,
                        tmp: '',
                        left: {
                            h_align: 'right',
                            v_align: 'bottom',
                            h_offset: 40,
                            v_offset: 0
                        },
                        right: {
                            h_align: 'right',
                            v_align: 'bottom',
                            h_offset: 0,
                            v_offset: 0
                        }
                    },
                    tabs: {
                        style: 'erinyen',
                        enable: true,
                        width: 250,
                        height: 75,
                        min_width: 250,
                        wrapper_padding: 0,
                        wrapper_color: 'transparent',
                        wrapper_opacity: '0',
                        tmp: '<div class="tp-tab-title"></div>' +
                            '<div class="tp-tab-desc"></div>',
                        visibleAmount: 3,
                        hide_onmobile: true,
                        hide_under: 778,
                        hide_onleave: false,
                        hide_delay: 200,
                        direction: 'vertical',
                        span: false,
                        position: 'inner',
                        space: 10,
                        h_align: 'right',
                        v_align: 'center',
                        h_offset: 30,
                        v_offset: 0
                    }
                },
                viewPort: {
                    enable: true,
                    outof: 'pause',
                    visible_area: '80%',
                    presize: false
                },
                responsiveLevels: [1240, 1024, 778, 480],
                visibilityLevels: [1240, 1024, 778, 480],
                gridwidth: [1240, 1024, 778, 480],
                gridheight: [500, 450, 400, 350],
                lazyType: 'none',
                parallax: {
                    type: 'scroll',
                    origo: 'enterpoint',
                    speed: 400,
                    levels: [5, 10, 15, 20, 25, 30, 35, 40, 45, 50, 46, 47, 48, 49, 50, 55]
                },
                shadow: 0,
                spinner: 'off',
                stopLoop: 'off',
                stopAfterLoops: -1,
                stopAtSlide: -1,
                shuffle: 'off',
                autoHeight: 'off',
                hideThumbsOnMobile: 'off',
                hideSliderAtLimit: 0,
                hideCaptionAtLimit: 0,
                hideAllCaptionAtLilmit: 0,
                debugMode: false,
                fallbacks: {
                    simplifyAll: 'off',
                    nextSlideOnWindowFocus: 'off',
                    disableFocusListener: false
                }
            });
        }
        for(var x=0;x<$('.tp-tab').length;x++){
            $('.tp-tab-title').eq(x).text($('.tp-revslider-slidesli').eq(x).attr('data-title'));
            $('.tp-tab-desc').eq(x).text($('.tp-revslider-slidesli').eq(x).attr('data-description'));
        }
        $('.s-slider').removeClass('s-slider');
    });

</script>

@endsection
