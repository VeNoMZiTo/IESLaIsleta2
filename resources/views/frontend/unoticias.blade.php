@extends('master')
@section('css')
@endsection
@section('content')
<section id='zona-noticia' class="container g-py-100 ">
    <div class="row g-mb-40">
        <!-- Carousel Images -->
        <div class="col-md-12 text-center g-mb-30">
            <div class="js-carousel text-center g-pb-30 shadow-img" data-infinite="true" data-arrows-classes="u-arrow-v1 g-absolute-centered--y g-width-35 g-height-40 g-font-size-18 g-color-gray g-bg-white g-mt-minus-10" data-arrow-left-classes="fa fa-angle-left g-left-0" data-arrow-right-classes="fa fa-angle-right g-right-0" style='height: 500px;'>
                <div class="js-slide">
                    <a class="js-fancybox" href="javascript:;" data-fancybox="lightbox-gallery--07-1" data-src="./img/img-temp/1200x800/img1.jpg" data-caption="Lightbox Gallery" data-animate-in="bounceInDown" data-animate-out="bounceOutDown" data-speed="1000" data-overlay-blur-bg="true">
                        <img class="img-fluid g-rounded-6 " src="./img/img-temp/1200x800/img1.jpg" alt="" width="1110" style="height: 500px;">
                    </a>
                </div>

                <div class="js-slide">
                    <a class="js-fancybox" href="javascript:;" data-fancybox="lightbox-gallery--07-1" data-src="./img/img-temp/1200x800/img1.jpg" data-caption="Lightbox Gallery" data-animate-in="bounceInDown" data-animate-out="bounceOutDown" data-speed="1000" data-overlay-blur-bg="true">
                        <img class="img-fluid g-rounded-6" src="./img/img-temp/1200x800/img1.jpg" alt="" width="1110" style="height: 500px;">
                    </a>
                </div>
            </div>
        </div>
        <!-- End Carousel Images -->
        <div class="col-md-8 g-mb-30">
            <div class="mb-5">
                <h2 class="g-color-black mb-1">Título</h2>
                <span class="d-block lead mb-4 ">Subtítulo</span>
                <p class='text-justify'>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem beatae delectus deserunt et, exercitationem itaque nisi officiis quas, quisquam repellat sequi sit tempore temporibus veritatis voluptate? Dolore doloremque esse explicabo nisi omnis. Amet debitis eius nesciunt numquam optio perspiciatis reiciendis.</p>
                <p class='text-justify'>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias, aliquid aperiam asperiores commodi deserunt in optio perspiciatis quibusdam! A ad aliquam architecto at cumque deserunt doloribus eos error ex facere fuga in inventore modi neque, nihil nisi nostrum nulla praesentium quam qui quod ratione recusandae sed sunt suscipit ut voluptatum! Aliquid asperiores dolores in maiores quam repellendus? Distinctio, optio, vitae.</p>
            </div>

        </div>

        <div class="col-md-4 g-mb-30">
            <!-- Client -->
            <div class="mb-5">
                <h3 class="h5 g-color-black mb-3">Fecha</h3>
                <a class="g-color-gray-dark-v4 g-text-underline--none--hover" >
                    01/01/1900
                </a>
            </div>
            <!-- End Client -->

            <!-- Designers -->
            <div class="mb-5">
                <h3 class="h5 g-color-black mb-3">Autor</h3>
                <ul class="list-unstyled">
                    <li class="my-3">
                        <a class="g-color-gray-dark-v4 g-text-underline--none--hover">Autor</a>
                    </li>
                </ul>
            </div>
            <!-- End Designers -->

        </div>
        <div class="u-divider u-divider-center u-divider-linear-gradient u-divider-linear-gradient--gray-light-v3 w-100 mx-auto g-my-40">
            <i class="fa fa-circle u-divider__icon g-bg-white g-color-primary"></i>
        </div>
        <div class="col-12">
            <ul class="d-flex justify-content-center list-inline g-font-size-18 g-py-13 mb-0">
                    <li class="list-inline-item mr-5 mb-1">
                        <a class="btn u-btn-outline-primary g-rounded-25 g-font-size-18" href="#" href="#noticia-1" data-modal-target="#noticia-1" data-modal-effect="slide">
                            <i class="mr-1 icon-share"></i>
                            Compartir
                        </a>
                    </li>
                    <li class="list-inline-item ml-5 mb-1">
                        <a id='myprint' class="btn  u-btn-outline-brown g-rounded-25 g-font-size-18" href="javascript: void(0)">
                            <i class="mr-1 fa fa-print"></i>
                            Imprimir
                        </a>
                    </li>
                </ul>
        </div>
    </div>

</section>
@endsection
@section('js')

<script language="javascript" type="text/javascript">
    $(document).on('click','#myprint',function(){
        printerDiv();
    });
    function printerDiv(divID) {
        var divElements = $('#zona-noticia').html();
        var oldPage = document.body.innerHTML;
        $('main').html("<html><head><title></title></head><body><div class='container'>" + divElements + "</div></body>");
        window.print();
        document.body.innerHTML = oldPage;

    }
</script>
@endsection