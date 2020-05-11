@extends('master')
@section('title','Presentación')
@section('css')
@endsection
@section('content')
    <section>
        <div class='container g-py-100'>
            <div class='row text-center g-mb-30'>
                <div class="text-center col-12">
                    <h2 class="h1 g-color-black mb-4">Presentación</h2>
                    <div class="d-inline-block g-width-70 g-height-2 g-bg-primary mb-4"></div>
                </div>
                <p class="lead g-px-200--lg g-color-gray-dark-v3 mx-auto g-font-size-20">
                    Instituto de Educación Secundaria <span class="g-color-primary g-font-weight-600">La Isleta</span>
                </p>
            </div>
            <div class="row">
                <div class="col-lg-6 g-mb-50 g-mb-0--lg">
                    <p class="g-mb-30 g-color-gray-dark-v3 g-font-size-16 text-justify">
                        El <b>IES La Isleta</b> es un centro ubicado al norte de Las Palmas de Gran Canaria, cercano al puerto de La Luz. Es el nombre del propio barrio que le da nombre a nuestro IES: La Isleta, tradicionalmente dedicado a la pesca.
                    </p>
                    <p class="g-mb-30 g-color-gray-dark-v3 g-font-size-16 text-justify">
                        El centro comprende las enseñanzas de <b>ESO</b> y <b>Bachillerato</b>, contando con unos 480 alumnos/as, provenientes, en gran número del  de la zona educativa como el CEIP León y Castillo.
                    </p>
                    <p class="g-mb-30 g-color-gray-dark-v3 g-font-size-16 text-justify">
                        Nuestro centro se caracteriza por apostar por la enseñanza de  valores como la <b>convivencia positiva</b>, la <b>democracia participativa</b>, la <b>igualdad de género</b> o el <b>cuidado del medio ambiente</b>. También contamos con un <b>Plan Lector</b> que fue implantado hace varios cursos académicos
                    </p>
                </div>
                <div class="col-lg-6">
                    <div class="js-carousel text-center g-pb-30 PresentacionCarousel" data-infinite="true" data-arrows-classes="u-arrow-v1 g-absolute-centered--y g-width-35 g-height-40 g-font-size-18 g-color-gray g-bg-white g-mt-minus-10" data-arrow-left-classes="fa fa-angle-left g-left-0" data-arrow-right-classes="fa fa-angle-right g-right-0">
                        <div class="js-slide">
                            <a class="js-fancybox d-block u-block-hover rounded" href="javascript:;" data-fancybox="lightbox-gallery--07-1" data-src="/img/presentacion/centro.jpg" data-caption="Centro de IES La Isleta" data-animate-in="bounceInDown" data-animate-out="bounceOutDown" data-speed="1000" data-overlay-blur-bg="true">
                                <img class="img-fluidu-shadow-v1-5 rounded" src="/img/presentacion/centro.jpg" alt="IES La Isleta Centro">
                                <span class="u-block-hover__additional--fade g-bg-black-opacity-0_8 g-color-white">
                                    <i class="icon-magnifier g-absolute-centered g-font-size-25"></i>
                                </span>
                            </a>
                        </div>

                        <div class="js-slide">
                            <a class="js-fancybox d-block u-block-hover rounded" href="javascript:;" data-fancybox="lightbox-gallery--07-1" data-src="/img/presentacion/biblioteca.jpg" data-caption="Centro de IES La Isleta" data-animate-in="bounceInDown" data-animate-out="bounceOutDown" data-speed="1000" data-overlay-blur-bg="true">
                                <img height="400" class="img-fluid u-shadow-v1-5 rounded " src="/img/presentacion/biblioteca.jpg" alt="IES La Isleta Centro">
                                <span class="u-block-hover__additional--fade g-bg-black-opacity-0_8 g-color-white">
                                    <i class="icon-magnifier g-absolute-centered g-font-size-25"></i>
                                </span>
                            </a>
                        </div>
                        <div class="js-slide">
                            <a class="js-fancybox d-block u-block-hover rounded" href="javascript:;" data-fancybox="lightbox-gallery--07-1" data-src="/img/presentacion/huerto.jpg" data-caption="Centro de IES La Isleta" data-animate-in="bounceInDown" data-animate-out="bounceOutDown" data-speed="1000" data-overlay-blur-bg="true">
                                <img height="400" class="img-fluid u-shadow-v1-5 rounded " src="/img/presentacion/huerto.jpg" alt="IES La Isleta Centro">
                                <span class="u-block-hover__additional--fade g-bg-black-opacity-0_8 g-color-white">
                                    <i class="icon-magnifier g-absolute-centered g-font-size-25"></i>
                                </span>
                            </a>
                        </div>
                        <div class="js-slide">
                            <a class="js-fancybox d-block u-block-hover rounded" href="javascript:;" data-fancybox="lightbox-gallery--07-1" data-src="/img/presentacion/jardin.jpg" data-caption="Centro de IES La Isleta" data-animate-in="bounceInDown" data-animate-out="bounceOutDown" data-speed="1000" data-overlay-blur-bg="true">
                                <img height="400" class="img-fluid u-shadow-v1-5 rounded " src="/img/presentacion/jardin.jpg" alt="IES La Isleta Centro">
                                <span class="u-block-hover__additional--fade g-bg-black-opacity-0_8 g-color-white">
                                    <i class="icon-magnifier g-absolute-centered g-font-size-25"></i>
                                </span>
                            </a>
                        </div>
                        <div class="js-slide">
                            <a class="js-fancybox d-block u-block-hover rounded" href="javascript:;" data-fancybox="lightbox-gallery--07-1" data-src="/img/presentacion/cancha.jpg" data-caption="Centro de IES La Isleta" data-animate-in="bounceInDown" data-animate-out="bounceOutDown" data-speed="1000" data-overlay-blur-bg="true">
                                <img height="400" class="img-fluid u-shadow-v1-5 rounded " src="/img/presentacion/cancha.jpg" alt="IES La Isleta Centro">
                                <span class="u-block-hover__additional--fade g-bg-black-opacity-0_8 g-color-white">
                                    <i class="icon-magnifier g-absolute-centered g-font-size-25"></i>
                                </span>
                            </a>
                        </div>
                        <div class="js-slide">
                            <a class="js-fancybox d-block u-block-hover rounded" href="javascript:;" data-fancybox="lightbox-gallery--07-1" data-src="/img/presentacion/informatica.jpg" data-caption="Centro de IES La Isleta" data-animate-in="bounceInDown" data-animate-out="bounceOutDown" data-speed="1000" data-overlay-blur-bg="true">
                                <img height="400" class="img-fluid u-shadow-v1-5 rounded " src="/img/presentacion/informatica.jpg" alt="IES La Isleta Centro">
                                <span class="u-block-hover__additional--fade g-bg-black-opacity-0_8 g-color-white">
                                    <i class="icon-magnifier g-absolute-centered g-font-size-25"></i>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')
@endsection
