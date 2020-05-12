@extends('master')
@section('title','Cita previa de tarde')
@section('css')
    <link rel="stylesheet" href="/vendor/chosen/chosen.css">
    <link rel="stylesheet" href="/vendor/jquery-ui/themes/base/jquery-ui.min.css">
@endsection
@section('content')
    <section class="container">
        <div class="g-py-100">
            <div class="row justify-content-center g-mb-70">
                <div class="col-lg-7">
                    <div class="text-center">
                        <h2 class="h1 g-color-black mb-4">Cita previa de tarde</h2>
                        <div class="d-inline-block g-width-70 g-height-2 g-bg-black mb-4 g-bg-primary"></div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <form class="g-mb-20">
                        <div class="row">
                            <div class="col-md-4">
                                <label class="g-color-gray-dark-v2 g-font-size-13">Curso</label>
                                <select class="js-custom-select selectCita" data-placeholder="Seleccione un curso" data-open-icon="fa fa-angle-down" data-close-icon="fa fa-angle-up">
                                    <option></option>
                                    <option value="">1º ESO</option>
                                    <option value="">2º ESO</option>
                                    <option value="">3º ESO</option>
                                    <option value="">4º ESO</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for='nombre' class="g-color-gray-dark-v2 g-font-size-13">Grupo</label>
                                <select class="js-custom-select selectCita" data-placeholder="Seleccione un grupo" data-open-icon="fa fa-angle-down" data-close-icon="fa fa-angle-up">
                                    <option></option>
                                    <option value="">A</option>
                                    <option value="">B</option>
                                    <option value="">C</option>
                                    <option value="">D</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for='nombre' class="g-color-gray-dark-v2 g-font-size-13">Asignatura</label>
                                <select class="js-custom-select selectCita" data-placeholder="Seleccione una asignatura" data-open-icon="fa fa-angle-down" data-close-icon="fa fa-angle-up">
                                    <option></option>
                                    <option value="">Alemán</option>
                                    <option value="">Francés</option>
                                    <option value="">Matemáticas</option>
                                    <option value="">Economía</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group g-mb-50">
                                    <label class="g-mb-10">Seleccione un día</label>
                                    <div id="datepickerInline" class="u-datepicker-v1 g-brd-gray-light-v2"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group g-mb-50">
                                    <label class="g-mb-10">Seleccione una hora</label>
                                    <div class="row">
                                        <div class="horas">
                                            <span>
                                                16:30
                                            </span>
                                        </div>
                                        <div class="horas">
                                            <span>
                                                16:45
                                            </span>
                                        </div>
                                        <div class="horas">
                                            <span>
                                                17:00
                                            </span>
                                        </div>
                                        <div class="horas">
                                            <span>
                                                17:15
                                            </span>
                                        </div>
                                        <div class="horas">
                                            <span>
                                                17:30
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 form-group g-mb-20">
                                <label for='nombreAlumno' class="g-color-gray-dark-v2 g-font-size-13">Nombre del alumno</label>
                                <input id='nombreAlumno' name="nombrealumno" class="form-control g-color-black u-shadow-v1-3 g-bg-white g-bg-white--focus g-brd-gray-light-v3 g-brd-primary--hover g-brd-primary--focus rounded-3 g-py-13 g-px-15" type="text" placeholder="">
                                <small id="e_name" class="errores"><strong>* </strong>Nombre del alumno no válido</small>
                            </div>
                            <div class="col-md-6 form-group g-mb-20">
                                <label for='nombreInteresado' class="g-color-gray-dark-v2 g-font-size-13">Nombre del interesado</label>
                                <input id='nombreInteresado' name="nombreinteresado" class="form-control g-color-black u-shadow-v1-3 g-bg-white g-bg-white--focus g-brd-gray-light-v3 g-brd-primary--hover g-brd-primary--focus rounded-3 g-py-13 g-px-15" type="text" placeholder="">
                                <small id="e_surname" class="errores"><strong>* </strong>Nombre del interesado no válido</small>
                            </div>

                            <div class="col-md-6 form-group g-mb-20">
                                <label for='email' class="g-color-gray-dark-v2 g-font-size-13">Dirección de correo</label>
                                <input id='email' name="email" class="form-control g-color-black u-shadow-v1-3 g-bg-white g-bg-white--focus g-brd-gray-light-v3 g-brd-primary--hover g-brd-primary--focus rounded-3 g-py-13 g-px-15" type="email" placeholder="">
                                <small id="e_email" class="errores"><strong>* </strong>Dirección de correo no válido</small>
                            </div>

                            <div class="col-md-6 form-group g-mb-20">
                                <label for='telefono' class="g-color-gray-dark-v2 g-font-size-13">Teléfono</label>
                                <input id='telefono' name="telefono" class="form-control g-color-black u-shadow-v1-3 g-bg-white g-bg-white--focus g-brd-gray-light-v3 g-brd-primary--hover g-brd-primary--focus rounded-3 g-py-13 g-px-15" type="tel" placeholder="">
                                <small id="e_phone" class="errores"><strong>* </strong>Introduzca un número de teléfono</small>
                            </div>
                            <div class="col-md-12 form-group g-mb-20">
                                <label for='informacionAdicional' class="g-color-gray-dark-v2 g-font-size-13">Información adicional</label>
                                <textarea id='informacionAdicional' name="informacionadicional" class="form-control g-color-black u-shadow-v1-3 g-bg-white g-bg-white--focus g-brd-gray-light-v3 g-brd-primary--hover g-brd-primary--focus g-resize-none rounded-3 g-py-13 g-px-15" rows="7" placeholder=". . ."></textarea>
                            </div>
                            <div class="col-md-12 form-group g-mb-40">
                                <label id='box-lopd' class="form-check-inline u-check g-pl-25">
                                    <input id='lopd' class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" type="checkbox" >
                                    <div class="u-check-icon-checkbox-v4 g-absolute-centered--y g-left-0">
                                        <i class="fa" data-check-icon=""></i>
                                    </div>
                                    He leído y acepto la política de privacidad.<br>
                                </label>
                                <br>
                                <small id="e_lopd" class="errores"><strong>* </strong>Tiene que aceptar la política de privacidad.</small>
                            </div>
                        </div>
                        <div class="text-center">
                            <a id='contactSubmit' class="btn u-btn-primary g-font-weight-600 g-font-size-13 text-uppercase g-rounded-25 g-py-15 g-px-30" href="javascript: void(0)">Enviar</a>
                        </div>

                    </form>
                    <div class="acierto alert alert-dismissible fade show g-bg-teal g-color-white rounded-0" role="alert" style="display:none;" >
                        <button type="button" class="close u-alert-close--light h-100" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <div class="media">
                            <span class="d-flex g-mr-10 ">
                              <i class="icon-check g-font-size-25"></i>
                            </span>
                            <span class="media-body align-self-center">
                                <strong>Gracias </strong>. Hemos recibido su mensaje y en breve nos pondremos en contacto con usted.
                            </span>
                        </div>
                    </div>
                    <div class="error alert alert-dismissible fade show g-bg-red g-color-white rounded-0 g-py-20" role="alert" style="display: none">
                        <button type="button" class="close u-alert-close--light h-100" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <div class="media">
                            <span class="d-flex g-mr-10 g-mt-5">
                              <i class="icon-ban g-font-size-25"></i>
                            </span>
                            <span class="media-body align-self-center">
                                <strong>Lo siento</strong>. Parece que tenemos problemas con el servidor de correo. Prueba más tarde.
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')
    <script src="/vendor/chosen/chosen.jquery.js"></script>
    <script src="/js/components/hs.select.js"></script>
    <script src="/vendor/jquery-ui/ui/widget.js"></script>
    <script src="/vendor/jquery-ui/ui/version.js"></script>
    <script src="/vendor/jquery-ui/ui/keycode.js"></script>
    <script src="/vendor/jquery-ui/ui/position.js"></script>
    <script src="/vendor/jquery-ui/ui/unique-id.js"></script>
    <script src="/vendor/jquery-ui/ui/safe-active-element.js"></script>
    <script src="/vendor/jquery-ui/ui/widgets/menu.js"></script>
    <script src="/vendor/jquery-ui/ui/widgets/mouse.js"></script>
    <script src="/vendor/jquery-ui/ui/widgets/datepicker.js"></script>
    <script src="/js/components/hs.datepicker.js"></script>
    <script>
        $(document).ready(function () {
            $.HSCore.components.HSSelect.init('.js-custom-select');
            $.HSCore.components.HSDatepicker.init('#datepickerInline');
            $('#datepickerInline').datepicker({
                firstDay: 1
            });
            // Variables del form
            var vname = new RegExp(/^([a-zñáéíóú]+[\s]*)+$/);
            var vcaract = new RegExp(/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/);
            var vnumberform = new RegExp(/^[9|8|7|6]{1}([\d]{2}[-]*){3}[\d]{2}$/);
            var ferror =['#e_name','#e_surname','#e_email','#e_phone','#e_message','#e_lopd'];
            var nombre, apellidos, email, mensaje, telefono;
            var tipo='';
            console.log(tipo);
            function valoresform(){
                nombre = $('#nombre').val().toLowerCase().trim();
                apellidos = $('#apellidos').val().toLowerCase().trim();
                email = $('#email').val().trim();
                mensaje = $('#mensaje').val().trim();
                telefono = $('#telefono').val().trim();
            }
            // Validador
            function validar(estado) {
                if(estado=="#e_email"){
                    if(vcaract.test(email)){
                        return true;
                    }
                }else if(estado=="#e_message"){
                    if(mensaje.length > 5){
                        return true;
                    }
                }else if(estado=="#e_phone"){
                    if(vnumberform.test(telefono)){
                        return true;
                    }
                }else if(estado=='#e_name'){
                    if(vname.test(nombre) && nombre.length > 2){
                        return true;
                    }
                }else if(estado=='#e_surname'){
                    if(vname.test(apellidos) && apellidos.length > 2){
                        return true;
                    }
                }else if(estado=='#e_lopd'){
                    if($('#lopd ').is(':checked')) {
                        return true;
                    }
                }
            }
            //Enviar mensaje

            //Comprobador KEYDOWN
            $('#lopd').click(function(){
                if($(this).is(':checked')) {
                    $('#e_lopd').hide();
                }
            });
            $('#f-contact input, #f-contact textarea').keyup(function(e){
                valoresform();
                switch (e.target.id) {
                    case 'nombre':
                        if(validar('#e_name')) {
                            $('#e_name').hide();
                        }
                        break;
                    case 'apellidos':
                        if(validar('#e_surname')) {
                            $('#e_surname').hide();
                        }
                        break;
                    case 'email':
                        if(validar('#e_email')) {
                            $('#e_email').hide();
                        }
                        break;
                    case 'telefono':
                        if(validar('#e_phone')) {
                            $('#e_phone').hide();
                        }
                        break;
                    case 'mensaje':
                        if(validar('#e_message')) {
                            $('#e_message').hide();
                        }
                        break;
                    case 'lopd':
                        if(validar('#e_lopd')) {
                            $('#e_lopd').hide();
                        }
                        break;
                }
            });
            $('#contactSubmit').on('click',function(){
                valoresform();
                if(validar('#e_name') && validar('#e_surname') && validar('#e_email') && validar('#e_message') && validar('#e_phone') && validar('#e_lopd')){
                    $('.errores').hide();
                    $.ajax({
                        type: 'POST',
                        url: '/mail/send-contact',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            nombre:nombre,
                            apellidos:apellidos,
                            email: email,
                            telefono:telefono,
                            mensaje: mensaje,
                            tipo:tipo
                        },
                        success: function(data){
                            if(data == 'OK'){
                                $('.acierto').toggle();
                            }else{
                                $('.error').toggle()
                            }
                        }
                    });
                }else {
                    for(var x = 0; x < ferror.length; x++) {
                        if (!validar(ferror[x])) {
                            $(ferror[x]).show();
                        } else {
                            $(ferror[x]).hide();
                        }
                    }
                }
            });
        });
    </script>
@endsection
