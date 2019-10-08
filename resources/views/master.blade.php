<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Title -->
    <title>IES La Isleta @yield('title')</title>

    <!-- Required Meta Tags Always Come First -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- Favicon -->
    <link rel="shortcut icon" href="img/newlogos/png/icon.png" sizes="16x16">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <!-- CSS Global Compulsory -->
    <link rel="stylesheet" href="vendor/bootstrap/bootstrap.min.css">
    <!-- CSS Global Icons -->
    <link rel="stylesheet" href="vendor/icon-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendor/icon-line/css/simple-line-icons.css">
    <link rel="stylesheet" href="vendor/icon-etlinefont/style.css">
    <link rel="stylesheet" href="vendor/icon-line-pro/style.css">
    <link rel="stylesheet" href="vendor/icon-hs/style.css">
    <link rel="stylesheet" href="vendor/animate.css">
    <link rel="stylesheet" href="vendor/dzsparallaxer/dzsparallaxer.css">
    <link rel="stylesheet" href="vendor/dzsparallaxer/dzsscroller/scroller.css">
    <link rel="stylesheet" href="vendor/dzsparallaxer/advancedscroller/plugin.css">
    <link rel="stylesheet" href="vendor/slick-carousel/slick/slick.css">
    <link rel="stylesheet" href="vendor/fancybox/jquery.fancybox.css">
    <link rel="stylesheet" href="vendor/hs-bg-video/hs-bg-video.css">
    <link rel="stylesheet" href="vendor/hs-megamenu/src/hs.megamenu.css">
    <link rel="stylesheet" href="vendor/hamburgers/hamburgers.min.css">
    <link rel="stylesheet" href="vendor/custombox/custombox.min.css">
    <!-- CSS Unify -->
    <link rel="stylesheet" href="css/unify-core.css">
    <link rel="stylesheet" href="css/unify-components.css">
    <link rel="stylesheet" href="css/unify-globals.css">
    <link rel="stylesheet" href="css/spectrum.css">
    <!-- CSS Customization -->
    <link rel="stylesheet" href="css/custom-2.css">
    <link rel="stylesheet" href="css/customperf.css">
    @section('css')
    @show
    <style>

    </style>
</head>

<body style="background:#f4f4f4">
<div id='box-slider'>
{{--    <div id='slider-color'>--}}
{{--        <div class="handle g-font-size-16">--}}
{{--            Color<span class="fa fa-tint ml-3"></span>--}}
{{--        </div>--}}
{{--        <h5 id="sc-title" class="text-center g-font-weight-600 my-0">¡Combina cuanto quieras!</h5>--}}
{{--        <div class="container">--}}
{{--            <div class="row" style="height: 100px;">--}}
{{--                <div class="col-12 px-0 g-color-black text-center g-font-size-18 d-flex align-items-center justify-content-center ">--}}
{{--                    Menú y Pie de página--}}
{{--                </div>--}}
{{--                <div class="col-12 px-0" style="border-bottom:1px solid rgba(0,0,0,0.8); border-top:1px solid rgba(0,0,0,0.8);">--}}
{{--                    <input type='text' id="custom" />--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
</div>
<main id='mainpage' class="bg-white" >
    <header id="js-header" class="u-header u-header--sticky-top u-header--toggle-section u-header--change-appearance"
            data-header-fix-moment="100"
            data-header-fix-effect="slide">
        <div id="topnavbarfirst" class="u-header__section u-header__section--hidden u-header__section--dark" >
            <div class="container">
                <div class="row  align-items-center justify-content-md-end text-uppercase g-color-white g-font-size-13 " style="height: 50px">
                    <div class="col-sm-4  col-md-3 g-hidden-xs-down g-brd-right--sm g-brd-gray-light-v4 topnavbarbox h-100" >
                        <a id="anews" href="#news" class="d-flex align-items-center justify-content-center h-100 w-100">
                        <span class="fa fa-newspaper-o mt-1 g-font-size-18 g-mr-5"></span>
                            <div class="text-right text-sm-left g-pa-10--lg">
                                <strong><span class="text-uppercase g-font-size-12">Ultimas noticias</span></strong>
                            </div>
                            <span class="circle"></span>
                        </a>
                    </div>
                    <div class="col-md-3 g-hidden-sm-down g-brd-right--md g-brd-gray-light-v4 topnavbarbox h-100" >
                        <a href='/consultas' class="d-flex align-items-center justify-content-center h-100 w-100">
                            <span class="icon fa fa-wpforms g-valign-middle g-font-size-18 g-mr-5"></span>
                            <div class="text-right text-sm-left g-pa-10--lg">
                                <strong><span class="text-uppercase g-font-size-12">Buzón de Sugerencias</span></strong>
                            </div>
                            <span class="circle"></span>
                        </a>
                    </div>
                    <div class="col-6 col-sm-4 col-md-3 g-brd-gray-light-v4 topnavbarbox h-100">
                        <a id="acontact" href="#iniciocontact" class="d-flex align-items-center justify-content-center h-100 w-100">
                            <span class="fa fa-address-book g-valign-middle g-font-size-18 g-mr-5"></span>
                            <div class="g-pa-10--lg">
                                <strong><span class="text-uppercase g-font-size-12">Contacto</span></strong>
                            </div>
                            <span class="circle"></span>
                        </a>
                    </div>
                    <div class="col-6 col-sm-4 col-md-3  col-xl-2 g-px-15">
                        <ul class="list-inline mb-0 g-pa-5--lg">
                            <li class="list-inline-item g-valign-middle g-mx-3">
                                <a class="d-block u-icon-v3 u-icon-size--sm g-color-gray-dark-v1 g-rounded-3 g-bg-facebook--hover g-color-white--hover  g-opacity-1--hover u-icon-sliding--hover " href="#" ><i class="fa fa-facebook g-font-size-default"></i></a>
                            </li>
                            <li class="list-inline-item g-valign-middle g-mx-3">
                                <a class="d-block u-icon-v3 u-icon-size--sm   g-color-gray-dark-v1 g-rounded-3 g-bg-twitter--hover g-color-white--hover g-opacity-1--hover u-icon-sliding--hover " href="#"><i class="fa fa-twitter g-font-size-default"></i></a>
                            </li>
                            <li class="list-inline-item g-valign-middle g-mx-3">
                                <a class="d-block u-icon-v3 u-icon-size--sm  g-color-gray-dark-v1 g-rounded-3 g-bg-instagram--hover-2 g-color-white--hover  g-opacity-1--hover u-icon-sliding--hover " href="#" ><i class="fa fa-instagram g-font-size-default"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div id='navbar-responsive' class="container-fluid bg-white">
            <div class="row h-100">
                <div id='zona-logos' class="col-12 col-lg-3 text-center pr-0">
                    <!-- Logo -->
                    <span id="logosnavbar"  class="navbar-brand w-100 "
                          data-type="static">
                            <a id='box-logotop' href='/' class=""><img id="logotop" src="img/newlogos/png/Asset%202.png"  class="img-fluid d-block" alt="Logo" ></a>
                            <a href='https://www.gobiernodecanarias.org/educacion/web/' target="_blank"><img id="logotop2" src="img/logoinst/gobcanarias.jpg" class="img-fluid"   alt="Logo" ></a>
                    </span>
                    <!-- End Logo -->
                </div>
                <div id='zona-contenido' class="col-12 col-lg-9 px-0 ">
                    <div id='box-topnarvbarbox' class="row mx-0 u-header__section u-header__section--hidden u-header__section--dark" >
                        <div class="col-4 col-3-1500 offset-1-1500 g-brd-right g-brd-gray-light-v2 topnavbarbox">
                            <a href="https://www.gobiernodecanarias.net/educacion/loginportal/" class="topnavbarbox h-100 w-100" target="_blank">
                                <img class="u-icon-sliding--hover" src="img/logoinst/intranet.JPG" width="40" height="40">
                                <div class="g-pa-10--lg g-hidden-sm-down">
                                    <strong><span class="text-uppercase g-font-size-16">Portal Docente</span></strong>
                                </div>
                            </a>
                        </div>
                        <div class="col-4 col-3-1500 g-brd-right g-brd-gray-light-v2 topnavbarbox">
                            <a href="https://www.gobiernodecanarias.org/educacion/9/PEKWEB/Ekade/Account/LogOn?ReturnUrl=%2Feducacion%2FPEKWEB%2FEkade%2F" class="topnavbarbox h-100 w-100" target="_blank">
                                <img class="u-icon-sliding--hover" src="img/logoinst/pincelekade.png" width="40" height="40">
                                <div class="g-pa-10--lg g-hidden-sm-down">
                                    <strong><span class="text-uppercase g-font-size-16">Pincel Ekade</span></strong>
                                </div>
                            </a>
                        </div>
                        <div class="col-4 col-3-1500 topnavbarbox ">
                            <a href="https://www3.gobiernodecanarias.org/medusa/evagd/laspalmas/login/index.php" class="topnavbarbox h-100 w-100" target="_blank">
                                <img src="img/logoinst/EVAGD.png" width="50" height="50" >
                                <div class="g-pa-10--lg g-hidden-sm-down">
                                    <strong><span class="text-uppercase g-font-size-16">Moodle</span></strong>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="row mx-0" style="height: 50%">
                        <div class="col-12 px-0">
                            <div class="u-header__section u-header__section--light g-bg-isleta g-transition-0_4 u-shadow-v1-5 h-100-992 w-100" data-header-fix-moment-exclude="" data-header-fix-moment-classes=" u-shadow-v18 g-py-0">
                                <nav class="js-mega-menu navbar navbar-expand-lg h-100-992" >
                                    <div id='box-navBar' class="container h-100-992">
                                        <!-- Responsive Toggle Button -->
                                        <button class="navbar-toggler navbar-toggler-right btn g-line-height-1 g-brd-none g-pa-0 ml-auto" type="button" aria-label="Toggle navigation" aria-expanded="false" aria-controls="navBar" data-toggle="collapse" data-target="#navBar">
                                        <span class="hamburger hamburger--slider">
                                            <span class="hamburger-box">
                                                <span class="hamburger-inner"></span>
                                            </span>
                                        </span>
                                        </button>
                                        <!-- End Responsive Toggle Button -->
                                        <!-- Navigation -->
                                        <div class="overlay"></div>
                                        <div class="collapse navbar-collapse align-items-center flex-sm-row justify-content-center h-100-992" id="navBar">
                                            <ul class="navbar-nav  text-uppercase g-font-weight-600 u-main-nav-v5 u-sub-menu-v1 h-100-992">
                                                <li class="nav-item g-mx-20--lg g-mb-5 g-mb-0--lg">
                                                    <a href="/" class="nav-link g-font-size-15">Inicio

                                                    </a>
                                                </li>
                                                <li class="nav-item hs-has-sub-menu g-mx-20--lg g-mb-5 g-mb-0--lg">
                                                    <a href="#" class="nav-link g-font-size-16--lg g-font-size-15" id="nav-link-1" aria-haspopup="true" aria-expanded="false" aria-controls="nav-submenu-1">El Centro

                                                    </a>
                                                    <!-- Submenu -->
                                                    <ul class="hs-sub-menu list-unstyled " id="nav-submenu-1" aria-labelledby="nav-link-1">
                                                        <li>
                                                            <a href="#">Presentación</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">Equipo directivo</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">Equipo docente</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">Consejo escolar</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">Oferta educativa</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">Calendario escolar</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">Documentos institucionales</a>
                                                        </li>

                                                    </ul>
                                                    <!-- End Submenu -->
                                                </li>
                                                <li class="nav-item g-mx-20--lg g-mb-5 g-mb-0--lg">
                                                    <a href="/profesorado" class="nav-link g-font-size-16--lg g-font-size-15" >Profesorado
                                                    </a>
                                                    <!-- Submenu -->
                                                    <!-- End Submenu -->
                                                </li>
                                                <li class="nav-item hs-has-sub-menu g-mx-20--lg g-mb-5 g-mb-0--lg">
                                                    <a href="#" class="nav-link g-font-size-16--lg g-font-size-15" id="nav-link-1" aria-haspopup="true" aria-expanded="false" aria-controls="nav-submenu-1">Departamentos

                                                    </a>
                                                    <!-- Submenu -->
                                                    <ul class="hs-sub-menu list-unstyled " id="nav-submenu-1" aria-labelledby="nav-link-1">
                                                        <li>
                                                            <a href="#">Administración de Empresas</a>
                                                            <a href="#">Biología y Geología</a>
                                                            <a href="#">Dibujo</a>
                                                            <a href="#">Economía</a>
                                                            <a href="#">Educación Física</a>
                                                            <a href="#">Filosofía</a>
                                                            <a href="#">Física y Química</a>
                                                            <a href="#">Francés</a>
                                                            <a href="#">Geografía e Historia</a>
                                                            <a href="#">Griego</a>
                                                            <a href="#">Inglés</a>
                                                            <a href="#">Lengua Castellana y Literatura</a>
                                                            <a href="#">Matemáticas</a>
                                                            <a href="#">Música</a>
                                                            <a href="#">Orientación</a>
                                                            <a href="#">Religión</a>
                                                            <a href="#">Tecnología</a>
                                                        </li>

                                                    </ul>
                                                    <!-- End Submenu -->
                                                </li>
                                                <li class="nav-item hs-has-sub-menu g-mx-20--lg g-mb-5 g-mb-0--lg">
                                                    <a href="#" class="nav-link g-font-size-16--lg g-font-size-15" id="nav-link-1" aria-haspopup="true" aria-expanded="false" aria-controls="nav-submenu-1">Alumnado

                                                    </a>
                                                    <!-- Submenu -->
                                                    <ul class="hs-sub-menu list-unstyled " id="nav-submenu-1" aria-labelledby="nav-link-1">
                                                        <li>
                                                            <a href="#">Junta de delegados</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">Horario de grupos</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">Redes educativas</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">Proyectos del centro</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">Actividades extraescolares y complementarias</a>
                                                        </li>
                                                        <hr class='mb-2'/>
                                                        <li>
                                                            <div class='row appmovil m-0'>
                                                                <div class='col-12 p-0 text-center g-font-weight-600 g-color-enlacenavbar'>
                                                                    Antiguo Alumando
                                                                </div>
                                                            </div>
                                                            <a href="#" target='_blank' class="a-facebook d-inline-block text-center g-height-60 d-inline-flex align-items-center justify-content-center w-100"><i class="fa fa-facebook-official g-font-size-40 "></i></a>
                                                        </li>
                                                    </ul>
                                                    <!-- End Submenu -->
                                                </li>
                                                <li class="nav-item hs-has-sub-menu g-mx-20--lg g-mb-5 g-mb-0--lg">
                                                    <a href="#" class="nav-link g-font-size-16--lg g-font-size-15" id="nav-link-1" aria-haspopup="true" aria-expanded="false" aria-controls="nav-submenu-1">Familia
                                                    </a>
                                                    <!-- Submenu -->
                                                    <ul class="hs-sub-menu list-unstyled " id="nav-submenu-1" aria-labelledby="nav-link-1">
                                                        <li>
                                                            <a href="#">Tutorías</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">Calendario de visitas</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">Pincel Ekade</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">AMPA</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">Documentos</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">Acceso</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">Cómo crear una cuenta</a>
                                                        </li>
                                                        <hr class='mb-2'/>
                                                        <li>
                                                            <div class='row appmovil m-0'>
                                                                <div class='col-12 p-0 text-center g-font-weight-600 g-color-enlacenavbar'>
                                                                    App Pincel Ekade
                                                                </div>
                                                            </div>
                                                            <a href="https://play.google.com/store/apps/details?id=org.gobiernodecanarias.ceu.appfamilias&hl=es_419" target='_blank' class="a-android d-inline-block text-center g-height-60 d-inline-flex align-items-center justify-content-center"><i class="fa fa-android g-font-size-30 r"></i></a>
                                                            <a href="https://apps.apple.com/es/app/pincel-alumnado-y-familias/id1334684375" target='_blank' class="a-apple d-inline-block text-center g-height-60 d-inline-flex align-items-center justify-content-center"><i class="fa fa-apple g-font-size-30"></i></a>
                                                        </li>

                                                    </ul>
                                                    <!-- End Submenu -->
                                                </li>
                                                <li class="nav-item hs-has-sub-menu g-mx-20--lg g-mb-5 g-mb-0--lg">
                                                    <a href="#" class="nav-link g-font-size-16--lg g-font-size-15" id="nav-link-1" aria-haspopup="true" aria-expanded="false" aria-controls="nav-submenu-1">Secretaría

                                                    </a>
                                                    <!-- Submenu -->
                                                    <ul class="hs-sub-menu list-unstyled " id="nav-submenu-1" aria-labelledby="nav-link-1">
                                                        <li>
                                                            <a href="#">Información</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">Solicitud de certificados</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">Impresos</a>
                                                        </li>

                                                    </ul>
                                                    <!-- End Submenu -->
                                                </li>
                                            </ul>
                                        </div>
                                        <!-- End Navigation -->
                                    </div>
                                </nav>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- End Header -->
@section('slider')
@show
@section('content')
@show


    <div class="u-shadow-v1-5">
            <!-- Footer -->
            <div class="g-bg-isleta g-color-white g-py-40">
                <div class="container footer2">
                    <div class="row">
                        <!-- Footer Content -->
                        <div class="col-lg-3 col-md-6 g-mb-40 g-mb-0--lg text-center">
                            <img src="img/newlogos/png/Asset%201_Negativo.png" alt="Logo">
                        </div>
                        <!-- End Footer Content -->

                        <!-- Footer Content -->
                        <div class="col-lg-3 col-md-6 g-mb-40 g-mb-0--lg">
                            <div class="u-heading-v2-3--bottom g-brd-white-opacity-0_8 g-mb-20">
                                <h2 class="u-heading-v2__title h6 text-uppercase mb-0">Nuestras páginas</h2>
                            </div>

                            <nav class="text-uppercase1">
                                <ul class="list-unstyled g-mt-minus-10 mb-0">
                                    <li class="g-pos-rel g-brd-bottom g-brd-white-opacity-0_1 g-py-10">
                                        <h4 class="h6 g-pr-20 mb-0">
                                            <a class=" g-color-white g-color-white--hover" href="#">Inicio</a>
                                            <i class="fa fa-angle-right g-absolute-centered--y g-right-0"></i>
                                        </h4>
                                    </li>
                                    <li class="g-pos-rel g-brd-bottom g-brd-white-opacity-0_1 g-py-10">
                                        <h4 class="h6 g-pr-20 mb-0">
                                            <a class=" g-color-white g-color-white--hover" href="#">El centro</a>
                                            <i class="fa fa-angle-right g-absolute-centered--y g-right-0"></i>
                                        </h4>
                                    </li>
                                    <li class="g-pos-rel g-brd-bottom g-brd-white-opacity-0_1 g-py-10">
                                        <h4 class="h6 g-pr-20 mb-0">
                                            <a class=" g-color-white g-color-white--hover" href="#">Departamentos</a>
                                            <i class="fa fa-angle-right g-absolute-centered--y g-right-0"></i>
                                        </h4>
                                    </li>
                                    <li class="g-pos-rel g-brd-bottom g-brd-white-opacity-0_1 g-py-10">
                                        <h4 class="h6 g-pr-20 mb-0">
                                            <a class=" g-color-white g-color-white--hover" href="#">Alumnado</a>
                                            <i class="fa fa-angle-right g-absolute-centered--y g-right-0"></i>
                                        </h4>
                                    </li>
                                    <li class="g-pos-rel g-brd-bottom g-brd-white-opacity-0_1 g-py-10">
                                        <h4 class="h6 g-pr-20 mb-0">
                                            <a class=" g-color-white g-color-white--hover" href="#">Familia</a>
                                            <i class="fa fa-angle-right g-absolute-centered--y g-right-0"></i>
                                        </h4>
                                    </li>
                                    <li class="g-pos-rel g-brd-bottom g-brd-white-opacity-0_1 g-py-10">
                                        <h4 class="h6 g-pr-20 mb-0">
                                            <a class=" g-color-white g-color-white--hover" href="#">Secretaria</a>
                                            <i class="fa fa-angle-right g-absolute-centered--y g-right-0"></i>
                                        </h4>
                                    </li>

                                </ul>
                            </nav>
                        </div>
                        <!-- End Footer Content -->

                        <!-- Footer Content -->
                        <div class="col-lg-3 col-md-6 g-mb-40 g-mb-0--lg">
                            <div class="u-heading-v2-3--bottom g-brd-white-opacity-0_8 g-mb-20">
                                <h2 class="u-heading-v2__title h6 text-uppercase mb-0">LOGOTIPO ESTATAL, EUROPEO..</h2>
                            </div>
                            <ul class="u-list-inline d-flex flex-wrap g-mr-minus-15 ">
                                <li class="list-inline-item g-mr-15 g-mb-15">
                                    <a href="#">
                                        <img class="g-width-70 g-height-70" src="" alt="Image Description">
                                    </a>
                                </li>
                                <li class="list-inline-item g-mr-15 g-mb-15">
                                    <a href="#">
                                        <img class="g-width-70 g-height-70" src="" alt="Image Description">
                                    </a>
                                </li>
                                <li class="list-inline-item g-mr-15 g-mb-15">
                                    <a href="#">
                                        <img class="g-width-70 g-height-70" src="" alt="Image Description">
                                    </a>
                                </li>
                                <li class="list-inline-item g-mr-15 g-mb-15">
                                    <a href="#">
                                        <img class="g-width-70 g-height-70" src="" alt="Image Description">
                                    </a>
                                </li>
                                <li class="list-inline-item g-mr-15 g-mb-15">
                                    <a href="#">
                                        <img class="g-width-70 g-height-70" src="" alt="Image Description">
                                    </a>
                                </li>
                                <li class="list-inline-item g-mr-15 g-mb-15">
                                    <a href="#">
                                        <img class="g-width-70 g-height-70" src="" alt="Image Description">
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- End Footer Content -->

                        <!-- Footer Content -->
                        <div class="col-lg-3 col-md-6 footer-contact">
                            <div class="u-heading-v2-3--bottom g-brd-white-opacity-0_8 g-mb-20">
                                <h2 class="u-heading-v2__title h6 text-uppercase mb-0">Contacto</h2>
                            </div>
                            <address class="g-bg-no-repeat g-font-size-12 mb-0">
                                <!-- Location -->
                                <div class="d-flex g-mb-20">
                                    <div class="g-mr-10">
                                  <span class="u-icon-v3 u-icon-size--xs g-bg-white-opacity-0_3 ">
                                    <i class="fa fa-map-marker"></i>
                                  </span>
                                    </div>
                                    <p class="mb-0">Calle Juan Rejón, 58, 35008  <br> Las Palmas de Gran Canaria, Las Palmas</p>
                                </div>
                                <!-- End Location -->

                                <!-- Phone -->
                                <div class="d-flex g-mb-20">
                                    <div class="g-mr-10">
                                  <span class="u-icon-v3 u-icon-size--xs g-bg-white-opacity-0_3">
                                    <i class="fa fa-phone"></i>
                                  </span>
                                    </div>
                                    <p class="mb-0"><a href='tel: 928 468 550'>928 468 550 </a><br> 928 999 999</p>
                                </div>
                                <!-- End Phone -->

                                <!-- Email and Website -->
                                <div class="d-flex g-mb-20">
                                    <div class="g-mr-10">
                                  <span class="u-icon-v3 u-icon-size--xs g-bg-white-opacity-0_3 ">
                                    <i class="fa fa-globe"></i>
                                  </span>
                                    </div>
                                    <p class="mb-0">
                                        <a class="" href="info@ieslaisleta.net">info@ieslaisleta.net</a>
                                        <br>
                                        <a class="" href="#">Segundo correo</a>
                                    </p>
                                </div>
                                <!-- End Email and Website -->
                            </address>
                        </div>
                        <!-- End Footer Content -->
                    </div>
                </div>
            </div>
            <!-- End Footer -->

            <!-- Copyright Footer -->
            <footer class=" g-color-white-opacity-0_8 text-center g-py-20 adr">
                <div class="container">
                    <small class="g-font-size-default g-mr-10 g-mb-10 g-mb-0--md">2019 © All Rights Reserved - <strong><a href="https://adrianrm.com/" target="_blank" style="color:inherit; text-decoration: none !important;">Adrian RM</a></strong>
                    </small>
                </div>
            </footer>
            <!-- End Copyright Footer -->
        </div>

</main>
<div id="noticia-1" class="text-left g-max-width-600 g-bg-white g-overflow-y-auto g-pa-20" style="display: none;">
    <button type="button" class="close" onclick="Custombox.modal.close();">
        <i class="hs-icon hs-icon-close"></i>
    </button>
    <div class="u-heading-v2-6--bottom g-mb-40">
        <h2 class="u-heading-v2__title g-mb-10">Comparte la Noticia</h2>
        <h4 class="g-font-weight-200">Título de la noticia</h4>
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
        <input id='urlnoticia' class="form-control form-control-md rounded-0" type="text" value="https://ies.adrianrm.com/#noticia-1">
        <div class="input-group-append box-copy">
            <span class="input-group-text rounded-0 copy"><i class="fa fa-copy"></i></span>
        </div>
    </div>
</div>
<!-- JS Global Compulsory -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/jquery-migrate/jquery-migrate.min.js"></script>
<script src="vendor/popper.min.js"></script>
<script src="vendor/bootstrap/bootstrap.min.js"></script>


<!-- JS Implementing Plugins -->
<script src="vendor/appear.js"></script>
<script src="vendor/slick-carousel/slick/slick.js"></script>
<script src="vendor/hs-megamenu/src/hs.megamenu.js"></script>
<script src="vendor/dzsparallaxer/dzsparallaxer.js"></script>
<script src="vendor/dzsparallaxer/dzsscroller/scroller.js"></script>
<script src="vendor/dzsparallaxer/advancedscroller/plugin.js"></script>
<script src="vendor/hs-bg-video/hs-bg-video.js"></script>
<script src="vendor/hs-bg-video/vendor/player.min.js"></script>
<script src="vendor/fancybox/jquery.fancybox.js"></script>
<script src="vendor/spectrum/spectrum.js"></script>
<script src="vendor/spectrum/jquery.slidereveal.min.js"></script>
<script src="vendor/custombox/custombox.min.js"></script>

<!-- JS Unify -->
<script src="js/hs.core.js"></script>
<script src="js/components/hs.header.js"></script>
<script src="js/helpers/hs.hamburgers.js"></script>
<script src="js/components/hs.tabs.js"></script>
<script src="js/helpers/hs.height-calc.js"></script>
<script src="js/components/hs.onscroll-animation.js"></script>
<script src="js/helpers/hs.bg-video.js"></script>
<script src="js/components/hs.popup.js"></script>
<script src="js/components/hs.carousel.js"></script>
<script src="js/components/hs.go-to.js"></script>
<script src="js/components/hs.modal-window.js"></script>

<!-- JS Revolution Slider -->
<script src="vendor/revolution-slider/revolution/js/jquery.themepunch.tools.min.js"></script>
<script src="vendor/revolution-slider/revolution/js/jquery.themepunch.revolution.min.js"></script>

<script src="vendor/revolution-slider/revolution/js/extensions/revolution.extension.actions.min.js"></script>
<script src="vendor/revolution-slider/revolution/js/extensions/revolution.extension.carousel.min.js"></script>
<script src="vendor/revolution-slider/revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
<script src="vendor/revolution-slider/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
<script src="vendor/revolution-slider/revolution/js/extensions/revolution.extension.migration.min.js"></script>
<script src="vendor/revolution-slider/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
<script src="vendor/revolution-slider/revolution/js/extensions/revolution.extension.parallax.min.js"></script>
<script src="vendor/revolution-slider/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
<script src="vendor/revolution-slider/revolution/js/extensions/revolution.extension.video.min.js"></script>
<!-- JS Customization -->
<script src="js/custom.js"></script>
<!--Clipboard-->
<script src="js/clipboard.min.js"></script>
@section('js')
@show

<!-- JS Plugins Init. -->

<script>
    /*Clipboard de noticias*/
    var clipboard = new ClipboardJS('.box-copy', {
        target: function() {
            return document.getElementById('urlnoticia');
        }
    });

    /*Responsive del navbar - CSS también*/
    $('#mainpage').css({'padding-top':$('#js-header').height()+'px'});
    $(window).resize( function () {
        $('#mainpage').css({'padding-top':$('#js-header').height()+'px'});
    });

    $(window).scroll(function(){
        if($(window).width()<992 && $(window).scrollTop()>100){
            $('#box-topnarvbarbox').slideUp(500,'linear');
        }else{
            $('#box-topnarvbarbox').slideDown(500,'linear');
        }
    });
    $(document).on('ready', function () {
        $('.navbar-toggler ').click(function(){
            if($(this).attr('aria-expanded')=='false'){
                $('#navBar').addClass('activeshow');
                $('#box-navBar').addClass('activecontainer');
                $('.u-header__section').eq(2).css({'z-index':'10'});
                $('html').addClass('outscroll');
            }else{
                $('#navBar').removeClass('activeshow').hide();
                $('#box-navBar').removeClass('activecontainer');
                $('.u-header__section').eq(2).css({'z-index':'3'});
                $('html').removeClass('outscroll');
            }
        });


    });
</script>
<script>
    $(document).on('ready', function () {
        var sheigth;
        if ($(window).width() < 990) {
            sheigth = 143;
        } else {
            sheigth = 165;
        }
        function scrollnews(){
            $('html, body').animate({
                scrollTop: $("#news").offset().top - sheigth
            }, 1500);
        }
        function scrollcontact(){
            $('html, body').animate({
                scrollTop: $("#iniciocontact").offset().top - sheigth
            }, 1500);
        }
        if ( $("#news").length > 0  ) {
        }else{
            $('#anews').attr({'href':'/noticias'});
        }
        if ( $("#iniciocontact").length > 0 ) {
        }else{
            $('#acontact').attr({'href':'/'});
        }
        $("#anews").click(function () {
            scrollnews();
        });
        $("#acontact").click(function () {
            scrollcontact();
        });
        // initialization of tabs
        $.HSCore.components.HSTabs.init('[role="tablist"]');

        // initialization of header's height equal offset
        $.HSCore.helpers.HSHeightCalc.init();

        // initialization carousel
        $.HSCore.components.HSCarousel.init('.js-carousel');
        $('.js-carousel').slick('setOption', {
            'pauseOnHover':true
        }, true);

        // initialization of scroll animation
        $.HSCore.components.HSOnScrollAnimation.init('[data-animation]');

        // initialization of popups
        $.HSCore.components.HSModalWindow.init('[data-modal-target]');

        // initialization of video on background
        $.HSCore.helpers.HSBgVideo.init('.js-bg-video');

        // initialization of popups with media
        $.HSCore.components.HSPopup.init('.js-fancybox-media', {
            helpers: {
                media: {},
                overlay: {
                    css: {
                        'background': 'rgba(0, 0, 0, .8)'
                    }
                }
            }
        });

        // initialization of go to
        $.HSCore.components.HSGoTo.init('.js-go-to');

    });

    $(window).on('load', function () {
        // initialization of header
        $.HSCore.components.HSHeader.init($('#js-header'));
        $.HSCore.helpers.HSHamburgers.init('.hamburger');

        // initialization of HSMegaMenu component
        $('.js-mega-menu').HSMegaMenu({
            event: 'hover',
            pageContainer: $('.container'),
            breakpoint: 991
        });
    });

    $(window).on('resize', function () {
        setTimeout(function () {
            $.HSCore.components.HSTabs.init('[role="tablist"]');
        }, 200);
    });

    $(document).ready(function () {
        var chooseColor;
        $('#box-slider').delay(500).show(500);
        $('.handle').click(function(){
            console.log($('#slider-color').css('box-shadow'));
            if($('#slider-color').css('box-shadow') =='none'){
                setTimeout(function(){$('#slider-color').css({'box-shadow':'10px 0 15px 10px #585858'});},300);
            }else{
                $('#slider-color').css('box-shadow','none');
            }

        });
        $('#slider-color').slideReveal({
            trigger: $(".handle"),
            push: false,
            position:"right"
        });
        $("#custom").spectrum({
            color: "#499bea",
            preferredFormat: "rgb",
            showInput: true,
            showPalette: true,
            palette: [["red", "rgba(0, 255, 0, .5)", "rgb(0, 0, 255)"]],
            chooseText: "Cambiar",
            cancelText: "Atras",
            showAlpha: true,
            showInitial: true,
            allowEmpty:true,
            appendTo:"#slider-color",
            palette: [
                ["#000","#444","#666","#999","#ccc","#eee","#f3f3f3","#fff"],
                ["#f00","#f90","#ff0","#0f0","#0ff","#00f","#90f","#f0f"],
                ["#f4cccc","#fce5cd","#fff2cc","#d9ead3","#d0e0e3","#cfe2f3","#d9d2e9","#ead1dc"],
                ["#ea9999","#f9cb9c","#ffe599","#b6d7a8","#a2c4c9","#9fc5e8","#b4a7d6","#d5a6bd"],
                ["#e06666","#f6b26b","#ffd966","#93c47d","#76a5af","#6fa8dc","#8e7cc3","#c27ba0"],
                ["#c00","#e69138","#f1c232","#6aa84f","#45818e","#3d85c6","#674ea7","#a64d79"],
                ["#900","#b45f06","#bf9000","#38761d","#134f5c","#0b5394","#351c75","#741b47"],
                ["#600","#783f04","#7f6000","#274e13","#0c343d","#073763","#20124d","#4c1130"]
            ],
            move: function(color) {
                console.log(color.toRgbString());
                $('.g-bg-isleta').css({'background':color.toRgbString()});
                chooseColor= color.toRgbString().replace("rgb", "").replace("a", "").replace("(","").replace(")","");
                chooseColor= chooseColor.split(",");
                if(chooseColor[2]>200){
                    $('.navbar .u-main-nav-v5 .nav-link, .footer2, .footer2 h4 .g-color-white').attr({'style':'color:black !important'});
                }else{
                    $('.navbar .u-main-nav-v5 .nav-link, .footer2, .footer2 h4 .g-color-white').css({'color':'#f5f5f5'});
                }

            }
        });


    });

</script>
</body>

</html>