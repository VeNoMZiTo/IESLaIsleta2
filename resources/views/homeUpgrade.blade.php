@extends('layouts.admin')
@section('content')
    @php
        $hora = new DateTime("now");
        if($hora->format('G')>=7 && $hora->format('G')<=12){
            $hora='Buenos Días';
        }else if($hora->format('G')>12 && $hora->format('G')<=19){
            $hora='Buenas Tardes';
        }else{
            $hora='Buenas Noches';
        }
    @endphp
    <div class="content">
        <div class="row">
            <div class="col-lg-12 text-left">
                <div class="card">
                    <div class="card-header d-flex align-items-center">
                        <h3>{{$hora}}</h3>
                        <h4 class="ml-auto">{{Auth::user()->name}}</h4>
                    </div>

                    <div class="card-body">
                        @switch(count(Auth::user()->roles->where('id','=',1)))
                            @case(1)
                            <div class="row">
                                <div class="col-lg-4 col-6">
                                    <!-- small box -->
                                    <div class="small-box bg-info">
                                        <div class="inner">
                                            <h3>{{count($slider)}}</h3>

                                            <p>Slider</p>
                                        </div>
                                        <div class="icon">
                                            <i class="fa fa-image"></i>
                                        </div>
                                        <a href="/admin/sliders" class="small-box-footer">Más Información <i class="fas fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                                <!-- ./col -->
                                <div class="col-lg-4 col-6">
                                    <!-- small box -->
                                    <div class="small-box bg-success">
                                        <div class="inner">
                                            <h3>{{count($noticias)}}</h3>

                                            <p>Noticias</p>
                                        </div>
                                        <div class="icon">
                                            <i class="fa fa-newspaper"></i>
                                        </div>
                                        <a href="/admin/noticia" class="small-box-footer">Más Información <i class="fas fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                                <!-- ./col -->
                                <div class="col-lg-4 col-6">
                                    <!-- small box -->
                                    <div class="small-box bg-warning">
                                        <div class="inner">
                                            <h3>{{count($actividades)}}</h3>

                                            <p>Actividades</p>
                                        </div>
                                        <div class="icon">
                                            <i class="fa fa-child"></i>
                                        </div>
                                        <a href="/admin/actividades" class="small-box-footer">Más Información <i class="fas fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                                <!-- ./col -->
                            </div>
                            @break
                            @default
                            <div class="row g-mb-20">
                                <div class="col-12">
                                    <h5>Subir archivos</h5>
                                </div>
                            </div>
                            <div class="row g-px-30">
                                <div class="col-sm-6 col-lg-4 g-mb-60">
                                    <div class="text-center step-by-step">
                                        <i class="u-dot-line-v1-2 g-brd-transparent--before g-brd-gray-light-v2--after g-mb-20">
                                            <span class="u-dot-line-v1__inner g-bg-white g-bg-primary--before g-brd-gray-light-v2"></span>
                                        </i>
                                        <h3 class="h5 g-mb-10">Primero crear el grupo</h3>
                                        <p class="mb-0">
                                            Vaya a la zona de "<b>Grupo</b>" y cree en uno.
                                        </p>
                                        <p>
                                            Ej: 1ºA
                                        </p>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-lg-4 g-mb-60">
                                    <div class="text-center step-by-step">
                                        <i class="u-dot-line-v1-2 g-brd-gray-light-v2--before g-brd-gray-light-v2--after g-mb-20">
                                            <span class="u-dot-line-v1__inner g-bg-white g-bg-primary--before g-brd-gray-light-v2"></span>
                                        </i>
                                        <h3 class="h5 g-mb-10">Zona de archivos</h3>
                                        <p class="mb-0 ">Ahora que tenemos el grupo creado, nos dirigimos a "<b>Archivos - Grupos"</b>.</p>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-lg-4 g-mb-60">
                                    <div class="text-center step-by-step">
                                        <i class="u-dot-line-v1-2 g-brd-gray-light-v2--before g-brd-gray-light-v2--after g-mb-20">
                                            <span class="u-dot-line-v1__inner g-bg-white g-bg-primary--before g-brd-gray-light-v2"></span>
                                        </i>
                                        <h3 class="h5 g-mb-10">Subimos archivos</h3>
                                        <p class="mb-0">Ahora agregamos uno o varios archivos a un grupo que hemos creado previamente.</p>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="callout callout-success">
                                        <span class="lnr lnr-question-circle"></span>
                                        <h5>Si quiere modificar los archivos de algún grupo que ya ha subido tiene que pulsar en el <a class="imagenTutorial a-link bold" href="/img/admin/tutorial/lapiz.png">lápiz</a> para editarlo. Una vez ahí, podrá borrar los archivos que quiera o añadir nuevos.</h5>
                                    </div>
                                </div>
                            </div>
                            @break
                        @endswitch
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    @parent
@endsection
