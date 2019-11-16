@extends('master')
@section('title','Impresos')
@section('css')
@endsection
@section('content')

    <section>
        <div class='container g-py-100'>
            <div class='row text-center g-mb-30'>
                <div class="text-center col-12">
                    <h2 class="h1 g-color-black mb-4">Impresos</h2>
                    <div class="d-inline-block g-width-70 g-height-2 g-bg-primary mb-4"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 g-mb-50 g-mb-0--lg">
                    <img class="img-fluid u-shadow-v1-5 rounded" src="/img/fotos-centro/biblioteca.jpg" alt="IES La Isleta Centro">
                </div>

                <div class="col-lg-6">
                    <header class="u-heading-v2-3--bottom g-brd-primary g-mb-20">
                        <h2 class="h3 u-heading-v2__title">Descargar Impresos</h2>
                    </header>
                    <p class="lead g-mb-15">
                        Cualquier duda o sugerencia puede contactar con <a href="/consultas">nosotros</a>.
                    </p>
                    <ul class="list-unstyled g-color-gray-dark-v3 g-mb-40 g-font-size-16">
                        @foreach($impreso as $i)
                        <li class="d-flex g-mb-10 align-items-center">
                            <i class="icon-doc g-color-primary d-flex align-items-center g-font-size-18 mr-3"></i>
                            {{$i->nombre}}:
                            <ul class="list-unstyled ml-3">
                                @foreach($i->archivo as $a )
                                @php
                                $nombreArchivo= explode("_",$a->file_name);
                                @endphp
                                <li class="my-2">
                                    <a href="{{$a->getUrl()}}" download>{{$nombreArchivo[1]}}</a>
                                </li>
                                @endforeach
                            </ul>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')
@endsection
