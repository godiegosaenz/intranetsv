@extends('layouts.app')
@section('content')
    <x-header title="Registrar establecimiento turistico">
        <li class="breadcrumb-item"><a href="{{ route('establishments.index') }}">Establecimiento turistico</a></li>
        <li class="breadcrumb-item active">Crear</li>
    </x-header>
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header p-2">
                      <ul class="nav nav-pills">
                        <li class="nav-item"><a class="nav-link active" href="#formulario" data-toggle="tab"> Formulario de alojamientos turisticos</a></li>
                        <li class="nav-item"><a class="nav-link" href="#uploadfile" data-toggle="tab"> Requerimientos</a></li>
                      </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                      <div class="tab-content">
                        <div class="active tab-pane" id="formulario">

                            <form id="formEstablisment" action="{{ route('establishments.store') }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <br>
                                        <div class="form-group">
                                            <button id="btnGuardar" class="btn btn-primary" type="button"><i class="fa fa-plus-square"></i> Guardar establecimiento</button>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="cc_ruc"> Selecciona Persona / empresa</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-lg">Buscar</button>
                                            </div>
                                            <!-- /btn-group -->
                                            <input id="establishment_id" name="establishment_id" type="text" class="form-control @error('people_entities_id')is-invalid @enderror" value="">

                                            @error('people_entities_id')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <input id="establishment_id_2" type="hidden" class="form-control @error('people_entities_id')is-invalid @enderror" value="">
                                    </div>
                                    <div class="col-lg-12">
                                        <hr>
                                    </div>
                                    <div class="col-lg-6">

                                        <div class="form-group">
                                            <label for="name2">Nombres/Nombre Comercial</label>
                                            <input type="text" class="form-control" id="name2" value="{{ old('name',$PersonEntityData->name) }}" disabled>

                                        </div>
                                        <div class="form-group">
                                            <label for="last_name">Apellido Paterno/Razon Social</label>
                                            <input type="text" class="form-control" id="last_name" value="{{ old('last_name',$PersonEntityData->last_name) }}" disabled>

                                        </div>


                                        <div class="form-group">
                                            <label for="email2">Correo Electronico</label>
                                            <input type="text" class="form-control" id="email2" value="{{ old('email2',$PersonEntityData->email) }}" disabled>

                                        </div>
                                        <div class="form-group">
                                            <label for="status2">Estado</label>
                                            <input type="text" class="form-control" id="status2" value="{{ old('status',$PersonEntityData->status) }}" disabled>

                                        </div>
                                        <div class="form-group">
                                            <label for="number_phone1">Telefono</label>
                                            <input type="number" class="form-control" id="number_phone1" value="{{ old('number_phone1',$PersonEntityData->number_phone1) }}" disabled>

                                        </div>

                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="country_id">Pais</label>
                                            <input type="text" class="form-control" id="country_id" value="{{ isset($PersonEntityData->countries->name) ? $PersonEntityData->countries->name : '' }}" disabled>

                                        </div>
                                        <div class="form-group">
                                            <label for="province_id">Provincia</label>
                                            <input type="text" class="form-control" id="province_id" value="{{ isset($PersonEntityData->provinces->name) ? $PersonEntityData->provinces->name : ''}}" disabled>

                                        </div>
                                        <div class="form-group">
                                            <label for="canton_id">Canton</label>
                                            <input type="text" class="form-control" id="canton_id" value="{{ isset($PersonEntityData->provinces->name) ? $PersonEntityData->cantons->name : '' }}" disabled>

                                        </div>
                                        <div class="form-group">
                                            <label for="parish_id">Parroquia</label>
                                            <input type="text" class="form-control" id="parish_id" value="{{ isset($PersonEntityData->provinces->name) ? $PersonEntityData->parishes->name : '' }}" disabled>

                                        </div>
                                        <div class="form-group">
                                            <label for="address">Direccion</label>
                                            <input type="text" class="form-control" id="address" value="{{ old('address',$PersonEntityData->address) }}" disabled>

                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <hr>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="name">Nombre de establecimiento *</label>
                                            <input type="text" class="form-control @error('name')is-invalid @enderror" id="name" name="name" value="{{ old('name',$PersonEntityData->name) }}" >
                                            @error('name')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="organization_type">tipo de organizacion *</label>
                                            <input type="text" class="form-control @error('organization_type')is-invalid @enderror" id="organization_type" name="organization_type" value="{{ old('organization_type',$PersonEntityData->name) }}" >
                                            @error('organization_type')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="registry_number">Numero de registro *</label>
                                            <input type="text" class="form-control @error('registry_number')is-invalid @enderror" id="registry_number" name="registry_number" value="{{ old('name',$PersonEntityData->name) }}" >
                                            @error('registry_number')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="cadastral_registry">registro Catastral</label>
                                            <input type="text" class="form-control @error('cadastral_registry')is-invalid @enderror" id="cadastral_registry" name="cadastral_registry" value="{{ old('name',$PersonEntityData->name) }}" >
                                            @error('cadastral_registry')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="web_page">Pagina web</label>
                                            <input type="text" class="form-control @error('web_page')is-invalid @enderror" id="web_page" name="web_page" value="{{ old('name',$PersonEntityData->name) }}" >
                                            @error('web_page')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="phone">Telefono *</label>
                                            <input type="text" class="form-control @error('phone')is-invalid @enderror" id="phone" name="phone" value="{{ old('phone',$PersonEntityData->name) }}" >
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
                                                        @if(Cookie::get('touristActivity_id'))
                                                            @if($cd->id == Cookie::get('touristActivity_id'))
                                                                <option value="{{ $ta->id }}" selected>{{ $ta->name }}</option>
                                                            @else
                                                                <option value="{{ $ta->id }}">{{ $ta->name }}</option>
                                                            @endif

                                                        @else
                                                            <option value="{{ $ta->id }}">{{ $ta->name }}</option>
                                                        @endif
                                                    @endforeach
                                                @endisset
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Clasificacion *</label>
                                            <select id="classification_id" name="classification_id" class="custom-select @error('classification_id') is-invalid @enderror">
                                                <option value="">Seleccione Clasificacion</option>

                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Categoria *</label>
                                            <select id="category_id" name="category_id" class="custom-select @error('category_id') is-invalid @enderror">
                                                <option value="">Seleccione Clasificacion</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Lugar de funcionamiento *</label>
                                            <select id="local" name="local" class="custom-select @error('local') is-invalid @enderror">
                                                <option value="">Seleccione Tipo</option>
                                                <option value="1">propio</option>
                                                <option value="2">arrendado</option>
                                                <option value="3">cedido</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="start_date">Fecha de inicio *</label>
                                            <input type="text" class="form-control" id="start_date" name="start_date" value="{{ old('start_date',$PersonEntityData->name) }}">
                                            @error('start_date')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Correo electronico *</label>
                                            <input type="text" class="form-control" id="email" name="email" value="{{ old('email',$PersonEntityData->name) }}">
                                            @error('email')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="col-lg-12">
                                        <hr>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="cc_ruc"> Propietario</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-lg">Buscar</button>
                                            </div>
                                            <!-- /btn-group -->
                                            <input id="owner_id" name="owner_id" type="text" class="form-control @error('people_entities_id')is-invalid @enderror" value="">

                                            @error('people_entities_id')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <input id="owner_id_2" type="text" class="form-control @error('people_entities_id')is-invalid @enderror" value="">
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="cc_ruc"> Representante legal</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-lg">Buscar</button>
                                            </div>
                                            <!-- /btn-group -->
                                            <input id="legal_representative_id" name="legal_representative_id" type="text" class="form-control @error('people_entities_id')is-invalid @enderror" value="">

                                            @error('legal_representative_id')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <input id="legal_representative_id_2" type="text" class="form-control @error('people_entities_id')is-invalid @enderror" value="">
                                    </div>
                                    <div class="col-lg-12">
                                        <hr>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <div class="form-check">
                                              <input id="has_sewer" name="has_sewer" class="form-check-input" type="checkbox">
                                              <label class="form-check-label">Tiene alcantarillado</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-check">
                                              <input id="has_septic_tank" name="has_septic_tank" class="form-check-input" type="checkbox">
                                              <label class="form-check-label">Tiene pozo septico</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-check">
                                              <input id="has_sewage_treatment_system" name="has_sewage_treatment_system" class="form-check-input" type="checkbox">
                                              <label class="form-check-label">Tiene sistema de tratamiento de aguas servidas</label>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-lg-6">

                                        <div class="form-group">
                                            <label for="">El establecimiento es</label>
                                            <div class="form-check">
                                              <input class="form-check-input" type="radio" name="radio1">
                                              <label class="form-check-label">Matriz</label>
                                            </div>
                                            <div class="form-check">
                                              <input class="form-check-input" type="radio" name="radio1" checked="">
                                              <label class="form-check-label">Sucursal</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-check">
                                              <input id="is_patrimonial" name="is_patrimonial" class="form-check-input" type="checkbox">
                                              <label class="form-check-label">Es patrimonio</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane" id="uploadfile">
                            <div class="card card-primary card-outline">
                                <div class="card-header">
                                  <h3 class="card-title">Inbox</h3>

                                  <div class="card-tools">
                                    <div class="input-group input-group-sm">
                                      <input type="text" class="form-control" placeholder="Search Mail">
                                      <div class="input-group-append">
                                        <div class="btn btn-primary">
                                          <i class="fas fa-search"></i>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <!-- /.card-tools -->
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body p-0">
                                  <div class="mailbox-controls">
                                    <!-- Check all button -->
                                    <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="far fa-square"></i>
                                    </button>
                                    <div class="btn-group">
                                      <button type="button" class="btn btn-default btn-sm"><i class="far fa-trash-alt"></i></button>
                                      <button type="button" class="btn btn-default btn-sm"><i class="fas fa-reply"></i></button>
                                      <button type="button" class="btn btn-default btn-sm"><i class="fas fa-share"></i></button>
                                    </div>
                                    <!-- /.btn-group -->
                                    <button type="button" class="btn btn-default btn-sm"><i class="fas fa-sync-alt"></i></button>
                                    <div class="float-right">
                                      1-50/200
                                      <div class="btn-group">
                                        <button type="button" class="btn btn-default btn-sm"><i class="fas fa-chevron-left"></i></button>
                                        <button type="button" class="btn btn-default btn-sm"><i class="fas fa-chevron-right"></i></button>
                                      </div>
                                      <!-- /.btn-group -->
                                    </div>
                                    <!-- /.float-right -->
                                  </div>
                                  <div class="table-responsive mailbox-messages">
                                    <table class="table table-hover table-striped">
                                      <tbody>
                                      <tr>
                                        <td>
                                          <div class="icheck-primary">
                                            <input type="checkbox" value="" id="check1">
                                            <label for="check1"></label>
                                          </div>
                                        </td>
                                        <td class="mailbox-star"><a href="#"><i class="fas fa-star text-warning"></i></a></td>
                                        <td class="mailbox-name"><a href="read-mail.html">Alexander Pierce</a></td>
                                        <td class="mailbox-subject"><b>AdminLTE 3.0 Issue</b> - Trying to find a solution to this problem...
                                        </td>
                                        <td class="mailbox-attachment"></td>
                                        <td class="mailbox-date">5 mins ago</td>
                                      </tr>
                                      <tr>
                                        <td>
                                          <div class="icheck-primary">
                                            <input type="checkbox" value="" id="check2">
                                            <label for="check2"></label>
                                          </div>
                                        </td>
                                        <td class="mailbox-star"><a href="#"><i class="fas fa-star-o text-warning"></i></a></td>
                                        <td class="mailbox-name"><a href="read-mail.html">Alexander Pierce</a></td>
                                        <td class="mailbox-subject"><b>AdminLTE 3.0 Issue</b> - Trying to find a solution to this problem...
                                        </td>
                                        <td class="mailbox-attachment"><i class="fas fa-paperclip"></i></td>
                                        <td class="mailbox-date">28 mins ago</td>
                                      </tr>
                                      <tr>
                                        <td>
                                          <div class="icheck-primary">
                                            <input type="checkbox" value="" id="check3">
                                            <label for="check3"></label>
                                          </div>
                                        </td>
                                        <td class="mailbox-star"><a href="#"><i class="fas fa-star-o text-warning"></i></a></td>
                                        <td class="mailbox-name"><a href="read-mail.html">Alexander Pierce</a></td>
                                        <td class="mailbox-subject"><b>AdminLTE 3.0 Issue</b> - Trying to find a solution to this problem...
                                        </td>
                                        <td class="mailbox-attachment"><i class="fas fa-paperclip"></i></td>
                                        <td class="mailbox-date">11 hours ago</td>
                                      </tr>
                                      <tr>
                                        <td>
                                          <div class="icheck-primary">
                                            <input type="checkbox" value="" id="check4">
                                            <label for="check4"></label>
                                          </div>
                                        </td>
                                        <td class="mailbox-star"><a href="#"><i class="fas fa-star text-warning"></i></a></td>
                                        <td class="mailbox-name"><a href="read-mail.html">Alexander Pierce</a></td>
                                        <td class="mailbox-subject"><b>AdminLTE 3.0 Issue</b> - Trying to find a solution to this problem...
                                        </td>
                                        <td class="mailbox-attachment"></td>
                                        <td class="mailbox-date">15 hours ago</td>
                                      </tr>
                                      <tr>
                                        <td>
                                          <div class="icheck-primary">
                                            <input type="checkbox" value="" id="check5">
                                            <label for="check5"></label>
                                          </div>
                                        </td>
                                        <td class="mailbox-star"><a href="#"><i class="fas fa-star text-warning"></i></a></td>
                                        <td class="mailbox-name"><a href="read-mail.html">Alexander Pierce</a></td>
                                        <td class="mailbox-subject"><b>AdminLTE 3.0 Issue</b> - Trying to find a solution to this problem...
                                        </td>
                                        <td class="mailbox-attachment"><i class="fas fa-paperclip"></i></td>
                                        <td class="mailbox-date">Yesterday</td>
                                      </tr>
                                      <tr>
                                        <td>
                                          <div class="icheck-primary">
                                            <input type="checkbox" value="" id="check6">
                                            <label for="check6"></label>
                                          </div>
                                        </td>
                                        <td class="mailbox-star"><a href="#"><i class="fas fa-star-o text-warning"></i></a></td>
                                        <td class="mailbox-name"><a href="read-mail.html">Alexander Pierce</a></td>
                                        <td class="mailbox-subject"><b>AdminLTE 3.0 Issue</b> - Trying to find a solution to this problem...
                                        </td>
                                        <td class="mailbox-attachment"><i class="fas fa-paperclip"></i></td>
                                        <td class="mailbox-date">2 days ago</td>
                                      </tr>
                                      <tr>
                                        <td>
                                          <div class="icheck-primary">
                                            <input type="checkbox" value="" id="check7">
                                            <label for="check7"></label>
                                          </div>
                                        </td>
                                        <td class="mailbox-star"><a href="#"><i class="fas fa-star-o text-warning"></i></a></td>
                                        <td class="mailbox-name"><a href="read-mail.html">Alexander Pierce</a></td>
                                        <td class="mailbox-subject"><b>AdminLTE 3.0 Issue</b> - Trying to find a solution to this problem...
                                        </td>
                                        <td class="mailbox-attachment"><i class="fas fa-paperclip"></i></td>
                                        <td class="mailbox-date">2 days ago</td>
                                      </tr>
                                      <tr>
                                        <td>
                                          <div class="icheck-primary">
                                            <input type="checkbox" value="" id="check8">
                                            <label for="check8"></label>
                                          </div>
                                        </td>
                                        <td class="mailbox-star"><a href="#"><i class="fas fa-star text-warning"></i></a></td>
                                        <td class="mailbox-name"><a href="read-mail.html">Alexander Pierce</a></td>
                                        <td class="mailbox-subject"><b>AdminLTE 3.0 Issue</b> - Trying to find a solution to this problem...
                                        </td>
                                        <td class="mailbox-attachment"></td>
                                        <td class="mailbox-date">2 days ago</td>
                                      </tr>
                                      <tr>
                                        <td>
                                          <div class="icheck-primary">
                                            <input type="checkbox" value="" id="check9">
                                            <label for="check9"></label>
                                          </div>
                                        </td>
                                        <td class="mailbox-star"><a href="#"><i class="fas fa-star text-warning"></i></a></td>
                                        <td class="mailbox-name"><a href="read-mail.html">Alexander Pierce</a></td>
                                        <td class="mailbox-subject"><b>AdminLTE 3.0 Issue</b> - Trying to find a solution to this problem...
                                        </td>
                                        <td class="mailbox-attachment"></td>
                                        <td class="mailbox-date">2 days ago</td>
                                      </tr>
                                      <tr>
                                        <td>
                                          <div class="icheck-primary">
                                            <input type="checkbox" value="" id="check10">
                                            <label for="check10"></label>
                                          </div>
                                        </td>
                                        <td class="mailbox-star"><a href="#"><i class="fas fa-star-o text-warning"></i></a></td>
                                        <td class="mailbox-name"><a href="read-mail.html">Alexander Pierce</a></td>
                                        <td class="mailbox-subject"><b>AdminLTE 3.0 Issue</b> - Trying to find a solution to this problem...
                                        </td>
                                        <td class="mailbox-attachment"></td>
                                        <td class="mailbox-date">2 days ago</td>
                                      </tr>
                                      <tr>
                                        <td>
                                          <div class="icheck-primary">
                                            <input type="checkbox" value="" id="check11">
                                            <label for="check11"></label>
                                          </div>
                                        </td>
                                        <td class="mailbox-star"><a href="#"><i class="fas fa-star-o text-warning"></i></a></td>
                                        <td class="mailbox-name"><a href="read-mail.html">Alexander Pierce</a></td>
                                        <td class="mailbox-subject"><b>AdminLTE 3.0 Issue</b> - Trying to find a solution to this problem...
                                        </td>
                                        <td class="mailbox-attachment"><i class="fas fa-paperclip"></i></td>
                                        <td class="mailbox-date">4 days ago</td>
                                      </tr>

                                      </tbody>
                                    </table>
                                    <!-- /.table -->
                                  </div>
                                  <!-- /.mail-box-messages -->
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer p-0">
                                  <div class="mailbox-controls">
                                    <!-- Check all button -->
                                    <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="far fa-square"></i>
                                    </button>
                                    <div class="btn-group">
                                      <button type="button" class="btn btn-default btn-sm"><i class="far fa-trash-alt"></i></button>
                                      <button type="button" class="btn btn-default btn-sm"><i class="fas fa-reply"></i></button>
                                      <button type="button" class="btn btn-default btn-sm"><i class="fas fa-share"></i></button>
                                    </div>
                                    <!-- /.btn-group -->
                                    <button type="button" class="btn btn-default btn-sm"><i class="fas fa-sync-alt"></i></button>
                                    <div class="float-right">
                                      1-50/200
                                      <div class="btn-group">
                                        <button type="button" class="btn btn-default btn-sm"><i class="fas fa-chevron-left"></i></button>
                                        <button type="button" class="btn btn-default btn-sm"><i class="fas fa-chevron-right"></i></button>
                                      </div>
                                      <!-- /.btn-group -->
                                    </div>
                                    <!-- /.float-right -->
                                  </div>
                                </div>
                              </div>
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
                <div id="loading" class="overlay dark" style="display: none">
                    <i class="fas fa-2x fa-sync-alt fa-spin"></i>
                </div>
            </div>

        </div>

      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
@endsection
@push('scripts')
    <script>
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

        function selectedPersonEntity(id){
            axios.post('/admin/peopleentities/'+id+'/get', {
            data: {
            _token: token
            }
            }).then(function(res) {
                if(res.status==200) {
                    console.log("cargando personas...");
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

                    loading.style.display = 'none';
                    $('#modal-lg').modal('hide');
                }
            }).catch(function(err) {

            }).then(function() {
                    loading.style.display = 'none';
            });
        }

        var selectTouristActivity = document.getElementById('tourist_activity_id');
        var selectclassification = document.getElementById('classification_id');
        var selectcategory = document.getElementById('category_id');
        // funcion para cargar actividadturistica
        selectTouristActivity.addEventListener('change', function() {
            var selectedOption = this.options[selectTouristActivity.selectedIndex];
            //console.log(selectedOption.value + ': ' + selectedOption.text);
            var loading = document.getElementById('loading');
            loading.style.display = '';
            loadClassifications(selectedOption.value);
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
                    console.log(err);
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
                    console.log(res.data);
                    selectcategory.innerHTML = res.data;
                    loading.style.display = 'none';
                }
            }).catch(function(err) {
                    console.log(err);
            }).then(function() {
                    loading.style.display = 'none';
            });
        }

        let fieldsArray = ["name","start_date","registry_number","cadastral_registry","organization_type","local","web_page","phone","email","tourist_activity_id","classification_id","category_id","establishment_id"];

        function clearValidation(fieldsArray){
            fieldsArray.forEach(function(key, indice, array) {

                let elementValidation = document.getElementById(key);
                //si existe elemento
                if(!!elementValidation == true){

                    let elementValidation = document.getElementById(key);

                    let divElementParent = document.getElementById(key).parentNode;
                    elementValidation.setAttribute("class", "form-control");

                    let divElementLastChild = divElementParent.lastChild;

                    if(divElementLastChild.nodeName.toLowerCase() == true){
                        divElementParent.removeChild(divElementLastChild);
                    }

                }
            })
        }
        const getLengthOfObject = (obj) => {
          let lengthOfObject = Object.keys(obj).length;
          return lengthOfObject;
          //console.log(lengthOfObject);
        }
        btnGuardar.addEventListener('click', function(e) {
            loading.style.display = '';
            //datos de formulario
            let btnGuardar = document.getElementById('btnGuardar');
            let name = document.getElementById('name').value;
            let start_date = document.getElementById('start_date').value;
            let registry_number = document.getElementById('registry_number').value;
            let cadastral_registry = document.getElementById('cadastral_registry').value;
            let organization_type = document.getElementById('organization_type').value;
            let web_page = document.getElementById('web_page').value;
            let email = document.getElementById('email').value;
            let phone = document.getElementById('phone').value;
            let local = document.getElementById('local').value;
            let tourist_activity_id = document.getElementById('tourist_activity_id').value;
            let classification_id = document.getElementById('classification_id').value;
            let category_id = document.getElementById('category_id').value;
            let has_sewer = document.getElementById("has_sewer").checked;
            let has_sewage_treatment_system = document.getElementById("has_sewage_treatment_system").checked;
            let has_septic_tank = document.getElementById("has_septic_tank").checked;
            let is_patrimonial = document.getElementById("is_patrimonial").checked;
            let establishment_id = document.getElementById("establishment_id").value;

           /* if(yes.checked == true){
                let has_sewer = 1;
            }else{
                let has_sewer = 1;
            }*/



            //envio de formulario
            axios.post('/admin/establishments', {
            name:name,
            start_date:start_date,
            registry_number:registry_number,
            cadastral_registry:cadastral_registry,
            organization_type:organization_type,
            web_page:web_page,
            email:email,
            local:local,
            phone:phone,
            organization_type:organization_type,
            tourist_activity_id:tourist_activity_id,
            classification_id:classification_id,
            category_id:category_id,
            _token:token,
            has_sewer:has_sewer,
            has_sewage_treatment_system:has_sewage_treatment_system,
            has_septic_tank:has_septic_tank,
            is_patrimonial:is_patrimonial,
            establishment_id:establishment_id
            }).then(function(res) {
                clearValidation(fieldsArray);
                if(res.status==200) {
                    console.log("Guardando..");
                    loading.style.display = 'none';

                }
            }).catch(function(err) {
                console.log(err);
              if(err.response.status == 422) {
                  console.log('validacion');
                  toastr.error('Revise los campos que son obligatorios');
                let errorsValidations = err.response.data.errors;
                let contador = getLengthOfObject(errorsValidations);
                clearValidation(fieldsArray);

                for(let key in errorsValidations){

                  if (errorsValidations.hasOwnProperty(key)){
                    let elementValidation = document.getElementById(key);

                    if(!!elementValidation == true){

                      let elementValidation = document.getElementById(key);

                      let divElementParent = document.getElementById(key).parentNode;
                      elementValidation.setAttribute("class", "form-control is-invalid");

                      let spanValidation = document.createElement("span");
                      spanValidation.textContent = errorsValidations[key];
                      spanValidation.setAttribute("class", "error invalid-feedback");

                      let contDivElementParent = divElementParent.childElementCount;
                      if(contDivElementParent < 3){
                        divElementParent.appendChild(spanValidation);
                      }


                    }

                  }
                }
                loading.style.display = 'none';
              }
            }).then(function(err) {
                console.log(err);
              loading.style.display = 'none';
            });
        })
    $(function () {
        var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });
        @if ($errors->any())
            toastr.error('Revise los campos que son obligatorios');
        @endif
        @error('people_entities_id')
            toastr.error('{{$message}}');
        @enderror
        @if (session('status'))
            toastr.success('{{session('status')}}');
        @endisset
        $('#entities-table').DataTable({
            "lengthMenu": [ 5, 10],
            "language" : {
                "url": '{{ url("/js/spanish.json") }}',
            },
            "autoWidth": false,
            "order": [], //Initial no order
            "processing" : true,
            "serverSide": true,
            "ajax": {
                "url" : "{{ route('culturalmanagers.datatablesPersonas') }}",
                "type": "post",
                "data": function (d){
                    d._token = $("input[name=_token]").val();
                }
            },
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
    });

    </script>
@endpush
