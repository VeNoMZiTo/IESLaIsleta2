@extends('master')
@section('title','Actividades extraescolares')
@section('css')
@endsection
@section('content')
    <section>
        <div class='container g-py-100'>
            <div class='row text-center g-mb-30'>
                <div class="text-center col-12">
                    <h2 class="h1 g-color-black mb-4">
                        {{$actividades->titulo ?? 'Actividades extraescolares'}}
                    </h2>
                    <div class="d-inline-block g-width-70 g-height-2 g-bg-primary mb-4"></div>
                    <p class="lead g-px-200--lg g-color-gray-dark-v3 mx-auto g-font-size-20">
                        {{$actividades->subtitulo ?? ' '}}
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 g-mb-50 g-mb-0--lg">
                    @if($actividades && $actividades->texto)
                        {!! $actividades->texto !!}
                    @else
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')
@endsection
