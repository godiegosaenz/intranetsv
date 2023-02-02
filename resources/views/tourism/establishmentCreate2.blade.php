@extends('layouts.app')
@section('content')
    <x-header title="Registrar establecimiento turistico">
        <li class="breadcrumb-item"><a href="{{ route('establishments.index') }}">Establecimiento turistico</a></li>
        <li class="breadcrumb-item active">Crear</li>
    </x-header>
    <section class="content">
        <div class="container-fluid">
        <div class="row">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

        </div>
        <!-- row -->
        <div class="row">
            <div class="col-12 col-sm-12">
              <div class="card card-default card-outline card-outline-tabs">
                <div class="card-header p-0 border-bottom-0">
                  <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                    <li class="nav-item">
                        @if(session('tabEstablishment') != null)
                        <a class="nav-link {{ session('tabEstablishment') == 1 ? 'active' : '' }}" id="custom-tabs-step1-tab" data-toggle="pill" href="#custom-tabs-step1" role="tab" aria-controls="custom-tabs-step1" aria-selected="true">Informacion de establecimiento</a>
                        @else
                        <a class="nav-link active" id="custom-tabs-step1-tab" data-toggle="pill" href="#custom-tabs-step1" role="tab" aria-controls="custom-tabs-step1" aria-selected="true">Informacion de establecimiento</a>
                        @endif
                    </li>
                    @if($Establishments->register == '1')
                    <li class="nav-item">
                      <a class="nav-link {{ session('tabEstablishment') == 2 ? 'active' : '' }}" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false">Informacion turistica</a>
                    </li>
                    @endif
                  </ul>
                </div>
                <div class="card-body">
                  <div class="tab-content" id="custom-tabs-four-tabContent">
                    @if(session('tabEstablishment') != null)
                    <div class="tab-pane fade {{ session('tabEstablishment') == 1 ? 'show active' : '' }}" id="custom-tabs-step1" role="tabpanel" aria-labelledby="custom-tabs-step1-tab">
                    @else
                    <div class="tab-pane fade show active" id="custom-tabs-step1" role="tabpanel" aria-labelledby="custom-tabs-step1-tab">
                    @endif
                        <div id="stepper1" class="bs-stepper">
                            <div class="bs-stepper-header" role="tablist">
                              <!-- your steps here -->
                              <div class="step" data-target="#step1-part">
                                <button type="button" class="step-trigger" role="tab" aria-controls="step1-part" id="step1-part-trigger">
                                  <span class="bs-stepper-circle">1</span>
                                  <span class="bs-stepper-label">Natural/Juridica</span>
                                </button>
                              </div>
                              <div class="line"></div>
                              <div class="step" data-target="#step2-part">
                                <button type="button" class="step-trigger" role="tab" aria-controls="step2-part" id="step2-part-trigger">
                                  <span class="bs-stepper-circle">2</span>
                                  <span class="bs-stepper-label">General</span>
                                </button>
                              </div>
                              <div class="line"></div>
                              <div class="step" data-target="#step3-part">
                                <button type="button" class="step-trigger" role="tab" aria-controls="step3-part" id="step3-part-trigger">
                                  <span class="bs-stepper-circle">3</span>
                                  <span class="bs-stepper-label">Ubicacion</span>
                                </button>
                              </div>
                              <div class="line"></div>
                              <div class="step" data-target="#step4-part">
                                <button type="button" class="step-trigger" role="tab" aria-controls="step4-part" id="step4-part-trigger">
                                  <span class="bs-stepper-circle">4</span>
                                  <span class="bs-stepper-label">Personal</span>
                                </button>
                              </div>
                            </div>
                            @if($Establishments->register == 1)
                            <form id="formEstablisment" action="{{ route('establishments.update',$Establishments) }}" method="post">
                                @csrf
                                @method('PUT')
                            @else
                            <form id="formEstablisment" action="{{ route('establishments.store') }}" method="post">
                                @csrf
                            @endif
                                <div class="bs-stepper-content">
                                    <div id="step1-part" class="content" role="tabpanel" aria-labelledby="step1-part-trigger">

                                            @csrf
                                            <div class="row">
                                                <br>
                                                <div class="col-lg-6">
                                                    <h4>Informacion de la Persona natural / Jurídica</h4>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="float-right">
                                                        <div class="form-group">
                                                            <button id="btnSiguiente" class="btn btn-secondary" type="button" onclick="stepnext()"><i class="fa fa-arrow-right"></i> Siguiente </button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <hr>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    @if($Establishments->register == 1)
                                                    <div class="alert alert-info alert-dismissible">
                                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                        <h5><i class="icon fas fa-info"></i> ¡Importante!</h5>
                                                        Ya puedes ingresar la informacion turistica del Establecimiento en la siguiente pestaña.
                                                    </div>
                                                    @else
                                                    <div class="alert alert-info alert-dismissible">
                                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                        <h5><i class="icon fas fa-info"></i> Recuerda!</h5>
                                                        Todos los campos con un asterisco al final. Son campos obligatorios.
                                                    </div>
                                                    @endif
                                                    @if($errors->has('establishment_id_2'))
                                                    <div class="alert alert-danger alert-dismissible">
                                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                        <h5><i class="icon fas fa-ban"></i> ¡Alerta!</h5>
                                                        Revisa que todos los campos obligatorios esten llenos.
                                                    </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <label for="cc_ruc"> Selecciona cedula/Ruc *</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                        <button id="modalempresa" type="button" class="btn btn-primary">Buscar</button>
                                                        </div>
                                                        <!-- /btn-group -->
                                                        <input id="establishment_id" name="establishment_id" type="text" class="form-control @error('establishment_id_2')is-invalid @enderror" value="{{ old('establishment_id',isset($Establishments->people_entities_establishment->cc_ruc) ? $Establishments->people_entities_establishment->cc_ruc : '') }}" disabled>

                                                        @error('establishment_id_2')
                                                        <span class="error invalid-feedback">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <input id="establishment_id_2" name="establishment_id_2" type="hidden" class="form-control" value="{{ old('establishment_id_2',isset($Establishments->establishment_id) ? $Establishments->establishment_id : '') }}">
                                                    <input id="numbermodal" type="hidden" class="form-control" value="1">
                                                </div>
                                                <div class="col-lg-6">

                                                    <div class="form-group">
                                                        <label for="name2">Nombres/Nombre Comercial</label>
                                                        <input type="text" class="form-control" id="name2" name="name2" value="{{ old('name2',isset($Establishments->people_entities_establishment->name) ? $Establishments->people_entities_establishment->name : '') }}" disabled>

                                                    </div>
                                                    <div class="form-group">
                                                        <label for="last_name">Apellido Paterno/Razon Social</label>
                                                        <input type="text" class="form-control" id="last_name" name="last_name" value="{{ old('last_name',isset($Establishments->people_entities_establishment->last_name) ? $Establishments->people_entities_establishment->last_name : '') }}" disabled>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="email2">Correo Electronico</label>
                                                        <input type="text" class="form-control" id="email2" name="email2" value="{{ old('email2',isset($Establishments->people_entities_establishment->email) ? $Establishments->people_entities_establishment->email : '') }}" disabled>

                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="status2">Estado</label>
                                                        <input type="text" class="form-control" id="status2" value="{{ old('status2',isset($Establishments->people_entities_establishment->status) ? $Establishments->people_entities_establishment->status : '') }}" disabled>

                                                    </div>
                                                    <div class="form-group">
                                                        <label for="number_phone1">Telefono</label>
                                                        <input type="number" class="form-control" id="number_phone1" value="{{ old('number_phone1',isset($Establishments->people_entities_establishment->number_phone1) ? $Establishments->people_entities_establishment->number_phone1 : '') }}" disabled>

                                                    </div>
                                                    <div class="form-group">
                                                        <label for="address">Direccion</label>
                                                        <input type="email" class="form-control" id="address" value="{{ old('address',isset($Establishments->people_entities_establishment->address) ? $Establishments->people_entities_establishment->address : '') }}" disabled>

                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <hr>
                                                </div>
                                                <div class="col-lg-6">
                                                    <label for="cc_ruc">* Propietario </label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                        <button id="modalpropietario" type="button" class="btn btn-primary">Buscar</button>
                                                        </div>
                                                        <!-- /btn-group -->
                                                        <input id="owner_id" name="owner_id" type="text" class="form-control @error('owner_id_2')is-invalid @enderror" value="{{ old('owner_id',isset($Establishments->people_entities_owner->cc_ruc) ? $Establishments->people_entities_owner->cc_ruc : '') }}" disabled>
                                                        @error('owner_id_2')
                                                        <span class="error invalid-feedback">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <input id="owner_id_2" name="owner_id_2" type="hidden" class="form-control" value="{{ old('owner_id_2',isset($Establishments->owner_id) ? $Establishments->owner_id : '') }}">
                                                    <div class="form-group">
                                                        <label for="name_p">Nombres/Nombre Comercial</label>
                                                        <input type="text" class="form-control" id="name_p" value="{{ old('name_p',isset($Establishments->people_entities_owner->name) ? $Establishments->people_entities_owner->name : '') }}" disabled>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="last_name_p">Apellido Paterno/Razon Social</label>
                                                        <input type="text" class="form-control" id="last_name_p" name="last_name_p" value="{{ old('last_name_p',isset($Establishments->people_entities_owner->last_name) ? $Establishments->people_entities_owner->last_name : '') }}" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <label for="cc_ruc">* Representante legal</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                        <button id="modalrepresentante" type="button" class="btn btn-primary">Buscar</button>
                                                        </div>
                                                        <!-- /btn-group -->
                                                        <input id="legal_representative_id" name="legal_representative_id" type="text" class="form-control @error('legal_representative_id_2')is-invalid @enderror" value="{{ old('legal_representative_id',isset($Establishments->people_entities_legal_representative->cc_ruc) ? $Establishments->people_entities_legal_representative->cc_ruc : '') }}" disabled>

                                                        @error('legal_representative_id_2')
                                                        <span class="error invalid-feedback">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <input id="legal_representative_id_2" name="legal_representative_id_2" type="hidden" class="form-control" value="{{ old('legal_representative_id_2',isset($Establishments->legal_representative_id) ? $Establishments->legal_representative_id : '') }}">
                                                    <div class="form-group">
                                                        <label for="name_r">Nombres/Nombre Comercial</label>
                                                        <input type="text" class="form-control" id="name_r" name="name_r" value="{{ old('name_r',isset($Establishments->people_entities_legal_representative->name) ? $Establishments->people_entities_legal_representative->name : '') }}" disabled>

                                                    </div>
                                                    <div class="form-group">
                                                        <label for="last_name_r">Apellido Paterno/Razon Social</label>
                                                        <input type="text" class="form-control" id="last_name_r" value="{{ old('last_name_r',isset($Establishments->people_entities_legal_representative->last_name) ? $Establishments->people_entities_legal_representative->last_name : '') }}" disabled>
                                                    </div>
                                                </div>
                                            </div>

                                    </div>
                                    <!-- final step 1 -->
                                    <div id="step2-part" class="content" role="tabpanel" aria-labelledby="step2-part-trigger">
                                        <!-- formulario de informacion -->

                                            <div class="row">
                                                <br>
                                                <div class="col-lg-6">

                                                    <h4>Datos Generales</h4>
                                                </div>
                                                <div class="col-lg-6">

                                                    <div class="float-right">
                                                        <div class="form-group">
                                                            <button id="btnstep2" class="btn btn-secondary" type="button" onclick="stepprevious()"><i class="fa fa-arrow-left"></i> Anterior </button>
                                                            <button id="btnSiguiente" class="btn btn-secondary" type="button" onclick="stepnext()"><i class="fa fa-arrow-right"></i> Siguiente </button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <hr>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    @if ($errors->has('name') or $errors->has('organization_type') or $errors->has('local') or $errors->has('start_date') or $errors->has('email') or $errors->has('phone'))
                                                    <div class="alert alert-danger alert-dismissible">
                                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                        <h5><i class="icon fas fa-ban"></i> ¡Alerta!</h5>
                                                        Revisa que todos los campos obligatorios esten llenos.
                                                    </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="name">Nombre de establecimiento *</label>
                                                        <input type="text" class="form-control @error('name')is-invalid @enderror" id="name" name="name" value="{{ old('name',$Establishments->name) }}" >
                                                        @error('name')
                                                        <span class="error invalid-feedback">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Tipo de establecimiento *</label>
                                                        <select id="establishment_type" name="establishment_type" class="custom-select @error('establishment_type') is-invalid @enderror">
                                                            <option value="">Seleccione Tipo</option>
                                                            @if ($Establishments->establishment_type == 1)
                                                            <option value="1" selected>Ninguno</option>
                                                            <option value="2">Franquicia</option>
                                                            <option value="3">Cadena/Sucursal</option>
                                                            @elseif ($Establishments->establishment_type == 2)
                                                            <option value="1">Ninguno</option>
                                                            <option value="2" selected>Franquicia</option>
                                                            <option value="3">Cadena/Sucursal</option>
                                                            @elseif ($Establishments->establishment_type == 3)
                                                            <option value="1">Ninguno</option>
                                                            <option value="2">Franquicia</option>
                                                            <option value="3" selected>Cadena/Sucursal</option>
                                                            @else
                                                            <option value="1" {{ old('local') == 1 ? 'selected' : '' }}>Ninguno</option>
                                                            <option value="2" {{ old('local') == 2 ? 'selected' : '' }}>Franquicia</option>
                                                            <option value="3" {{ old('local') == 3 ? 'selected' : '' }}>Cadena/Sucursal</option>
                                                            @endif
                                                        </select>
                                                        @error('establishment_type')
                                                        <span class="error invalid-feedback">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Lugar de funcionamiento *</label>
                                                        <select id="local" name="local" class="custom-select @error('local') is-invalid @enderror">
                                                            <option value="">Seleccione Tipo</option>
                                                            @if ($Establishments->local == 1)
                                                                <option value="1" selected>propio</option>
                                                                <option value="2">arrendado</option>
                                                                <option value="3">cedido</option>
                                                            @elseif($Establishments->local == 2)
                                                                <option value="1">propio</option>
                                                                <option value="2" selected>arrendado</option>
                                                                <option value="3">cedido</option>
                                                            @elseif($Establishments->local == 3)
                                                                <option value="1">propio</option>
                                                                <option value="2" >arrendado</option>
                                                                <option value="3" selected>cedido</option>
                                                            @else
                                                                <option value="1" {{ old('local') == 1 ? 'selected' : '' }}>propio</option>
                                                                <option value="2" {{ old('local') == 2 ? 'selected' : '' }}>arrendado</option>
                                                                <option value="3" {{ old('local') == 3 ? 'selected' : '' }}>cedido</option>
                                                            @endif

                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="registry_number">Numero de registro </label>
                                                        <input type="text" class="form-control @error('registry_number')is-invalid @enderror" id="registry_number" name="registry_number" value="{{ old('registry_number',$Establishments->registry_number)}}" >
                                                        @error('registry_number')
                                                        <span class="error invalid-feedback">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="cadastral_registry">registro Catastral</label>
                                                        <input type="text" class="form-control @error('cadastral_registry')is-invalid @enderror" id="cadastral_registry" name="cadastral_registry" value="{{ old('cadastral_registry',$Establishments->cadastral_registry) }}" >
                                                        @error('cadastral_registry')
                                                        <span class="error invalid-feedback">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Estado *</label>
                                                        <select id="status" name="status" class="custom-select @error('status') is-invalid @enderror">
                                                            <option value="">Seleccione Tipo</option>
                                                            @if($Establishments->status == 1)
                                                            <option value="1" selected>Abierto</option>
                                                            <option value="2">Cerrado</option>
                                                            @elseif($Establishments->status == 2)
                                                            <option value="1">Abierto</option>
                                                            <option value="2" selected>Cerrado</option>
                                                            @else
                                                            <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>Abierto</option>
                                                            <option value="2" {{ old('status') == 2 ? 'selected' : '' }}>Cerrado</option>
                                                            @endif
                                                        </select>
                                                        @error('status')
                                                        <span class="error invalid-feedback">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="start_date">Fecha de inicio:</label>

                                                        <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                                        </div>
                                                        <input type="text" class="form-control" id="start_date" name="start_date" value="{{ old('start_date',$Establishments->start_date) }}" required/>
                                                        </div>
                                                        <!-- /.input group -->
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="franchise_chain">Franquisia/Cadena</label>
                                                        <input type="text" class="form-control @error('franchise_chain')is-invalid @enderror" id="franchise_chain" name="franchise_chain" value="">
                                                        @error('email')
                                                            <span class="error invalid-feedback">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="email">Correo electronico *</label>
                                                        <input type="text" class="form-control @error('email')is-invalid @enderror" id="email" name="email" value="{{ old('email',$Establishments->email) }}">
                                                        @error('email')
                                                            <span class="error invalid-feedback">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="web_page">Pagina web</label>
                                                        <input type="text" class="form-control @error('web_page')is-invalid @enderror" id="web_page" name="web_page" value="{{ old('web_page',$Establishments->web_page) }}" >
                                                        @error('web_page')
                                                        <span class="error invalid-feedback">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="phone">Telefono *</label>
                                                        <input type="text" class="form-control @error('phone')is-invalid @enderror" id="phone" name="phone" value="{{ old('phone',$Establishments->phone) }}" >
                                                        @error('phone')
                                                        <span class="error invalid-feedback">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="observation">Observacion</label>
                                                        <textarea name="observation" id="observation" cols="1" rows="2" class="form-control"></textarea>
                                                        @error('observation')
                                                        <span class="error invalid-feedback">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <hr>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <div class="form-check">
                                                          <input id="has_sewer" name="has_sewer" class="form-check-input" type="checkbox" {{ $Establishments->has_sewer == true ? 'checked' : '' }}>
                                                          <label class="form-check-label">Tiene alcantarillado</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="form-check">
                                                          <input id="has_septic_tank" name="has_septic_tank" class="form-check-input" type="checkbox" {{ $Establishments->has_septic_tank == true ? 'checked' : '' }}>
                                                          <label class="form-check-label">Tiene pozo septico</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <div class="form-check">
                                                          <input id="has_sewage_treatment_system" name="has_sewage_treatment_system" class="form-check-input" type="checkbox" {{ $Establishments->has_sewage_treatment_system == true ? 'checked' : '' }}>
                                                          <label class="form-check-label">Tiene sistema de tratamiento de aguas servidas</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="form-check">
                                                          <input id="is_patrimonial" name="is_patrimonial" class="form-check-input" type="checkbox" {{ $Establishments->is_patrimonial == true ? 'checked' : '' }}>
                                                          <label class="form-check-label">Es patrimonio</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                    </div>
                                    <!-- final step 2 -->
                                    <div id="step3-part" class="content" role="tabpanel" aria-labelledby="step3-part-trigger">


                                            <div class="row">
                                                <br>
                                                <div class="col-lg-6">
                                                    <h4>Datos de ubicacion</h4>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="float-right">
                                                        <button id="btnstep2" class="btn btn-secondary" type="button" onclick="stepprevious()"><i class="fa fa-arrow-left"></i> Anterior </button>
                                                        <button id="btnstepnext3" class="btn btn-secondary" type="button" onclick="stepnext()"><i class="fa fa-arrow-right"></i> Siguiente </button>

                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <hr>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    @if ($errors->has('country_id') or $errors->has('province_id') or $errors->has('canton_id') or $errors->has('parish_id'))
                                                    <div class="alert alert-danger alert-dismissible">
                                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                        <h5><i class="icon fas fa-ban"></i> ¡Alerta!</h5>
                                                        Revisa que todos los campos obligatorios esten llenos.
                                                    </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>*Pais</label>
                                                        <select id="country_id" name="country_id" class="custom-select  @error('country_id') is-invalid @enderror">
                                                            @isset($CountryData)
                                                                <option value="">Seleccione pais</option>
                                                                @foreach ($CountryData as $cd)
                                                                    @if(old('country_id') != null)
                                                                        <option value="{{ $cd->id }}" {{ old('country_id') == $cd->id ? 'selected' : '' }}>{{ $cd->name }}</option>
                                                                    @else
                                                                        <option value="{{ $cd->id }}" {{ $Establishments->country_id == $cd->id ? 'selected' : '' }}>{{ $cd->name }}</option>
                                                                    @endif
                                                                @endforeach
                                                            @endisset
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>*Provincia</label>
                                                        <select id="province_id" name="province_id" class="custom-select @error('province_id') is-invalid @enderror">
                                                            <option value="">Seleccione provincia</option>
                                                            @if($Establishments->register == 1)
                                                                @foreach ($ProvinceData as $p)
                                                                    @if(old('province_id') !== null)
                                                                        <option value="{{ $p->id }}" {{ old('province_id') == $p->id ? 'selected' : '' }}>{{ $p->name }}</option>
                                                                    @else
                                                                        <option value="{{ $p->id }}" {{ $Establishments->province_id == $p->id ? 'selected' : '' }}>{{ $p->name }}</option>
                                                                    @endif
                                                                @endforeach
                                                            @else
                                                                @foreach ($ProvinceData as $p)
                                                                    @isset($p->id)
                                                                        @if(old('province_id') !== null)
                                                                            <option value="{{ $p->id }}" {{ old('province_id') == $p->id ? 'selected' : '' }}>{{ $p->name }}</option>
                                                                        @else
                                                                            <option value="{{ $p->id }}" {{ $Establishments->province_id == $p->id ? 'selected' : '' }}>{{ $p->name }}</option>
                                                                        @endif
                                                                    @endisset
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                        @error('province_id')
                                                            <span class="error invalid-feedback">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label>*Canton</label>
                                                        <select id="canton_id" name="canton_id" class="custom-select @error('canton_id') is-invalid @enderror">
                                                            <option value="">Seleccione canton</option>
                                                            @if($Establishments->register == 1)
                                                                @foreach ($CantonData as $c)
                                                                    @if(old('canton_id') !== null)
                                                                        <option value="{{ $c->id }}" {{ old('canton_id') == $c->id ? 'selected' : '' }}>{{ $c->name }}</option>
                                                                    @else
                                                                        <option value="{{ $c->id }}" {{ $Establishments->canton_id == $c->id ? 'selected' : '' }}>{{ $c->name }}</option>
                                                                    @endif
                                                                @endforeach
                                                            @else
                                                                @foreach ($CantonData as $c)
                                                                    @isset($c->id)
                                                                        @if(old('canton_id') !== null)
                                                                            <option value="{{ $c->id }}" {{ old('canton_id') == $c->id ? 'selected' : '' }}>{{ $c->name }}</option>
                                                                        @else
                                                                            <option value="{{ $c->id }}" {{ $Establishments->canton_id == $c->id ? 'selected' : '' }}>{{ $c->name }}</option>
                                                                        @endif
                                                                    @endisset
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                        @error('canton_id')
                                                            <span class="error invalid-feedback">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label>*Parroquia</label>
                                                        <select id="parish_id" name="parish_id" class="custom-select @error('parish_id') is-invalid @enderror" >
                                                            <option value="">Seleccione parroquia</option>
                                                            @if($Establishments->register == 1)
                                                                @foreach ($ParishData as $pa)
                                                                    @if(old('parish_id') !== null)
                                                                        <option value="{{ $pa->id }}" {{ old('parish_id') == $pa->id ? 'selected' : '' }}>{{ $pa->name }}</option>
                                                                    @else
                                                                        <option value="{{ $pa->id }}" {{ $Establishments->parish_id == $pa->id ? 'selected' : '' }}>{{ $pa->name }}</option>
                                                                    @endif
                                                                @endforeach
                                                            @else
                                                                @foreach ($ParishData as $pa)
                                                                    @isset($pa->id)
                                                                        @if(old('parish_id') !== null)
                                                                            <option value="{{ $pa->id }}" {{ old('parish_id') == $pa->id ? 'selected' : '' }}>{{ $pa->name }}</option>
                                                                        @else
                                                                            <option value="{{ $pa->id }}" {{ $Establishments->parish_id == $pa->id ? 'selected' : '' }}>{{ $pa->name }}</option>
                                                                        @endif
                                                                    @endisset
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                        @error('parish_id')
                                                            <span class="error invalid-feedback">{{ $message }}</span>
                                                        @enderror
                                                    </div>

                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="main_street">Calle principal *</label>
                                                        <input type="text" class="form-control @error('main_street')is-invalid @enderror" id="main_street" name="main_street" value="{{ old('main_street',$Establishments->main_street) }}" >
                                                        @error('main_street')
                                                        <span class="error invalid-feedback">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="number_establishment">Numeracion </label>
                                                        <input type="text" class="form-control @error('number_establishment')is-invalid @enderror" id="number_establishment" name="number_establishment" value="{{ old('number_establishment',$Establishments->number_establishment) }}" >
                                                        @error('number_establishment')
                                                        <span class="error invalid-feedback">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="secondary_street">Calle de intersección </label>
                                                        <input type="text" class="form-control @error('secondary_street')is-invalid @enderror" id="secondary_street" name="secondary_street" value="{{ old('secondary_street',$Establishments->secondary_street) }}" >
                                                        @error('secondary_street')
                                                        <span class="error invalid-feedback">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="name">Referencia de la ubicación *</label>
                                                        <input type="text" class="form-control @error('location_reference')is-invalid @enderror" id="location_reference" name="location_reference" value="{{ old('location_reference',$Establishments->location_reference) }}" >
                                                        @error('location_reference')
                                                        <span class="error invalid-feedback">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                    <!-- final step 3 -->
                                    <div id="step4-part" class="content" role="tabpanel" aria-labelledby="step4-part-trigger">

                                            <div class="row">
                                                <br>
                                                <div class="col-lg-6">
                                                    <h4>Datos de personal</h4>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="float-right">
                                                        <button id="btnstep2" class="btn btn-secondary" type="button" onclick="stepprevious()"><i class="fa fa-arrow-left"></i> Anterior </button>
                                                        <button id="btnstepnext4" disabled class="btn btn-secondary" type="button" onclick="stepnext()"><i class="fa fa-arrow-right"></i> Siguiente </button>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <hr>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    @if($Establishments->register == 1)
                                                    <button class="btn btn-primary" type="submit">Guardar datos de Establecimiento</button>
                                                    @else
                                                    <button class="btn btn-primary" type="submit">Registrar Establecimiento</button>
                                                    @endif
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-lg-4"><strong>GÉNERO</strong></div>
                                                <div class="col-lg-4"><strong>GRUPO</strong></div>
                                                <div class="col-lg-4"><strong>CANTIDAD</strong></div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                        <label for="last_name"><strong>Hombres</strong></label>

                                                    </div>
                                                </div>
                                                <div class="col-lg-5">
                                                    <div class="form-group">
                                                        <label for="last_name"><strong>Total de empleados del establecimiento</strong></label>

                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <input type="number" class="form-control" id="total_number_male_employees" name="total_number_male_employees" value="{{ old('total_number_male_employees',isset($Establishments->total_number_male_employees) ? $Establishments->total_number_male_employees : 0) }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                        <label for="last_name">Hombres</label>

                                                    </div>
                                                </div>
                                                <div class="col-lg-5">
                                                    <div class="form-group">
                                                        <label for="last_name">Del Total, cuantos son gerentes</label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" id="total_number_male_manager" name="total_number_male_manager" value="{{ old('total_number_male_manager',isset($Establishments->total_number_male_manager) ? $Establishments->total_number_male_manager : 0) }}" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                        <label for="last_name">Hombres</label>

                                                    </div>
                                                </div>
                                                <div class="col-lg-5">
                                                    <div class="form-group">
                                                        <label for="last_name">Del Total, cuantos son administrativos</label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" id="total_number_administrative_men" name="total_number_administrative_men" value="{{ old('total_number_administrative_men',isset($Establishments->total_number_administrative_men) ? $Establishments->total_number_administrative_men : 0) }}" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                        <label for="last_name">Hombres</label>

                                                    </div>
                                                </div>
                                                <div class="col-lg-5">
                                                    <div class="form-group">
                                                        <label for="last_name">Del Total, cuantos son recepcionistas</label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" id="total_number_male_receptionists" name="total_number_male_receptionists" value="{{ old('total_number_male_receptionists',isset($Establishments->total_number_male_receptionists) ? $Establishments->total_number_male_receptionists : 0) }}" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                        <label for="last_name">Hombres</label>

                                                    </div>
                                                </div>
                                                <div class="col-lg-5">
                                                    <div class="form-group">
                                                        <label for="last_name">Del Total, cuantos trabajan en habitaciones</label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" id="total_number_male_rooms" name="total_number_male_rooms" value="{{ old('total_number_male_rooms',isset($Establishments->total_number_male_rooms) ? $Establishments->total_number_male_rooms : 0) }}" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                        <label for="last_name">Hombres</label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-5">
                                                    <div class="form-group">
                                                        <label for="last_name">Del Total, cuantos trabajan en restaurante</label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" id="total_number_male_restaurant" name="total_number_male_restaurant" value="{{ old('total_number_male_restaurant',isset($Establishments->total_number_male_restaurant) ? $Establishments->total_number_male_restaurant : 0) }}" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                        <label for="last_name">Hombres</label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-5">
                                                    <div class="form-group">
                                                        <label for="last_name">Del Total, cuantos trabajan en el bar</label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" id="total_number_male_bars" name="total_number_male_bars" value="{{ old('total_number_male_bars',isset($Establishments->total_number_male_bars) ? $Establishments->total_number_male_bars : 0) }}" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                        <label for="last_name">Hombres</label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-5">
                                                    <div class="form-group">
                                                        <label for="last_name">Del Total, cuantos trabajan en la cocina</label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" id="total_number_male_cook" name="total_number_male_cook" value="{{ old('total_number_male_cook',isset($Establishments->total_number_male_cook) ? $Establishments->total_number_male_cook : 0) }}" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                        <label for="last_name">Hombres</label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-5">
                                                    <div class="form-group">
                                                        <label for="last_name">Del Total, cuantos son concerjes</label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" id="total_number_male_concierge" name="total_number_male_concierge" value="{{ old('total_number_male_concierge',isset($Establishments->total_number_male_concierge) ? $Establishments->total_number_male_concierge : 0) }}" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                        <label for="last_name">Hombres</label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-5">
                                                    <div class="form-group">
                                                        <label for="last_name">Del Total, cuantos trabajan en otras actividades</label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" id="total_number_male_other" name="total_number_male_other" value="{{ old('total_number_male_other',isset($Establishments->total_number_male_other) ? $Establishments->total_number_male_other : 0) }}" >
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                        <label for="last_name"><strong>Mujeres</strong></label>

                                                    </div>
                                                </div>
                                                <div class="col-lg-5">
                                                    <div class="form-group">
                                                        <label for="last_name"><strong>Total de empleados del establecimiento</strong></label>

                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" id="total_number_female_employees" name="total_number_female_employees" value="{{ old('total_number_female_employees',isset($Establishments->total_number_female_employees) ? $Establishments->total_number_female_employees : 0) }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                        <label for="last_name">Mujeres</label>

                                                    </div>
                                                </div>
                                                <div class="col-lg-5">
                                                    <div class="form-group">
                                                        <label for="last_name">Del Total, cuantos son gerentes</label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" id="total_number_female_manager" name="total_number_female_manager" value="{{ old('total_number_female_manager',isset($Establishments->total_number_female_manager) ? $Establishments->total_number_female_manager : 0) }}" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                        <label for="last_name">Mujeres</label>

                                                    </div>
                                                </div>
                                                <div class="col-lg-5">
                                                    <div class="form-group">
                                                        <label for="last_name">Del Total, cuantos son administrativos</label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" id="total_number_administrative_woman" name="total_number_administrative_woman" value="{{ old('total_number_administrative_woman',isset($Establishments->total_number_administrative_woman) ? $Establishments->total_number_administrative_woman : 0) }}" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                        <label for="last_name">Mujeres</label>

                                                    </div>
                                                </div>
                                                <div class="col-lg-5">
                                                    <div class="form-group">
                                                        <label for="last_name">Del Total, cuantos son recepcionistas</label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" id="total_number_female_receptionists" name="total_number_female_receptionists" value="{{ old('total_number_female_receptionists',isset($Establishments->total_number_female_receptionists) ? $Establishments->total_number_female_receptionists : 0) }}" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                        <label for="last_name">Mujeres</label>

                                                    </div>
                                                </div>
                                                <div class="col-lg-5">
                                                    <div class="form-group">
                                                        <label for="last_name">Del Total, cuantos trabajan en habitaciones</label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" id="total_number_female_rooms" name="total_number_female_rooms" value="{{ old('total_number_female_rooms',isset($Establishments->total_number_female_rooms) ? $Establishments->total_number_female_rooms : 0) }}" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                        <label for="last_name">Mujeres</label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-5">
                                                    <div class="form-group">
                                                        <label for="last_name">Del Total, cuantos trabajan en restaurante</label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" id="total_number_female_restaurant" name="total_number_female_restaurant" value="{{ old('total_number_female_restaurant',isset($Establishments->total_number_female_restaurant) ? $Establishments->total_number_female_restaurant : 0) }}" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                        <label for="last_name">Mujeres</label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-5">
                                                    <div class="form-group">
                                                        <label for="last_name">Del Total, cuantos trabajan en el bar</label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" id="total_number_female_bars" name="total_number_female_bars" value="{{ old('total_number_female_bars',isset($Establishments->total_number_female_bars) ? $Establishments->total_number_female_bars : 0) }}" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                        <label for="last_name">Mujeres</label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-5">
                                                    <div class="form-group">
                                                        <label for="last_name">Del Total, cuantos trabajan en la cocina</label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" id="total_number_female_cook" name="total_number_female_cook" value="{{ old('total_number_female_cook',isset($Establishments->total_number_female_cook) ? $Establishments->total_number_female_cook : 0) }}" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                        <label for="last_name">Mujeres</label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-5">
                                                    <div class="form-group">
                                                        <label for="last_name">Del Total, cuantos son concerjes</label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" id="total_number_female_concierge" name="total_number_female_concierge" value="{{ old('total_number_female_concierge',isset($Establishments->total_number_female_concierge) ? $Establishments->total_number_female_concierge : 0) }}" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                        <label for="last_name">Mujeres</label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-5">
                                                    <div class="form-group">
                                                        <label for="last_name">Del Total, cuantos trabajan en otras actividades</label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" id="total_number_female_other" name="total_number_female_other" value="{{ old('total_number_female_other',isset($Establishments->total_number_female_other) ? $Establishments->total_number_female_other : 0) }}" >
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                    <!-- final step 4 -->
                                </div>
                            </form>
                        </div>
                    </div>
                    @if($Establishments->register == '1')
                    <div class="tab-pane fade {{ session('tabEstablishment') == 2 ? 'show active' : '' }}" id="custom-tabs-four-profile" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
                        <div id="stepper2" class="bs-stepper">
                            <div class="bs-stepper-header" role="tablist">
                              <!-- your steps here -->
                              <div class="step" data-target="#toutist-step1-part">
                                <button type="button" class="step-trigger" role="tab" aria-controls="toutist-step1-part" id="toutist-step1-part-trigger">
                                  <span class="bs-stepper-circle">1</span>
                                  <span class="bs-stepper-label">Normativa</span>
                                </button>
                              </div>
                              <div class="line"></div>
                              <div class="step" data-target="#toutist-step2-part">
                                <button type="button" class="step-trigger" role="tab" aria-controls="toutist-step2-part" id="toutist-step2-part-trigger">
                                  <span class="bs-stepper-circle">2</span>
                                  <span class="bs-stepper-label">Capacidad de habitacion</span>
                                </button>
                              </div>
                              <div class="line"></div>
                              <div class="step" data-target="#toutist-step3-part">
                                <button type="button" class="step-trigger" role="tab" aria-controls="toutist-step3-part" id="toutist-step3-part-trigger">
                                  <span class="bs-stepper-circle">3</span>
                                  <span class="bs-stepper-label">Servicios complementarios</span>
                                </button>
                              </div>
                            </div>
                            <div class="bs-stepper-content">
                                <!-- start step 1 -->
                                <div id="toutist-step1-part" class="content" role="tabpanel" aria-labelledby="toutist-step1-part-trigger">
                                    <form id="formEstablismentTab2" action="{{ route('establishments.updateTab2',$Establishments->id) }}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <div class="row">
                                            <br>
                                            <div class="col-lg-6">
                                                <h4>Cumplimiento de requisitos de establecimiento</h4>
                                            </div>
                                            <div class="col-lg-6 ">
                                                <div class="float-right">
                                                    <div class="form-group">
                                                        <button id="btnstep2" class="btn btn-secondary" type="button" onclick="stepprevioustab2()"><i class="fa fa-arrow-left"></i> Anterior </button>
                                                        <button id="btnSiguiente" class="btn btn-secondary " type="button" onclick="stepnexttab2()"><i class="fa fa-arrow-right"></i> Siguiente </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <hr>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                @if ($errors->has('area_applications_id') or $errors->has('tourist_activity_id') or $errors->has('classification_id') or $errors->has('category_id'))
                                                <div class="alert alert-danger alert-dismissible">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                    <h5><i class="icon fas fa-ban"></i> ¡Alerta!</h5>
                                                    Revisa que todos los campos obligatorios esten llenos.
                                                </div>
                                                @endif
                                                @if(session('status'))
                                                    @if(session('tabEstablishment') == '2' and session('step')== '1')
                                                    <div class="alert alert-success alert-dismissible">
                                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                        <h5><i class="icon fas fa-check"></i> ¡Felicidades!</h5>
                                                        {{session('status')}}
                                                    </div>
                                                    @endif
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <button class="btn btn-primary" type="submit">Guardar datos de Establecimiento</button>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label>Ambito de aplicacion *</label>
                                                    <select id="area_applications_id" name="area_applications_id" class="custom-select @error('area_applications_id') is-invalid @enderror">
                                                        @isset($AreaApplication)
                                                            <option value="">Seleccione Ambito</option>
                                                            @foreach ($AreaApplication as $ap)
                                                                @if (old('area_applications_id'))
                                                                <option value="{{ $ap->id }}" {{ old('area_applications_id') == $ap->id ? 'selected' : '' }}>{{ $ap->name }}</option>
                                                                @else
                                                                <option value="{{ $ap->id }}" {{ $Establishments->area_applications_id == $ap->id ? 'selected' : '' }}>{{ $ap->name }}</option>
                                                                @endif
                                                            @endforeach
                                                        @endisset
                                                    </select>
                                                    @error('area_applications_id')
                                                        <span class="error invalid-feedback">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label>Actividad turistica *</label>
                                                    <select id="tourist_activity_id" name="tourist_activity_id" class="custom-select @error('tourist_activity_id') is-invalid @enderror">
                                                        @isset($touristActivity)
                                                            <option value="">Seleccione Actividad</option>
                                                            @foreach ($touristActivity as $ta)
                                                                @if(isset($Establishments->tourist_activity_id))
                                                                    @if($ta->id == $Establishments->tourist_activity_id)
                                                                        <option value="{{ $ta->id }}" selected>{{ $ta->name }}</option>
                                                                    @else
                                                                        <option value="{{ $ta->id }}">{{ $ta->name }}</option>
                                                                    @endif
                                                                @else
                                                                    @if(Cookie::get('tourist_activity_id'))
                                                                        @if($ta->id == Cookie::get('tourist_activity_id'))
                                                                            <option value="{{ $ta->id }}" selected>{{ $ta->name }}</option>
                                                                        @else
                                                                            <option value="{{ $ta->id }}">{{ $ta->name }}</option>
                                                                        @endif
                                                                    @else
                                                                        <option value="{{ $ta->id }}">{{ $ta->name }}</option>
                                                                    @endif
                                                                @endif

                                                            @endforeach
                                                        @endisset
                                                    </select>
                                                    @error('tourist_activity_id')
                                                        <span class="error invalid-feedback">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label>Clasificacion *</label>
                                                    <select id="classification_id" name="classification_id" class="custom-select @error('classification_id') is-invalid @enderror">
                                                        <option value="">Seleccione Clasificacion</option>
                                                        @if($register or Cookie::get('classification_id'))
                                                            @if ($register == 'yes')
                                                                @foreach ($establishmentClassification as $ec)
                                                                    @if($ec->id == $Establishments->classification_id)
                                                                        <option value="{{ $ec->id }}" selected>{{ $ec->name }}</option>
                                                                    @else
                                                                        <option value="{{ $ec->id }}">{{ $ec->name }}</option>
                                                                    @endif
                                                                @endforeach
                                                            @else
                                                                @if(Cookie::get('classification_id') !== null)
                                                                    @foreach ($establishmentClassification as $ec)
                                                                        @if(Cookie::get('classification_id'))
                                                                            @if($ec->id == Cookie::get('classification_id'))
                                                                                <option value="{{ $ec->id }}" selected>{{ $ec->name }}</option>
                                                                            @else
                                                                                <option value="{{ $ec->id }}">{{ $ec->name }}</option>
                                                                            @endif
                                                                        @endif
                                                                    @endforeach
                                                                @endif
                                                            @endif
                                                        @endisset
                                                    </select>
                                                    @error('classification_id')
                                                        <span class="error invalid-feedback">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label>Categoria *</label>
                                                    <select id="category_id" name="category_id" class="custom-select @error('category_id') is-invalid @enderror">
                                                        <option value="">Seleccione Categoria</option>
                                                        @if($register or Cookie::get('classification_id'))
                                                            @if ($register == 'yes')
                                                                @foreach ($establishmentCategory as $eca)
                                                                    @isset($Establishments->category_id)
                                                                        @if($eca->id == $Establishments->category_id)
                                                                            <option value="{{ $eca->id }}" selected>{{ $eca->name }}</option>
                                                                        @else
                                                                            <option value="{{ $eca->id }}">{{ $eca->name }}</option>
                                                                        @endif
                                                                    @endisset
                                                                @endforeach
                                                            @else
                                                                @if(Cookie::get('category_id') !== null)
                                                                    @foreach ($establishmentCategory as $eca)
                                                                        @if(Cookie::get('category_id'))
                                                                            @if($eca->id == Cookie::get('category_id'))
                                                                                <option value="{{ $eca->id }}" selected>{{ $eca->name }}</option>
                                                                            @else
                                                                                <option value="{{ $eca->id }}">{{ $eca->name }}</option>
                                                                            @endif
                                                                        @endif
                                                                    @endforeach
                                                                @endif
                                                            @endif
                                                        @endif


                                                    </select>
                                                    @error('category_id')
                                                        <span class="error invalid-feedback">{{ $message }}</span>
                                                    @enderror
                                                </div>


                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- end step 1 -->
                                <!-- start step 2 -->
                                <div id="toutist-step2-part" class="content" role="tabpanel" aria-labelledby="toutist-step2-part-trigger">
                                    <form id="formEstablismentTab2step2" action="{{ route('travelhotelsdetail.store',$Establishments->id) }}" method="post">
                                        @csrf

                                    <div class="row">
                                        <br>
                                        <div class="col-lg-6">
                                            <h4>Capacidad del establecimiento</h4>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="float-right">
                                                <button id="btnstep2" class="btn btn-secondary" type="button" onclick="stepprevioustab2()"><i class="fa fa-arrow-left"></i> Anterior </button>
                                                <button id="btnSiguiente" class="btn btn-secondary " type="button" onclick="stepnexttab2()"><i class="fa fa-arrow-right"></i> Siguiente </button>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <hr>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            @if(session('status'))
                                                @if(session('tabEstablishment') == '2' and session('step')== '2')
                                                    <div class="alert alert-success alert-dismissible">
                                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                        <h5><i class="icon fas fa-check"></i> ¡Felicidades!</h5>
                                                        {{session('status')}}.
                                                    </div>
                                                @endif
                                            @endif
                                            @if ($errors->has('total_rooms') or $errors->has('total_beds') or $errors->has('total_places') or $errors->has('type_room_id'))
                                                <div class="alert alert-danger alert-dismissible">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                    <h5><i class="icon fas fa-ban"></i> ¡Alerta!</h5>
                                                    Revisa que todos los campos obligatorios esten llenos.
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="total_rooms">Total de habitaciones</label>
                                                <input type="number" class="form-control" id="total_rooms" name="total_rooms" value="{{ old('total_rooms',isset($Establishments->total_rooms) ? $Establishments->total_rooms : 0) }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="total_beds">Total de camas</label>
                                                <input type="text" class="form-control" id="total_beds" name="total_beds" value="{{ old('total_beds',isset($Establishments->total_beds) ? $Establishments->total_beds : 0) }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="total_places">Total de plazas</label>
                                                <input type="text" class="form-control" id="total_places" name="total_places" value="{{ old('total_places',isset($Establishments->total_places) ? $Establishments->total_places : 0) }}" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <button id="" class="btn btn-primary " type="submit"><i class="fa fa-arrow-right"></i> Agregar </button>
                                            </div>
                                            <div class="form-group">
                                                <label>Tipo de habitacion *</label>
                                                <select id="type_room_id" name="type_room_id" class="custom-select @error('type_room_id') is-invalid @enderror">
                                                    @isset($TypeRoom)
                                                        <option value="">Seleccione tipo</option>
                                                        @foreach ($TypeRoom as $tr)
                                                            @if (old('type_room_id'))
                                                            <option value="{{ $tr->id }}" {{ old('type_room_id') == $tr->id ? 'selected' : '' }}>{{ $tr->name }}</option>
                                                            @else
                                                            <option value="{{ $tr->id }}" >{{ $tr->name }}</option>
                                                            @endif
                                                        @endforeach
                                                    @endisset
                                                </select>
                                                @error('type_room_id')
                                                    <span class="error invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="total">Habitaciones *</label>
                                                <input type="number" class="form-control @error('total')is-invalid @enderror" id="total" name="total" value="{{ old('total') }}" >
                                                @error('total')
                                                <span class="error invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="bed">Camas por habitacion *</label>
                                                <input type="number" class="form-control @error('bed')is-invalid @enderror" id="bed" name="bed" value="{{ old('bed') }}" >
                                                @error('bed')
                                                <span class="error invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="plazas">Plazas *</label>
                                                <input type="number" class="form-control @error('plazas')is-invalid @enderror" id="plazas" name="plazas" value="{{ old('plazas') }}" >
                                                @error('plazas')
                                                <span class="error invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-8">
                                            <!-- star table -->
                                            <table id="habitacion-table" class="table table-sm table-bordered table-hover">
                                                <thead>
                                                <tr>
                                                  <th>Tipo de habitacion</th>
                                                  <th># habitaciones</th>
                                                  <th>Camas por habitacion</th>
                                                  <th>Plazas</th>
                                                  <th>Accion</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                    @isset($Establishments->rooms_hotels)
                                                        @if($Establishments->rooms_hotels->count() > 0)
                                                            @foreach ($Establishments->rooms_hotels as $th)
                                                                <tr>
                                                                    <td>{{$th->name}}</td>
                                                                    <td>{{$th->pivot->total}}</td>
                                                                    <td>{{$th->pivot->bed}}</td>
                                                                    <td>{{$th->pivot->plazas}}</td>
                                                                    <td>
                                                                        <a class="btn btn-danger btn-sm" onclick="deleteRooms({{$th->pivot->id}})">
                                                                        <i class="fas fa-trash">
                                                                        </i>
                                                                        Delete
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        @endif
                                                    @endisset
                                                </tbody>

                                            </table>
                                            <!-- end table -->

                                        </div>
                                    </div>
                                    </form>
                                </div>
                                <!-- end step 2 -->
                                <!-- start step 3 -->
                                <div id="toutist-step3-part" class="content" role="tabpanel" aria-labelledby="toutist-step3-part-trigger">
                                    <form action="{{ route('establishmentservices.store',$Establishments->id) }}" method="post">
                                        @csrf
                                        <div class="row">
                                            <br>
                                            <div class="col-lg-6">
                                                <h4>Servicios complementarios</h4>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="float-right">
                                                    <button id="btnstep2" class="btn btn-secondary" type="button" onclick="stepprevioustab2()"><i class="fa fa-arrow-left"></i> Anterior </button>
                                                    <button id="btnSiguiente" class="btn btn-secondary " type="button" onclick="stepnexttab2()"><i class="fa fa-arrow-right"></i> Siguiente </button>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <hr>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-12">
                                                @if(session('status'))
                                                    @if(session('tabEstablishment') == '2' and session('step')== '3')
                                                        <div class="alert alert-success alert-dismissible">
                                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                            <h5><i class="icon fas fa-check"></i> ¡Felicidades!</h5>
                                                            {{session('status')}}.
                                                        </div>
                                                    @endif
                                                @endif
                                                @if ($errors->has('service_id') or $errors->has('services_type'))
                                                    <div class="alert alert-danger alert-dismissible">
                                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                        <h5><i class="icon fas fa-ban"></i> ¡Alerta!</h5>
                                                        Revisa que todos los campos obligatorios esten llenos.
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                   <button id="btnEstablishmentServices" class="btn btn-primary" type="submit"><i class="fa fa-plus"></i> Agregar</button>
                                                </div>
                                                <div class="form-group">
                                                    <label>Servicios *</label>
                                                    <select id="service_id" name="service_id" class="custom-select @error('service_id') is-invalid @enderror">
                                                        @isset($Services)
                                                            <option value="">Seleccione servicio</option>
                                                            @foreach ($Services as $s)
                                                                @if (old('service_id'))
                                                                <option value="{{ $s->id }}" {{ old('service_id') == $s->id ? 'selected' : '' }}>{{ $s->description }}</option>
                                                                @else
                                                                <option value="{{ $s->id }}" >{{ $s->description }}</option>
                                                                @endif
                                                            @endforeach
                                                        @endisset
                                                    </select>
                                                    @error('service_id')
                                                        <span class="error invalid-feedback">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label>Tipo de Servicios *</label>
                                                    <select id="services_type" name="services_type" class="custom-select @error('services_type') is-invalid @enderror">
                                                        <option value="">Seleccione tipo</option>
                                                        <option value="1">Alimentos y bebidas</option>
                                                        <option value="2">Otros</option>
                                                    </select>
                                                    @error('services_type')
                                                        <span class="error invalid-feedback">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="services_total_beds">Cantidad de mesas</label>
                                                    <input type="text" class="form-control @error('services_total_beds')is-invalid @enderror" id="services_total_beds" name="services_total_beds" value="" >
                                                    @error('services_total_beds')
                                                    <span class="error invalid-feedback">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="services_total_plazas">Cantidad de plazas</label>
                                                    <input type="text" class="form-control @error('services_total_plazas')is-invalid @enderror" id="services_total_plazas" name="services_total_plazas" value="" >
                                                    @error('services_total_plazas')
                                                    <span class="error invalid-feedback">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-8">
                                                <!-- star table -->
                                                <table id="servicios-table" class="table table-sm table-bordered table-hover">
                                                    <thead>
                                                    <tr>
                                                      <th>Servicio</th>
                                                      <th>Tipo</th>
                                                      <th>Cantidad de mesas</th>
                                                      <th>Cantidad de plazas</th>
                                                      <th>Accion</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                        @isset($Establishments->establishment_services)
                                                            @if($Establishments->establishment_services->count() > 0)
                                                                @foreach ($Establishments->establishment_services as $th)
                                                                    <tr>
                                                                        <td>{{$th->description}}</td>
                                                                        @if ($th->pivot->services_type == 1)
                                                                            <td>Alimentos y bebidas</td>
                                                                        @else
                                                                            <td>Otros</td>
                                                                        @endif
                                                                        <td>{{$th->pivot->services_total_beds}}</td>
                                                                        <td>{{$th->pivot->services_total_plazas}}</td>
                                                                        <td>
                                                                            <a class="btn btn-danger btn-sm" onclick="deleteServicesEstablishment({{$th->pivot->id}})">
                                                                                <i class="fas fa-trash">
                                                                                </i>
                                                                                Eliminar
                                                                            </a>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            @endif
                                                        @endisset
                                                    </tbody>

                                                </table>
                                                <!-- end table -->
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- end step 3 -->
                            </div>
                        </div>
                    </div>
                    @endif
                  </div>
                </div>
                <div id="loading" class="overlay dark" style="display: none">
                    <i class="fas fa-2x fa-sync-alt fa-spin"></i>
                </div>
                <!-- /.card -->
              </div>
            </div>
        </div>
         <!-- /.row -->

    </section>
    <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Seleccione Persona/empresa</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <button class="btn btn-primary btn-sm" onclick="tableentities.ajax.reload()"><i class="fa fa-update">Actualizar</i></button>
                        <br>
                    </div>

                    <div class="col-12">
                        <div class="alert alert-info alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h5><i class="icon fas fa-ban"></i> ¡Importante!</h5>
                            Si ocurre algun error al cargar la tabla, de clic en actualizar.
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-12">
                        <table id="entities-table" class="table table-sm table-bordered table-hover">
                            <thead>
                            <tr>
                              <th>Cedula/Ruc</th>
                              <th>Tipo de persona</th>
                              <th>Nombres / Nombre comercial</th>
                              <th>Apellidos / Razon Social</th>
                              <th>Estado</th>
                              <th>Correo</th>
                              <th>Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Cedula/Ruc</th>
                                <th>Tipo de persona</th>
                                <th>Nombres / Nombre comercial</th>
                                <th>Apellidos / Razon Social</th>
                                <th>Estado</th>
                                <th>Correo</th>
                                <th>Acciones</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            <div id="loading_modal" class="overlay dark" style="display: none">
                <i class="fas fa-2x fa-sync-alt fa-spin"></i>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <div class="modal fade" id="modal-notificacion">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <h6 id="titleModalDelete" class="modal-title">Está seguro de eliminar la fila</h6>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form id="formDeleteRooms" action="" method="post">
                    @csrf
                    @method('DELETE')
                    <div class="row">

                        <div class="col-6">
                            <div class="form-group">
                                <button class="btn btn-primary btn-block" type="submit">Confirmar</button>
                            </div>

                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <button class="btn btn-danger btn-block">Cancelar</button>
                            </div>
                        </div>

                    </div>
                </form>
            </div>

          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
@endsection
@push('scripts')
    <script>
        var stepper = new Stepper(document.querySelector('#stepper1'));
        function stepnext(){
            stepper.next()
        }
        function stepprevious(){
            stepper.previous()
        }

        @if($Establishments->register == '1')
        var stepper2 = new Stepper(document.querySelector('#stepper2'));
            @if(session('tabEstablishment') == 2 and session('step') == 3)
            stepper2.to(3);
            @elseif(session('tabEstablishment') == 2 and session('step') == 2)
            stepper2.to(2);
            @else
            stepper2.to(1);
            @endif
            function stepnexttab2(){
                @if($Establishments->tourist_activity_id != null and $Establishments->tourist_activity_id > 0)
                stepper2.next()
                @else
                toastr.error('Para que se muestra la siguiente sección, debe ingresar los datos de ambito de aplicación, actividad turistica, clasificación y categoria');
                @endif
            }
            function stepprevioustab2(){
                stepper2.previous()
            }
        @endif

        //datos organizacion
        let establishment_id = document.getElementById('establishment_id');
        let name2 = document.getElementById('name2');
        let last_name = document.getElementById('last_name');
        let email2 = document.getElementById('email2');
        let status = document.getElementById('status2');
        let address = document.getElementById('address');
        let number_phone1 = document.getElementById('number_phone1');

        let establishment_id_2 = document.getElementById('establishment_id_2');

        let token = "{{csrf_token()}}";
        let loading = document.getElementById('loading');
        let loading_modal = document.getElementById('loading_modal');
        @if($Establishments->register == 1)
        var selectTouristActivity = document.getElementById('tourist_activity_id');
        var selectclassification = document.getElementById('classification_id');
        var selectcategory = document.getElementById('category_id');
        @endif

        let name_p = document.getElementById('name_p');
        let last_name_p = document.getElementById('last_name_p');
        let name_r = document.getElementById('name_r');
        let last_name_r = document.getElementById('last_name_r');
        let legal_representative_id_2 = document.getElementById('legal_representative_id_2');
        let legal_representative_id = document.getElementById('legal_representative_id');
        let owner_id_2 = document.getElementById('owner_id_2');
        let owner_id = document.getElementById('owner_id');

        var modalempresa = document.getElementById('modalempresa');
        var modalpropietario = document.getElementById('modalpropietario');
        var modalrepresentante = document.getElementById('modalrepresentante');

        var selectCountry = document.getElementById('country_id');
        var selectProvince = document.getElementById('province_id');
        var selectCanton = document.getElementById('canton_id');
        var selectParish = document.getElementById('parish_id');

        //cargar modal persona
        modalempresa.addEventListener('click', function(e) {
            document.getElementById('numbermodal').value = 1;
            $('#modal-lg').modal('show');
            loading_modal.style.display = '';
            $('#modal-lg').modal('show');

        });
        //cargar modal propietario
        modalpropietario.addEventListener('click', function(e) {
            document.getElementById('numbermodal').value = 2;
            $('#modal-lg').modal('show');

        });
        //cargar modal representante legal
        modalrepresentante.addEventListener('click', function(e) {
            document.getElementById('numbermodal').value = 3;
            $('#modal-lg').modal('show');

        })

        var modalempresa = document.getElementById('modalempresa');
        let tableentities =$('#entities-table').DataTable({
            "lengthMenu": [ 5, 10],
            "language" : {
                "url": '{{ url("/js/spanish.json") }}',
            },
            "responsive": true,
            "lengthChange": true,
            "autoWidth": false,
            "order": [], //Initial no order
            "processing" : true,
            "serverSide": true,
            "ajax": {
                "url" : "{{ route('peopleentities.datatablesPersonas') }}",
                "type": "post",
                "data": function (d){
                    d._token = $("input[name=_token]").val();
                }
            },
            "columns": [
                {data: 'cc_ruc'},
                {data: 'type'},
                {data: 'name_tradename'},
                {data: 'last_name_bussines_name'},
                {data: 'status'},
                {data: 'email'},
                {data: 'action', name: 'action', orderable: false, searchable: false},

            ]
        });

        //cargar modal persona
        modalempresa.addEventListener('click', function(e) {
            loading_modal.style.display = '';
            document.getElementById('numbermodal').value = 1;
            $('#modal-lg').modal('show');
            axios.post("{{ route('establishments.datatablesPersonas') }}", {
                data: {
                _token: token
                }
            }).then(function(res) {
                console.log(res);
                if(res.status==200) {
                    //tableentities.clear().draw();
                    let d = res.data;
                    tableentities.ajax.reload();
                    //tableentities.rows.add(d.data).draw();
                    loading_modal.style.display = 'none';
                }
            }).catch(function(err) {
                console.log(err);
                if(err.response.status == 500){
                    toastr.error('Error al comunicarse con el servidor, contacte al administrador de Sistemas');
                    console.log('error al consultar al servidor');
                    loading_modal.style.display = 'none';
                }

                if(err.response.status == 419){
                    toastr.error('Es posible que tu session haya caducado, vuelve a iniciar sesion');
                    console.log('Es posible que tu session haya caducado, vuelve a iniciar sesion');
                    loading_modal.style.display = 'none';
                }
            }).then(function() {
            });
        });

        @if($Establishments->register == '1')
        // funcion para cargar actividadturistica
        selectTouristActivity.addEventListener('change', function() {
            var selectedOption = this.options[selectTouristActivity.selectedIndex];
            //console.log(selectedOption.value + ': ' + selectedOption.text);
            var loading = document.getElementById('loading');
            loading.style.display = '';
            loadClassifications(selectedOption.value);
            selectcategory.innerHTML = '<option value="">Seleccione Categoria</option>';

        });
        // funcion para cargar clasificacion
        selectclassification.addEventListener('change', function() {
            var selectedOption = this.options[selectclassification.selectedIndex];
            var loading = document.getElementById('loading');
            loading.style.display = '';
            loadCategories(selectedOption.value);
        });
        function loadClassifications(tourist_activity_id){
            axios.post('{{ route("establishmentclassification.get") }}', {
            _token: token,
            tourist_activity_id:tourist_activity_id
            }).then(function(res) {
                if(res.status==200) {
                    console.log("cargando clasificaciones");
                    selectclassification.innerHTML = res.data;
                    loading.style.display = 'none';
                }
            }).catch(function(err) {
                if(err.response.status == 500){
                    toastr.error('Error al comunicarse con el servidor, contacte al administrador de Sistemas');
                    console.log('error al consultar al servidor');
                }

                if(err.response.status == 419){
                    toastr.error('Es posible que tu session haya caducado, vuelve a iniciar sesion');
                    console.log('Es posible que tu session haya caducado, vuelve a iniciar sesion');
                }
            }).then(function() {
                    loading.style.display = 'none';
            });
        }
        function loadCategories(classification_id){
            axios.post('{{ route("establishmentcategory.show") }}', {
            _token: token,
            classification_id:classification_id
            }).then(function(res) {
                if(res.status==200) {
                    console.log("cargando categorias");
                    selectcategory.innerHTML = res.data;
                    loading.style.display = 'none';
                }
            }).catch(function(err) {
                if(err.response.status == 500){
                    toastr.error('Error al comunicarse con el servidor, contacte al administrador de Sistemas');
                    console.log('error al consultar al servidor');
                }

                if(err.response.status == 419){
                    toastr.error('Es posible que tu session haya caducado, vuelve a iniciar sesion');
                    console.log('Es posible que tu session haya caducado, vuelve a iniciar sesion');
                }
            }).then(function() {
                    loading.style.display = 'none';
            });
        }
        @endif
        function selectedPersonEntity(id,modal){
            let modal2;
            if(modal == 0){
                 modal2 = document.getElementById("numbermodal").value;
            }else{
                modal2 = modal;
            }
            axios.post('{{route("peopleentities.get")}}', {id:id,_token: token}).then(function(res) {
                if(res.status==200) {
                    console.log("cargando personas..."+modal);
                    //let modal = document.getElementById("numbermodal");
                    if(modal2 == 1){
                        establishment_id.value = res.data.cc_ruc;
                        name2.value = res.data.name;
                        email2.value = res.data.email;
                        number_phone1.value = res.data.number_phone1;
                        last_name.value = res.data.last_name;
                        status.value = res.data.status;
                        address.value = res.data.address;

                        establishment_id_2.value = res.data.id;
                        console.log(res.data.id);
                    }else if(modal2 == 2){
                        name_p.value = res.data.name;
                        last_name_p.value = res.data.last_name;
                        owner_id.value = res.data.cc_ruc;
                        owner_id_2.value = res.data.id;
                    }else{
                        name_r.value = res.data.name;
                        last_name_r.value = res.data.last_name;
                        legal_representative_id.value = res.data.cc_ruc;
                        legal_representative_id_2.value = res.data.id;
                    }


                    loading.style.display = 'none';
                    $('#modal-lg').modal('hide');
                }
            }).catch(function(err) {

            }).then(function() {
                    loading.style.display = 'none';
            });
        }

        // funciones de ubicacion
        selectCountry.addEventListener('change', function() {
            var selectedOption = this.options[selectCountry.selectedIndex];
            //console.log(selectedOption.value + ': ' + selectedOption.text);
            var loading = document.getElementById('loading');
            loading.style.display = '';
            loadPronvices(selectedOption.value);
        });
         // funcion para cargar canton
        selectProvince.addEventListener('change', function() {
            var selectedOption2 = this.options[selectProvince.selectedIndex];
            if (typeof(Storage) !== 'undefined') {
                //localStorage.setItem('pronvince_id', selectedOption2.value)
            } else {
            // Código cuando Storage NO es compatible
            }
            //console.log(selectedOption.value + ': ' + selectedOption.text);
            var loading = document.getElementById('loading');
            loading.style.display = '';
            console.log(selectedOption2.value)
            loadCantos(selectedOption2.value)
        });
        // funcion para cargar canton
        selectCanton.addEventListener('change', function() {
            var selectedOption2 = this.options[selectCanton.selectedIndex];
            if (typeof(Storage) !== 'undefined') {
                //localStorage.setItem('pronvince_id', selectedOption2.value)
            } else {
            // Código cuando Storage NO es compatible
            }
            //console.log(selectedOption.value + ': ' + selectedOption.text);
            var loading = document.getElementById('loading');
            loading.style.display = '';
            console.log(selectedOption2.value)
            loadParish(selectedOption2.value)
        });
        function loadPronvices(country_id){
            axios.post('{{ route("provinces.show")}}', {
            country_id:country_id,
            _token: token
            }).then(function(res) {
                if(res.status==200) {
                    console.log("cargando pronvias");
                    console.log(res.data);
                    selectProvince.innerHTML = res.data;
                    loading.style.display = 'none';
                }
            }).catch(function(err) {
                    console.log(err);
            }).then(function() {
                    loading.style.display = 'none';
            });
        }
        function loadCantos(province_id){
            axios.post('{{ route("cantons.show")}}', {
            _token: token,
            province_id:province_id
            }).then(function(res2) {
                if(res2.status==200) {
                    console.log("cargando cantones");
                    console.log(res2.data);
                    selectCanton.innerHTML = res2.data;
                    loading.style.display = 'none';
                }
            }).catch(function(err) {
                    console.log(err);
            }).then(function() {
                    loading.style.display = 'none';
            });
        }
        function loadParish(canton_id){
            axios.post('{{ route("parishes.show")}}', {
            _token: token,
            canton_id:canton_id
            }).then(function(res2) {
                if(res2.status==200) {
                    console.log("cargando cantones");
                    console.log(res2.data);
                    selectParish.innerHTML = res2.data;
                    loading.style.display = 'none';
                }
            }).catch(function(err) {
                    console.log(err);
            }).then(function() {
                    loading.style.display = 'none';
            });
        }
        //final funciones de ubicacion

        function deleteRooms(idRoomsHotels){
            let formDeleteRooms = document.getElementById("formDeleteRooms");
            formDeleteRooms.setAttribute("action","/admin/travelhotelsdetail/"+idRoomsHotels);
            titleModalDelete.innerHTML = "¡Está seguro de eliminar la habitación!";
            $('#modal-notificacion').modal('show');
        }

        function deleteServicesEstablishment(idServicesEstablishment){
            let titleModalDelete = document.getElementById("titleModalDelete");
            let formDeleteRooms = document.getElementById("formDeleteRooms");
            formDeleteRooms.setAttribute("action","/admin/establishmentservices/"+idServicesEstablishment);
            titleModalDelete.innerHTML = "¡Está seguro de eliminar el Servicio!";
            $('#modal-notificacion').modal('show');
        }

        $(function () {
            bsCustomFileInput.init()

            var Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });

            $('#formEstablisment').validate({
                rules: {
                        name: {
                            required: true,
                            minlength: 2,
                            maxlength: 150
                        },
                        start_date: {
                            required: true,
                            dateISO: true
                        },
                        registry_number: {
                            required: true,
                        },
                        organization_type: {
                            required: true,
                        },
                        local: {
                            required: true,
                        },
                        organization_type: {
                            required: true,
                        },
                        email: {
                            required: true,
                            //email: true
                        },
                        phone: {
                            required: true,
                            number: true,
                            minlength: 8,
                            maxlength: 10
                        },
                        tourist_activity_id: {
                            required: true
                        },
                        classification_id: {
                            required: true
                        },
                        category_id: {
                            required: true
                        },
                        establishment_id: {
                            required: true
                        },
                    },
                messages: {
                    name: {
                        required: "El campo nombre es requerido.",
                        minlength: "Please enter a valid email address",
                        maxlength: "Please enter a valid email address",
                    },
                    start_date: {
                            required: "El campo nombre es requerido.",
                            dateISO: "El campo Fecha de nacimiento no es una fecha válida."
                        },
                        registry_number: {
                            required: "El campo numero de registro es requerido.",
                            number: "El campo numero de registro debe ser un numero valido."
                        },
                        organization_type: {
                            required: "El campo numero de registro es requerido.",
                        },
                        local: {
                            required: "El campo local es requerido.",
                        },
                        organization_type: {
                            required: "El campo local es requerido.",
                        },
                        email: {
                            required: "El campo correo electronico es requerido.",
                           // email: "El formato del correo electronico es inválido.",
                        },
                        phone: {
                            required: "El campo telefono es requerido.",
                            number: "El campo telefono debe ser un numero valido.",
                            minlength: "El campo telefono debe tener al menos 2 numeros.",
                            maxlength: "El campo telefono debe ser menor que 10 numeros.",
                        },
                        tourist_activity_id: {
                            required: "El campo actividad turistica es requerido.",
                        },
                        classification_id: {
                            required: "El campo clasificacion es requerido.",
                        },
                        category_id: {
                            required: "El campo categoria es requerido.",
                        },
                        establishment_id: {
                            required: "El campo Persona/empresa es requerido.",
                        },
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
            @if ($errors->any())
                toastr.error('Revise los campos que son obligatorios');
                @if($errors->has('establishment_id_2'))
                let estab = $('input[name="establishment_id_2"]').val();
                if(estab > 0){
                    selectedPersonEntity(estab,1);
                }
                @else
                let estab = $('input[name="establishment_id_2"]').val();
                if(estab > 0){
                    selectedPersonEntity(estab,1);
                }
                @endif
                @if($errors->has('owner_id_2'))
                let estab2 = $('input[name="owner_id_2"]').val();
                if(estab2 > 0){
                    selectedPersonEntity(estab2,2);
                }
                @else
                let estab2 = $('input[name="owner_id_2"]').val();
                if(estab2 > 0){
                    selectedPersonEntity(estab2,2);
                }
                @endif
                @if($errors->has('legal_representative_id_2'))
                let estab3 = $('input[name="legal_representative_id_2"]').val();
                if(estab3 > 0){
                    selectedPersonEntity(estab3,3);
                }
                @else
                let estab3 = $('input[name="legal_representative_id_2"]').val();
                if(estab3 > 0){
                    selectedPersonEntity(estab3,3);
                }
                @endif

            @endif
            @error('people_entities_id')
                toastr.error('{{$message}}');
            @enderror
            @if (session('status'))
                toastr.success('{{session('status')}}');
            @endif
            $('input[name="start_date"]').daterangepicker({
                locale: {
                    format: "YYYY/MM/DD",
                },
                singleDatePicker: true,
                showDropdowns: true,
                minYear: 1901,
                maxYear: parseInt(moment().format('YYYY'),10)
            });
            var tableRooms = $('#habitacion-table').DataTable({
                "lengthMenu": [ 5, 10],
                "language" : {
                    "url": '{{ url("/js/spanish.json") }}',
                },
                "order": [], //Initial no order
            });
            var tableServices = $('#servicios-table').DataTable({
                "lengthMenu": [ 5, 10],
                "language" : {
                    "url": '{{ url("/js/spanish.json") }}',
                },
                "order": [], //Initial no order
            });
        });
    </script>
@endpush

