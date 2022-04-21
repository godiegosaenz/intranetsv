@extends('layouts.app')
@section('content')
    <x-header title="Actualizar establecimiento turistico">
        <li class="breadcrumb-item"><a href="{{ route('establishments.index') }}">Establecimiento turistico</a></li>
        <li class="breadcrumb-item active">Editar</li>
    </x-header>
    <section class="content">
        <div class="container-fluid">
        <div class="row">
            @if (session('status'))
                <div class="col-md-12">
                    <div class="alert alert-success">
                        {{session('status')}}
                    </div>
                </div>
            @endisset
            @if ($errors->any())

                <div class="col-md-12">
                    <div class="alert alert-danger">
                        {{$errors->first()}}
                    </div>
                </div>

            @endif
        </div>
            <!-- /.row -->
        <div class="row">
            <div class="col-md-12">
              <div class="card card-default">
                <div class="card-header">
                  <h3 class="card-title">Establecimiento</h3>
                </div>
                <div class="card-body p-0">
                  <div id="stepper1" class="bs-stepper">
                    <div class="bs-stepper-header" role="tablist">
                      <!-- your steps here -->
                      <div class="step" data-target="#logins-part">
                        <button type="button" class="step-trigger" role="tab" aria-controls="logins-part" id="logins-part-trigger">
                          <span class="bs-stepper-circle">1</span>
                          <span class="bs-stepper-label">Informacion</span>
                        </button>
                      </div>
                      <div class="line"></div>
                      <div class="step" data-target="#information-part">
                        <button type="button" class="step-trigger" role="tab" aria-controls="information-part" id="information-part-trigger">
                          <span class="bs-stepper-circle">2</span>
                          <span class="bs-stepper-label">adicional</span>
                        </button>
                      </div>
                      <div class="line"></div>
                      <div class="step" data-target="#requirement-part">
                        <button type="button" class="step-trigger" role="tab" aria-controls="requirement-part" id="requirement-part-trigger">
                          <span class="bs-stepper-circle">3</span>
                          <span class="bs-stepper-label">Requerimientos</span>
                        </button>
                      </div>
                    </div>
                    <div class="bs-stepper-content">
                      <!-- your steps content here -->
                      <div id="logins-part" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">
                        <!-- formulario de informacion -->
                        <form id="formEstablisment" action="{{ route('establishments.update',$establishmentData) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-lg-6">
                                    <br>
                                    <div class="form-group">
                                        <button id="btnGuardar" class="btn btn-primary" type="button"><i class="fa fa-plus-square"></i> Guardar </button>
                                        @if($establishmentData->register >= 1)
                                        <button id="btnSiguiente" class="btn btn-secondary" type="button" onclick="stepnext()"><i class="fa fa-arrow-right"></i> Siguiente </button>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label for="cc_ruc"> Selecciona Persona / empresa *</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                          <button id="modalempresa" type="button" class="btn btn-primary">Buscar</button>
                                        </div>
                                        <!-- /btn-group -->
                                        <input id="establishment_id" name="establishment_id" type="text" class="form-control @error('people_entities_id')is-invalid @enderror" value="{{ old('establishment_id',isset($establishmentData->people_entities_establishment->cc_ruc) ? $establishmentData->people_entities_establishment->cc_ruc : '') }}" disabled>

                                        @error('people_entities_id')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <input id="establishment_id_2" name="establishment_id_2" type="hidden" class="form-control @error('people_entities_id')is-invalid @enderror" value="{{ old('establishment_id_2',isset($establishmentData->people_entities_establishment->id) ? $establishmentData->people_entities_establishment->id : '') }}">
                                    <input id="numbermodal" type="hidden" class="form-control" value="1">
                                </div>
                                <div class="col-lg-12">
                                    <br>
                                    <h5>Datos de personas/empresas</h5>
                                    <hr>

                                </div>
                                <div class="col-lg-6">

                                    <div class="form-group">
                                        <label for="name2">Nombres/Nombre Comercial</label>
                                        <input type="text" class="form-control" id="name2" name="name2" value="{{ old('name2',isset($establishmentData->people_entities_establishment->name) ? $establishmentData->people_entities_establishment->name : '') }}" disabled>

                                    </div>
                                    <div class="form-group">
                                        <label for="last_name">Apellido Paterno/Razon Social</label>
                                        <input type="text" class="form-control" id="last_name" name="last_name" value="{{ old('last_name',isset($establishmentData->people_entities_establishment->last_name) ? $establishmentData->people_entities_establishment->last_name : '') }}" disabled>

                                    </div>


                                    <div class="form-group">
                                        <label for="email2">Correo Electronico</label>
                                        <input type="text" class="form-control" id="email2" name="email2" value="{{ old('email2',isset($establishmentData->people_entities_establishment->email) ? $establishmentData->people_entities_establishment->email : '') }}" disabled>

                                    </div>
                                    <div class="form-group">
                                        <label for="status2">Estado</label>
                                        <input type="text" class="form-control" id="status2" name="status2" value="{{ old('status',isset($establishmentData->people_entities_establishment->status) ? $establishmentData->people_entities_establishment->status : '') }}" disabled>

                                    </div>
                                    <div class="form-group">
                                        <label for="number_phone1">Telefono</label>
                                        <input type="number" class="form-control" id="number_phone1" name="number_phone1"  value="{{ old('number_phone1',isset($establishmentData->people_entities_establishment->number_phone1) ? $establishmentData->people_entities_establishment->number_phone1 : '') }}" disabled>

                                    </div>

                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="country_id">Pais</label>
                                        <input type="text" class="form-control" id="country_id" name="country_id" value="{{old('country_id',isset($establishmentData->people_entities_establishment->countries->name) ? $establishmentData->people_entities_establishment->countries->name : '')}}" disabled>

                                    </div>
                                    <div class="form-group">
                                        <label for="province_id">Provincia</label>
                                        <input type="text" class="form-control" id="province_id" name="province_id" value="{{old('province_id', isset($establishmentData->people_entities_establishment->provinces->name) ? $establishmentData->people_entities_establishment->provinces->name : '')}}" disabled>

                                    </div>
                                    <div class="form-group">
                                        <label for="canton_id">Canton</label>
                                        <input type="text" class="form-control" id="canton_id" name="canton_id" value="{{ old('canton_id',isset($establishmentData->people_entities_establishment->cantons->name) ? $establishmentData->people_entities_establishment->cantons->name : '')}}" disabled>

                                    </div>
                                    <div class="form-group">
                                        <label for="parish_id">Parroquia</label>
                                        <input type="text" class="form-control" id="parish_id" name="parish_id" value="{{ old('parish_id',isset($establishmentData->people_entities_establishment->parishes->name) ? $establishmentData->people_entities_establishment->parishes->name : '')}}" disabled>

                                    </div>
                                    <div class="form-group">
                                        <label for="address">Direccion</label>
                                        <input type="text" class="form-control" id="address" name="address" value="{{ old('address',isset($establishmentData->people_entities_establishment->address) ? $establishmentData->people_entities_establishment->address : '') }}" disabled>

                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <br>
                                    <h5>Datos de establesimiento</h5>
                                    <hr>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="name">Nombre de establecimiento *</label>
                                        <input type="text" class="form-control @error('name')is-invalid @enderror" id="name" name="name" value="{{ old('name',$establishmentData->name) }}" >
                                        @error('name')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="organization_type">tipo de organizacion *</label>
                                        <input type="text" class="form-control @error('organization_type')is-invalid @enderror" id="organization_type" name="organization_type" value="{{ old('organization_type',$establishmentData->organization_type) }}" >
                                        @error('organization_type')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="registry_number">Numero de registro *</label>
                                        <input type="text" class="form-control @error('registry_number')is-invalid @enderror" id="registry_number" name="registry_number" value="{{ old('registry_number',$establishmentData->registry_number) }}" >
                                        @error('registry_number')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="cadastral_registry">registro Catastral</label>
                                        <input type="text" class="form-control @error('cadastral_registry')is-invalid @enderror" id="cadastral_registry" name="cadastral_registry" value="{{ old('cadastral_registry',$establishmentData->cadastral_registry) }}" >
                                        @error('cadastral_registry')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="web_page">Pagina web</label>
                                        <input type="text" class="form-control @error('web_page')is-invalid @enderror" id="web_page" name="web_page" value="{{ old('web_page',$establishmentData->web_page) }}" >
                                        @error('web_page')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">Telefono *</label>
                                        <input type="text" class="form-control @error('phone')is-invalid @enderror" id="phone" name="phone" value="{{ old('phone',$establishmentData->phone) }}" >
                                        @error('phone')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Actividad turistica *</label>
                                        <select id="tourist_activity_id" name="tourist_activity_id" class="custom-select @error('tourist_activity_id') is-invalid @enderror">
                                            @isset($touristActivity)
                                                <option value="">Seleccione Actividad</option>
                                                @foreach ($touristActivity as $ta)
                                                    @if(isset($establishmentData->tourist_activity_id))
                                                        @if($ta->id == $establishmentData->tourist_activity_id)
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
                                    </div>
                                    <div class="form-group">
                                        <label>Clasificacion *</label>
                                        <select id="classification_id" name="classification_id" class="custom-select @error('classification_id') is-invalid @enderror">
                                            <option value="">Seleccione Clasificacion</option>
                                            @if($register or Cookie::get('classification_id'))
                                                @if ($register == 'yes')
                                                    @foreach ($establishmentClassification as $ec)
                                                        @if($ec->id == $establishmentData->classification_id)
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
                                    </div>
                                    <div class="form-group">
                                        <label>Categoria *</label>
                                        <select id="category_id" name="category_id" class="custom-select @error('category_id') is-invalid @enderror">
                                            <option value="">Seleccione Categoria</option>
                                            @if($register or Cookie::get('classification_id'))
                                                @if ($register == 'yes')
                                                    @foreach ($establishmentCategory as $eca)
                                                        @isset($establishmentData->category_id)
                                                            @if($eca->id == $establishmentData->category_id)
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
                                    </div>
                                    <div class="form-group">
                                        <label>Lugar de funcionamiento *</label>
                                        <select id="local" name="local" class="custom-select @error('local') is-invalid @enderror">
                                            <option value="">Seleccione Tipo</option>
                                            @if ($establishmentData->local == 1)
                                                <option value="1" selected>propio</option>
                                                <option value="2">arrendado</option>
                                                <option value="3">cedido</option>
                                            @elseif($establishmentData->local == 2)
                                                <option value="1">propio</option>
                                                <option value="2" selected>arrendado</option>
                                                <option value="3">cedido</option>
                                            @elseif($establishmentData->local == 3)
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
                                        <label for="start_date">Fecha Nacimiento:</label>

                                        <div class="input-group">
                                          <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                          </div>
                                          <input type="text" class="form-control" id="start_date" name="start_date" value="{{ old('start_date',$establishmentData->start_date) }}" required/>
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Correo electronico *</label>
                                        <input type="text" class="form-control @error('email')is-invalid @enderror" id="email" name="email" value="{{ old('email',$establishmentData->email) }}">
                                        @error('email')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>
                                <div class="col-lg-12">
                                    <hr>
                                </div>
                                <div class="col-lg-6">
                                    <label for="cc_ruc"> Propietario </label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                          <button id="modalpropietario" type="button" class="btn btn-primary">Buscar</button>
                                        </div>
                                        <!-- /btn-group -->
                                        <input id="owner_id" name="owner_id" type="text" class="form-control @error('people_entities_id')is-invalid @enderror" value="{{ old('owner_id',isset($establishmentData->people_entities_owner->cc_ruc) ? $establishmentData->people_entities_owner->cc_ruc : '') }}">
                                    </div>
                                    <input id="owner_id_2" type="hidden" class="form-control @error('people_entities_id')is-invalid @enderror" value="">
                                    <div class="form-group">
                                        <label for="name_p">Nombres/Nombre Comercial</label>
                                        <input type="text" class="form-control" id="name_p" value="{{ old('name_p',isset($establishmentData->people_entities_owner->name) ? $establishmentData->people_entities_owner->name : '') }}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="last_name_p">Apellido Paterno/Razon Social</label>
                                        <input type="text" class="form-control" id="last_name_p" name="last_name_p" value="{{ old('last_name_p',isset($establishmentData->people_entities_owner->last_name) ? $establishmentData->people_entities_owner->last_name : '') }}" disabled>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label for="cc_ruc"> Representante legal </label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                          <button id="modalrepresentante" type="button" class="btn btn-primary">Buscar</button>
                                        </div>
                                        <!-- /btn-group -->
                                        <input id="legal_representative_id" name="legal_representative_id" type="text" class="form-control @error('people_entities_id')is-invalid @enderror" value="{{ old('legal_representative_id',isset($establishmentData->people_entities_legal_representative->cc_ruc) ? $establishmentData->people_entities_legal_representative->cc_ruc : '') }}">

                                        @error('legal_representative_id')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <input id="legal_representative_id_2" name="legal_representative_id_2" type="hidden" class="form-control @error('people_entities_id')is-invalid @enderror" value="{{ old('legal_representative_id_2')}}">
                                    <div class="form-group">
                                        <label for="name_r">Nombres/Nombre Comercial</label>
                                        <input type="text" class="form-control" id="name_r" name="name_r" value="{{ old('name_r',isset($establishmentData->people_entities_legal_representative->name) ? $establishmentData->people_entities_legal_representative->name : '') }}" disabled>

                                    </div>
                                    <div class="form-group">
                                        <label for="last_name_r">Apellido Paterno/Razon Social</label>
                                        <input type="text" class="form-control" id="last_name_r" value="{{ old('last_name_r',isset($establishmentData->people_entities_legal_representative->last_name) ? $establishmentData->people_entities_legal_representative->last_name : '') }}" disabled>
                                    </div>
                                </div>
                            </div>
                        </form>
                      </div>
                      <div id="information-part" class="content" role="tabpanel" aria-labelledby="information-part-trigger">
                        <form id="formEstablismentstep2" action="{{ route('establishments.storestep2',['id' => $establishmentData->id]) }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <br>
                                    <div class="form-group">
                                        <button id="btnGuardarstep2" class="btn btn-primary" type="button"><i class="fa fa-plus-square"></i> Guardar </button>
                                        <button id="btnstep2" class="btn btn-secondary" type="button" onclick="stepprevious()"><i class="fa fa-arrow-left"></i> Anterior </button>
                                        <button id="btnstepnext3" class="btn btn-secondary" type="button" onclick="stepnext()"><i class="fa fa-arrow-right"></i> Siguiente </button>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <hr>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <div class="form-check">
                                          <input id="has_sewer" name="has_sewer" class="form-check-input" type="checkbox" {{ $establishmentData->has_sewer == true ? 'checked' : '' }}>
                                          <label class="form-check-label">Tiene alcantarillado</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check">
                                          <input id="has_septic_tank" name="has_septic_tank" class="form-check-input" type="checkbox" {{ $establishmentData->has_septic_tank == true ? 'checked' : '' }}>
                                          <label class="form-check-label">Tiene pozo septico</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check">
                                          <input id="has_sewage_treatment_system" name="has_sewage_treatment_system" class="form-check-input" type="checkbox" {{ $establishmentData->has_sewage_treatment_system == true ? 'checked' : '' }}>
                                          <label class="form-check-label">Tiene sistema de tratamiento de aguas servidas</label>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-lg-6">
                                    <label for="">El establecimiento es</label>
                                    <div class="form-group">
                                        @if($register == 'yes')
                                            @if($establishmentData->is_main == true)
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="is_main" value="m" checked>
                                                    <label class="form-check-label">Matriz</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="is_main" value="s">
                                                    <label class="form-check-label">Sucursal</label>
                                                </div>
                                            @else
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="is_main" value="m">
                                                    <label class="form-check-label">Matriz</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="is_main" value="s" checked>
                                                    <label class="form-check-label">Sucursal</label>
                                                </div>
                                            @endif
                                        @else
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="is_main" value="m">
                                                <label class="form-check-label">Matriz</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="is_main" value="s" checked>
                                                <label class="form-check-label">Sucursal</label>
                                            </div>
                                        @endif


                                    </div>
                                    <div class="form-group">
                                        <div class="form-check">
                                          <input id="is_patrimonial" name="is_patrimonial" class="form-check-input" type="checkbox" {{ $establishmentData->is_patrimonial == true ? 'checked' : '' }}>
                                          <label class="form-check-label">Es patrimonio</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </form>
                      </div>
                        <div id="requirement-part" class="content" role="tabpanel" aria-labelledby="requirement-part-trigger">
                            <div class="row">
                                <div class="col-lg-6">
                                    <br>
                                    <div class="form-group">

                                        <button id="btnstep3" class="btn btn-secondary" type="button" onclick="stepprevious()"><i class="fa fa-arrow-left"></i> Anterior </button>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <hr>
                                </div>
                                <div class="col-lg-12">
                                    <table id="requirements-table" class="table table-sm table-bordered table-hover">
                                        <thead>
                                            <tr>
                                            <th>Requerimiento</th>
                                            <th>Descripcion</th>
                                            <th>Tipo de Archivo</th>
                                            <th style="width: 40px">Estado</th>
                                            <th>Accion</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                  </div>
                </div>
                <div id="loading" class="overlay dark" style="display: none">
                    <i class="fas fa-2x fa-sync-alt fa-spin"></i>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  Visit <a href="https://github.com/Johann-S/bs-stepper/#how-to-use-it">bs-stepper documentation</a> for more examples and information about the plugin.
                </div>
              </div>
              <!-- /.card -->
            </div>
          </div>
        </div>
    </section>
    <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Seleccione Persona/empresa</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                        @csrf
                        <table id="entities-table" class="table table-sm table-bordered table-hover">
                            <thead>
                            <tr>
                              <th>Cedula/Ruc</th>
                              <th>Nombres</th>
                              <th>Apellido 1</th>
                              <th>Apellido 2</th>
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
                              <th>Nombres</th>
                              <th>Apellido 1</th>
                              <th>Apellido 2</th>
                              <th>Estado</th>
                              <th>Correo</th>
                              <th>Acciones</th>
                            </tr>
                            </tfoot>
                        </table>

                    </div>
                    <div id="loading_modal" class="overlay dark" style="display: none">
                        <i class="fas fa-2x fa-sync-alt fa-spin"></i>
                    </div>

                </div>

            </div>

          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    @if($register == 'yes')
        @foreach ($establishmentData->requirements as $rta)
        <div class="modal fade" id="modal-{{$rta->id}}">
            <div class="modal-dialog modal-md">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Cargar {{$rta->name}}</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <form method="post" id="form{{$rta->id}}" action="{{ route('establishmentrequirement.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="InputFile{{$rta->id}}">Subir archivo</label>
                            <div class="input-group">
                              <div class="custom-file">
                                <input type="file" class="custom-file-input" id="InputFile{{$rta->id}}" name="InputFile" lang="es">
                                <label class="custom-file-label" for="InputFile{{$rta->id}}">Elija el archivo</label>
                              </div>
                              <div class="input-group-append">
                                <span class="input-group-text" id="">Subir</span>
                              </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" id="btnFile-{{$rta->id}}" class="btn btn-primary">Guardar Archivo</button>
                        </div>
                    </form>

                </div>

              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
        @endforeach
    @endif
@endsection
@push('scripts')
    <script>
        var stepper = new Stepper(document.querySelector('#stepper1'))
        @if(Cookie::get('step') == 1)
        stepper.to(1);
        @elseif(Cookie::get('step') == 2)
        stepper.to(2);
        @elseif(Cookie::get('step') == 3)
        stepper.to(3);
        @else
        stepper.to(1);
        @endif
        function stepnext(){
            stepper.next()
        }
        function stepprevious(){
            stepper.previous()
        }
        //datos organizacion
        let establishment_id = document.getElementById('establishment_id');
        let name2 = document.getElementById('name2');
        let last_name = document.getElementById('last_name');
        let email2 = document.getElementById('email2');
        let status = document.getElementById('status2');
        let address = document.getElementById('address');
        let number_phone1 = document.getElementById('number_phone1');
        let country_id = document.getElementById('country_id');
        let province_id = document.getElementById('province_id');
        let canton_id = document.getElementById('canton_id');
        let parish_id = document.getElementById('parish_id');
        let establishment_id_2 = document.getElementById('establishment_id_2');

        let token = "{{csrf_token()}}";
        let loading = document.getElementById('loading');
        let loading_modal = document.getElementById('loading_modal');
        var selectTouristActivity = document.getElementById('tourist_activity_id');
        var selectclassification = document.getElementById('classification_id');
        var selectcategory = document.getElementById('category_id');

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
        let tableentities = $('#entities-table').DataTable({
                "lengthMenu": [ 5, 10],
                "language" : {
                    "url": '{{ url("/js/spanish.json") }}',
                },
                "processing" : true,

                "autoWidth": false,
                "order": [], //Initial no order
                "columns": [
                    {data: 'cc_ruc'},
                    {data: 'name'},
                    {data: 'last_name'},
                    {data: 'maternal_last_name'},
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
                    tableentities.clear().draw();
                    let d = res.data;
                    tableentities.rows.add(d.data).draw();
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
            axios.post('/admin/establishmentclassification/'+tourist_activity_id, {
            data: {
            _token: token,
            }
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
            axios.post('/admin/establishmentcategory/'+classification_id, {
            data: {
            _token: token
            }
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
        function selectedPersonEntity(id){
            let modal = document.getElementById("numbermodal").value;
            axios.post('/admin/peopleentities/'+id+'/get', {
            data: {
            _token: token
            }
            }).then(function(res) {
                if(res.status==200) {
                    console.log("cargando personas..."+modal);
                    //let modal = document.getElementById("numbermodal");
                    if(modal == 1){
                        console.log(modal);
                        establishment_id.value = res.data.cc_ruc;
                        name2.value = res.data.name;
                        email2.value = res.data.email;
                        number_phone1.value = res.data.number_phone1;
                        last_name.value = res.data.last_name+' '+res.data.maternal_last_name;
                        status.value = res.data.status;
                        address.value = res.data.address;
                        country_id.value = res.data.countries.name;
                        province_id.value = res.data.provinces.name;
                        canton_id.value = res.data.cantons.name;
                        parish_id.value = res.data.parishes.name;
                        establishment_id_2.value = res.data.id;
                    }else if(modal == 2){
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
        btnGuardar.addEventListener('click', function(e) {
            $('#formEstablisment').submit();
        })

        btnGuardarstep2.addEventListener('click', function(e) {
            $('#formEstablismentstep2').submit();
        })

        @if($register == 'yes')
            @foreach ($establishmentData->requirements as $rta)
                function viewmodal{{$rta->id}}(){
                    $('#modal-{{$rta->id}}').modal('show');
                }

                /*var modal{{$rta->id}} = document.getElementById('btnModal{{$rta->id}}');
                modal{{$rta->id}}.addEventListener('click', function(e) {
                    $('#modal-{{$rta->id}}').modal('show');
                });*/

                var btnFile{{$rta->id}} = document.getElementById('btnFile-{{$rta->id}}');
                var form{{$rta->id}} = document.getElementById('form{{$rta->id}}');
                //cargar modal persona
                form{{$rta->id}}.addEventListener('submit', function(e) {
                    var loading = document.getElementById('loading');
                    loading.style.display = '';
                    e.preventDefault()
                    let InputFile= document.getElementById('InputFile{{$rta->id}}').files[0];
                    let formData = new FormData(this);
                    formData.append('_token',token);
                    formData.append('requirement_id',{{$rta->pivot->requirement_id}});
                    formData.append('establishment_id',{{$rta->pivot->establishment_id}});
                    formData.append('InputFile',InputFile);
                    axios.post('/admin/establishmentrequirement',formData).then(function(res) {
                        if(res.status==200) {
                            if(res.data.success == true){
                                console.log("guardando ..");
                                requirementstable.ajax.reload();
                                $('#modal-{{$rta->id}}').modal('hide');
                                loading.style.display = 'none';
                                toastr.success('El archivo, se subió correctamente');
                            }else{
                                toastr.error('Error al comunicarse con el servidor, contacte al administrador de Sistemas');
                                console.log('error al consultar al servidor');
                            }

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
                        if(err.response.status == 422){
                            console.log(err.response.data.errors);
                            toastr.error(err.response.data.errors['InputFile']);

                        }
                    }).then(function() {
                            loading.style.display = 'none';
                    });
                });
            @endforeach

            var requirementstable = $('#requirements-table').DataTable({
                    "lengthMenu": [ 5, 10],
                    "language" : {
                        "url": '{{ url("/js/spanish.json") }}',
                    },
                    "autoWidth": false,
                    "order": [], //Initial no order
                    "processing" : true,
                    "serverSide": true,
                    "ajax": {
                        "url" : "{{ route('establishmentrequirement.datatables', ['id' => $establishmentData->id]) }}",
                        "type": "post",
                        "data": function (d){
                            d._token = $("input[name=_token]").val();
                        }
                    },
                    "columns": [
                        {data: 'name'},
                        {data: 'Description'},
                        {data: 'type_document'},
                        {data: 'status'},
                        {data: 'action', name: 'action', orderable: false, searchable: false},
                    ]
                });
        @endif

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
                            number: true
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
                selectedPersonEntity($('input[name="establishment_id_2"]').val());
            @endif
            @error('people_entities_id')
                toastr.error('{{$message}}');
            @enderror
            @if (session('status'))
                toastr.success('{{session('status')}}');
            @endisset
            $('input[name="start_date"]').daterangepicker({
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
