@extends('layouts.app')
@section('content')
    <x-header title="Registrar personas / empresas">
        <li class="breadcrumb-item"><a href="{{ route('peopleentities.index') }}">Personas/Empresas  {{Cookie::get('province_id')}}</a></li>
        <li class="breadcrumb-item active">Crear</li>
    </x-header>

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header p-2">
                      <ul class="nav nav-pills">
                        <li class="nav-item"><a class="nav-link" href="#formulario" data-toggle="tab"> Formulario de usuarios</a></li>
                      </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                      <div class="tab-content">
                        <div class="active tab-pane" id="formulario">
                            <form id="formPeopleEntities" action="{{ route('peopleentities.store') }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <br>
                                        <div class="form-group">
                                            <button class="btn btn-primary" type="submit"><i class="fa fa-plus-square"></i> Registrar</button>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>* Tipo</label>
                                            <select id="type" name="type"class="custom-select">
                                              <option value="1" {{ old('type') == 1 ? 'selected' : '' }}>natural</option>
                                              <option value="2" {{ old('type') == 2 ? 'selected' : '' }}>Juridica</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <hr>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>* Tipo de documento</label>
                                            <select id="type_document" name="type_document"class="custom-select">
                                              <option value="1" {{ old('type_document') == 1 ? 'selected' : '' }}>cedula</option>
                                              <option value="2" {{ old('type_document') == 2 ? 'selected' : '' }}>ruc</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            @if(old('type_document') == 1)
                                            <label id="label_cc_ruc" for="cc_ruc">* Cédula</label>
                                            @elseif(old('type_document') == 2)
                                            <label id="label_cc_ruc" for="cc_ruc">* RUC</label>
                                            @else
                                            <label id="label_cc_ruc" for="cc_ruc">* Cédula</label>
                                            @endif
                                            <input type="number" class="form-control  @error('cc_ruc')is-invalid @enderror" name="cc_ruc" id="cc_ruc" placeholder="" value="{{ old('cc_ruc',$PersonEntityData->cc_ruc) }}" >
                                            @error('cc_ruc')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        @if ($errors->any())
                                            @if(old('name') != null)
                                                <div id="formgroupname" class="form-group">
                                            @else
                                                <div id="formgroupname" class="form-group" style="display: none">
                                            @endif
                                        @else
                                            <div id="formgroupname" class="form-group">
                                        @endif
                                            <label id="labelNombres" for="name">* Nombres</label>
                                            <input type="text" class="form-control @error('name')is-invalid @enderror" name="name" id="name" placeholder="" value="{{ old('name',$PersonEntityData->name) }}" >
                                            @error('name')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        @if ($errors->any())
                                            @if(old('tradename') != null)
                                            <div id="formgrouptradename" class="form-group">
                                            @else
                                                <div id="formgrouptradename" class="form-group" style="display: none">
                                            @endif
                                        @else
                                            <div id="formgrouptradename" class="form-group" style="display: none">
                                        @endif
                                            <label for="tradename">* Nombre Comercial</label>
                                            <input type="text" class="form-control @error('tradename')is-invalid @enderror" name="tradename" id="tradename" placeholder="" value="{{ old('tradename',$PersonEntityData->tradename) }}" >
                                            @error('tradename')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        @if ($errors->any())
                                            @if(old('last_name') != null)
                                                <div id="formgrouplastname" class="form-group">
                                            @else
                                                <div id="formgrouplastname" class="form-group" style="display: none">
                                            @endif
                                        @else
                                            <div id="formgrouplastname" class="form-group">
                                        @endif
                                            <label for="last_name">* Apellido Paterno</label>
                                            <input type="text" class="form-control @error('last_name')is-invalid @enderror" name="last_name" id="last_name" placeholder="" value="{{ old('last_name',$PersonEntityData->last_name) }}" >
                                            @error('last_name')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        @if ($errors->any())
                                            @if(old('bussines_name') != null)
                                            <div id="formgroupbussinesname" class="form-group">
                                            @else
                                            <div id="formgroupbussinesname" class="form-group" style="display: none">
                                            @endif
                                        @else
                                            <div id="formgroupbussinesname" class="form-group" style="display: none">
                                        @endif
                                            <label for="bussines_name">* Razon Social</label>
                                            <input type="text" class="form-control @error('bussines_name')is-invalid @enderror" name="bussines_name" id="bussines_name" placeholder="" value="{{ old('bussines_name',$PersonEntityData->bussines_name) }}" >
                                            @error('bussines_name')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        @if ($errors->any())
                                            @if(old('maternal_last_name') != null)
                                                <div id="formgroupmaternallastname" class="form-group">
                                            @else
                                                <div id="formgroupmaternallastname" class="form-group" style="display: none">
                                            @endif
                                        @else
                                            <div id="formgroupmaternallastname" class="form-group">
                                        @endif
                                            <label for="maternal_last_name">* Apellido Materno</label>
                                            <input type="text" class="form-control @error('maternal_last_name')is-invalid @enderror" name="maternal_last_name" id="maternal_last_name" placeholder="" value="{{ old('maternal_last_name',$PersonEntityData->maternal_last_name) }}" >
                                            @error('maternal_last_name')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Dirección</label>
                                            <textarea name="address" id="address" class="form-control" rows="3" placeholder="Enter ...">{{ old('address',$PersonEntityData->address) }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label id="label_date_birth">*Fecha de nacimiento:</label>

                                            <div class="input-group">
                                              <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                              </div>
                                              <input type="text" class="form-control" id="date_birth" name="date_birth" value="" />
                                            </div>
                                            <!-- /.input group -->
                                        </div>
                                        <div class="form-group">
                                            <label for="email">*Correo Electronico</label>
                                            <input type="email" class="form-control @error('email')is-invalid @enderror" name="email" id="email" placeholder="" value="{{ old('email',$PersonEntityData->email) }}" >
                                            @error('email')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>*Estado</label>
                                            <select id="status" name="status" class="custom-select @error('status') is-invalid @enderror" >
                                                <option value="">Seleccione estado</option>
                                                <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>Activo</option>
                                                <option value="2" {{ old('status') == 2 ? 'selected' : '' }}>Inactivo</option>
                                            </select>
                                            @error('status')
                                                <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="number_phone1">*Telefono</label>
                                            <input type="text" class="form-control @error('number_phone1')is-invalid @enderror" name="number_phone1" id="number_phone1" placeholder="" value="{{ old('number_phone1',$PersonEntityData->number_phone1) }}" >
                                            @error('number_phone1')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <br>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="is_required_accounts" id="is_required_accounts">
                                                <label class="form-check-label">Obligado a llevar contabilidad</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="has_disability" id="has_disability">
                                                    <label class="form-check-label">Discapacidad</label>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </form>
                        </div>
                      </div>
                      <!-- /.tab-content -->
                    </div><!-- /.card-body -->
                    <div id="loading" class="overlay dark" style="display: none">
                        <i class="fas fa-2x fa-sync-alt fa-spin"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
@endsection
@push('scripts')
    <script>
    var selectType = document.getElementById('type');
    var selectTypeDocument = document.getElementById('type_document');
    var formgroupname = document.getElementById('formgroupname');
    var formgrouptradename = document.getElementById('formgrouptradename');
    var formgrouplastname = document.getElementById('formgrouplastname');
    var formgroupbussinesname = document.getElementById('formgroupbussinesname');
    var formgroupmaternallastname = document.getElementById('formgroupmaternallastname');
    var loading = document.getElementById('loading');
    let token = "{{csrf_token()}}";

    selectTypeDocument.addEventListener('change', function() {
        var selectedOption = this.options[selectTypeDocument.selectedIndex];
        loading.style.display = '';
        if(selectedOption.value == 2){
            document.getElementById('label_cc_ruc').innerHTML = "*RUC";
        }else{
            document.getElementById('label_cc_ruc').innerHTML = "*Cédula";
        }
        loading.style.display = 'none';
    });

    selectType.addEventListener('change', function() {
        var selectedOption = this.options[selectType.selectedIndex];
        //console.log(selectedOption.value + ': ' + selectedOption.text);
        loading.style.display = '';
        //limpiar campos
        document.getElementById('name').value = "";
        document.getElementById('last_name').value = "";
        document.getElementById('maternal_last_name').value = "";
        document.getElementById('bussines_name').value = "";
        document.getElementById('tradename').value = "";

        if(selectedOption.value == 1){
            formgrouptradename.style.display = 'none';
            formgroupname.style.display = '';

            formgrouplastname.style.display = '';
            formgroupbussinesname.style.display = 'none';

            formgroupmaternallastname.style.display = '';
            document.getElementById('label_date_birth').innerHTML = "*Fecha de nacimiento";

        }else if(selectedOption.value == 2){
            formgrouptradename.style.display = '';
            formgroupname.style.display = 'none';
            formgrouplastname.style.display = 'none';
            formgroupbussinesname.style.display = '';
            formgroupmaternallastname.style.display = 'none';
            document.getElementById('label_date_birth').innerHTML = "*Fecha de inicio de actividades";
        }
        loading.style.display = 'none';
    });

    //jquery
    $(function () {
        var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });
        $("#formPeopleEntities").keypress(function(event) {
            if (event.keyCode === 13) {
            }
        });
        $('#formPeopleEntities').validate({
            rules: {
                cc_ruc: {
                    required: true,
                    number: true,
                    minlength: function(element) {
                        if($("#type_document").val() == 1){
                            return 10;
                        }else{
                            return 13;
                        }

                    },
                    maxlength: function(element) {
                        if($("#type_document").val() == 1){
                            return 10;
                        }else{
                            return 13;
                        }
                    },
                },
                name: {
                    required: function(element) {
                        return $("#type").val() == 1;
                    },
                    minlength: 2,
                    maxlength: 150
                },
                tradename: {
                    required: function(element) {
                        return $("#type").val() == 2;
                    },
                    minlength: 2,
                    maxlength: 150
                },
                last_name: {
                    required: function(element) {
                        return $("#type").val() == 1;
                    },
                    minlength: 2,
                    maxlength: 150
                },
                bussines_name: {
                    required: function(element) {
                        return $("#type").val() == 2;
                    },
                    minlength: 2,
                    maxlength: 150
                },
                maternal_last_name: {
                    required: function(element) {
                        return $("#type").val() == 1;
                    },
                    minlength: 2,
                    maxlength: 150
                },
                date_birth: {
                    required: true,
                    dateISO: true
                },
                email: {
                    required: true,
                    //email: true
                },
                status: {
                    required: true,
                },
                number_phone1: {
                    required: true,
                    number: true,
                    minlength: 7,
                    maxlength: 10
                },
            },
            messages: {
                cc_ruc: {
                    required: "El campo nombre es requerido.",
                    minlength: jQuery.validator.format("¡Se requieren al menos {0} caracteres!"),
                    maxlength: jQuery.validator.format("Por favor ingrese no más de {0} caracteres"),
                },
                name: {
                    required: "El campo nombre es requerido.",
                    minlength: jQuery.validator.format("¡Se requieren al menos {0} caracteres!"),
                    maxlength: jQuery.validator.format("Por favor ingrese no más de {0} caracteres"),
                },
                last_name: {
                    required: "El campo Apellido Paterno es requerido.",
                    minlength: jQuery.validator.format("¡Se requieren al menos {0} caracteres!"),
                    maxlength: jQuery.validator.format("Por favor ingrese no más de {0} caracteres"),
                },
                maternal_last_name: {
                    required: "El campo Apellido Paterno es requerido.",
                    minlength: jQuery.validator.format("¡Se requieren al menos {0} caracteres!"),
                    maxlength: jQuery.validator.format("Por favor ingrese no más de {0} caracteres"),
                },
                tradename: {
                    required: "El campo Nombre comercial es requerido.",
                    minlength: jQuery.validator.format("¡Se requieren al menos {0} caracteres!"),
                    maxlength: jQuery.validator.format("Por favor ingrese no más de {0} caracteres"),
                },
                bussines_name: {
                    required: "El campo razon social es requerido.",
                    minlength: jQuery.validator.format("¡Se requieren al menos {0} caracteres!"),
                    maxlength: jQuery.validator.format("Por favor ingrese no más de {0} caracteres"),
                },
                date_birth: {
                    required: "El campo nombre es requerido.",
                    dateISO: "El campo Fecha de nacimiento no es una fecha válida."
                },
                email: {
                    required: "El campo correo electronico es requerido.",
                    email: "El formato del correo electronico es inválido.",
                },
                status: {
                    required: "El campo estado es requerido.",
                },
                number_phone1: {
                    required: "El campo telefono es requerido.",
                    number: "El campo debe ser un numero.",
                    minlength: jQuery.validator.format("¡Se requieren al menos {0} caracteres!"),
                    maxlength: jQuery.validator.format("Por favor ingrese no más de {0} caracteres"),
                }
            },
            errorElement: 'span',
            errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
            },
            highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
            }
        });
        @if (session('status'))
            toastr.success('{{session('status')}}');
        @endisset
        $('input[name="date_birth"]').daterangepicker({
            locale: {
                format: "YYYY/MM/DD",
            },
            singleDatePicker: true,
            showDropdowns: true,
            minYear: 1901,
            maxYear: parseInt(moment().format('YYYY'),10)
        });
    });
    </script>
@endpush


