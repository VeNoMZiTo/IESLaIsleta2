@extends('master')
@section('title','Redes y Proyectos')
@section('css')
@endsection
@section('content')
    <section>
        <div class='container g-py-100'>
            <div class='row text-center g-mb-30'>
                <div class="text-center col-12">
                    <h2 class="h1 g-color-black mb-4">Redes y proyectos</h2>
                    <div class="d-inline-block g-width-70 g-height-2 g-bg-primary mb-4"></div>
                    <p class="lead g-px-200--lg g-color-gray-dark-v3 mx-auto g-font-size-20">
                        El IES La Isleta ha puesto en marcha las siguientes Redes y Proyectos para el presente curso
                        escolar
                    </p>
                </div>
            </div>
            <div class="row">
                @foreach($redesProyectos as $r)
                <div class="col-md-6 g-mb-50 g-mb-0--lg cuboRedesProyectos">
                    <h3 class="text-center g-font-weight-600 mb-4">{{$r->titulo}}</h3>
                    {!! $r->texto !!}
                </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
@section('js')
@endsection
