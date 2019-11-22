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
                    <div class="card-header">
                        <h3>{{$hora}}</h3>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-3 col-6">
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
                            <div class="col-lg-3 col-6">
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
                            <div class="col-lg-3 col-6">
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
                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-danger">
                                    <div class="inner">
                                        <h3>{{count($departamentos)}}</h3>

                                        <p>Departamentos</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-server"></i>
                                    </div>
                                    <a href="/admin/departamentos" class="small-box-footer">Más Información <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <!-- ./col -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    @parent

@endsection