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
                <div class="card card-outline">
                    <div class="card-header">
                      <ul class="nav nav-pills">
                        <li class="nav-item"><a class="nav-link active" href="#formulario" data-toggle="tab"> Formulario de establecimientos turisticos</a></li>
                        @if($register == 'yes')
                        <li class="nav-item"><a class="nav-link" href="#uploadfile" data-toggle="tab"> Requerimientos</a></li>
                        @endif
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
                                        <label for="cc_ruc"> Selecciona Persona / empresa *</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                              <button id="modalempresa" type="button" class="btn btn-primary">Buscar</button>
                                            </div>
                                            <!-- /btn-group -->
                                            <input id="establishment_id" name="establishment_id" type="text" class="form-control @error('people_entities_id')is-invalid @enderror" value="{{ old('cc_ruc',isset($establishmentData->people_entities_establishment->cc_ruc) ? $establishmentData->people_entities_establishment->cc_ruc : '') }}">

                                            @error('people_entities_id')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <input id="establishment_id_2" type="hidden" class="form-control @error('people_entities_id')is-invalid @enderror" value="">
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
                                            <input type="text" class="form-control" id="name2" value="{{ old('name',isset($establishmentData->people_entities_establishment->name) ? $establishmentData->people_entities_establishment->name : '') }}" disabled>

                                        </div>
                                        <div class="form-group">
                                            <label for="last_name">Apellido Paterno/Razon Social</label>
                                            <input type="text" class="form-control" id="last_name" value="{{ old('last_name',isset($establishmentData->people_entities_establishment->last_name) ? $establishmentData->people_entities_establishment->last_name : '') }}" disabled>

                                        </div>


                                        <div class="form-group">
                                            <label for="email2">Correo Electronico</label>
                                            <input type="text" class="form-control" id="email2" value="{{ old('email2',isset($establishmentData->people_entities_establishment->email) ? $establishmentData->people_entities_establishment->email : '') }}" disabled>

                                        </div>
                                        <div class="form-group">
                                            <label for="status2">Estado</label>
                                            <input type="text" class="form-control" id="status2" value="{{ old('status',isset($establishmentData->people_entities_establishment->status) ? $establishmentData->people_entities_establishment->status : '') }}" disabled>

                                        </div>
                                        <div class="form-group">
                                            <label for="number_phone1">Telefono</label>
                                            <input type="number" class="form-control" id="number_phone1" value="{{ old('number_phone1',isset($establishmentData->people_entities_establishment->number_phone1) ? $establishmentData->people_entities_establishment->number_phone1 : '') }}" disabled>

                                        </div>

                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="country_id">Pais</label>
                                            <input type="text" class="form-control" id="country_id" value="{{isset($establishmentData->people_entities_owner->countries->name) ? $establishmentData->people_entities_owner->countries->name : ''}}" disabled>

                                        </div>
                                        <div class="form-group">
                                            <label for="province_id">Provincia</label>
                                            <input type="text" class="form-control" id="province_id" value="{{ isset($establishmentData->people_entities_owner->provinces->name) ? $establishmentData->people_entities_owner->provinces->name : ''}}" disabled>

                                        </div>
                                        <div class="form-group">
                                            <label for="canton_id">Canton</label>
                                            <input type="text" class="form-control" id="canton_id" value="{{ isset($establishmentData->people_entities_owner->cantons->name) ? $establishmentData->people_entities_owner->cantons->name : '' }}" disabled>

                                        </div>
                                        <div class="form-group">
                                            <label for="parish_id">Parroquia</label>
                                            <input type="text" class="form-control" id="parish_id" value="{{ isset($establishmentData->people_entities_owner->parishes->name) ? $establishmentData->people_entities_owner->parishes->name : '' }}" disabled>

                                        </div>
                                        <div class="form-group">
                                            <label for="address">Direccion</label>
                                            <input type="text" class="form-control" id="address" value="{{ old('address',isset($establishmentData->people_entities_establishment->address) ? $establishmentData->people_entities_establishment->address : '') }}" disabled>

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

                                        </div>
                                        <div class="form-group">
                                            <label for="phone">Telefono *</label>
                                            <input type="text" class="form-control @error('phone')is-invalid @enderror" id="phone" name="phone" value="{{ old('phone',$establishmentData->phone) }}" >

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
                                                            <option value="{{ $ta->id }}">{{ $ta->name }}</option>
                                                        @endif

                                                    @endforeach
                                                @endisset
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Clasificacion *</label>
                                            <select id="classification_id" name="classification_id" class="custom-select @error('classification_id') is-invalid @enderror">
                                                @isset($establishmentClassification)
                                                    <option value="">Seleccione Clasificacion</option>
                                                    @foreach ($establishmentClassification as $ec)
                                                        @isset($establishmentData->classification_id)
                                                            @if($ec->id == $establishmentData->classification_id)
                                                                <option value="{{ $ec->id }}" selected>{{ $ec->name }}</option>
                                                            @else
                                                                <option value="{{ $ec->id }}">{{ $ec->name }}</option>
                                                            @endif
                                                        @endisset
                                                    @endforeach
                                                @endisset
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Categoria *</label>
                                            <select id="category_id" name="category_id" class="custom-select @error('category_id') is-invalid @enderror">
                                                @isset($establishmentCategory)
                                                    <option value="">Seleccione Categoria</option>
                                                    @foreach ($establishmentCategory as $eca)
                                                        @isset($establishmentData->category_id)
                                                            @if($eca->id == $establishmentData->category_id)
                                                                <option value="{{ $eca->id }}" selected>{{ $eca->name }}</option>
                                                            @else
                                                                <option value="{{ $eca->id }}">{{ $eca->name }}</option>
                                                            @endif
                                                        @endisset
                                                    @endforeach
                                                @endisset
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
                                                    <option value="1">propio</option>
                                                    <option value="2">arrendado</option>
                                                    <option value="3">cedido</option>
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
                                            <input type="text" class="form-control" id="email" name="email" value="{{ old('email',$establishmentData->email) }}">
                                            @error('email')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="col-lg-12">
                                        <hr>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="cc_ruc"> Propietario *</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                              <button id="modalpropietario" type="button" class="btn btn-primary">Buscar</button>
                                            </div>
                                            <!-- /btn-group -->
                                            <input id="owner_id" name="owner_id" type="text" class="form-control @error('people_entities_id')is-invalid @enderror" value="{{ old('name',isset($establishmentData->people_entities_owner->cc_ruc) ? $establishmentData->people_entities_owner->cc_ruc : '') }}">
                                        </div>
                                        <input id="owner_id_2" type="hidden" class="form-control @error('people_entities_id')is-invalid @enderror" value="">
                                        <div class="form-group">
                                            <label for="name_p">Nombres/Nombre Comercial</label>
                                            <input type="text" class="form-control" id="name_p" value="{{ old('name',isset($establishmentData->people_entities_owner->name) ? $establishmentData->people_entities_owner->name : '') }}" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="last_name_p">Apellido Paterno/Razon Social</label>
                                            <input type="text" class="form-control" id="last_name_p" value="{{ old('name',isset($establishmentData->people_entities_owner->last_name) ? $establishmentData->people_entities_owner->last_name : '') }}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="cc_ruc"> Representante legal *</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                              <button id="modalrepresentante" type="button" class="btn btn-primary">Buscar</button>
                                            </div>
                                            <!-- /btn-group -->
                                            <input id="legal_representative_id" name="legal_representative_id" type="text" class="form-control @error('people_entities_id')is-invalid @enderror" value="{{ old('name',isset($establishmentData->people_entities_legal_representative->cc_ruc) ? $establishmentData->people_entities_legal_representative->cc_ruc : '') }}">

                                            @error('legal_representative_id')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <input id="legal_representative_id_2" type="hidden" class="form-control @error('people_entities_id')is-invalid @enderror" value="">
                                        <div class="form-group">
                                            <label for="name_r">Nombres/Nombre Comercial</label>
                                            <input type="text" class="form-control" id="name_r" value="{{ old('name',isset($establishmentData->people_entities_legal_representative->name) ? $establishmentData->people_entities_legal_representative->name : '') }}" disabled>

                                        </div>
                                        <div class="form-group">
                                            <label for="last_name_r">Apellido Paterno/Razon Social</label>
                                            <input type="text" class="form-control" id="last_name_r" value="{{ old('name',isset($establishmentData->people_entities_legal_representative->last_name) ? $establishmentData->people_entities_legal_representative->last_name : '') }}" disabled>
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

                                        <div class="form-group">
                                            <label for="">El establecimiento es</label>
                                            <div class="form-check">
                                                @if($register == 'yes')
                                                <input class="form-check-input" type="radio" name="is_main" value="m" {{ $establishmentData->is_main == true ? 'checked' : '' }}>
                                                @else
                                                <input class="form-check-input" type="radio" name="is_main" value="m" checked>
                                                @endif
                                                <label class="form-check-label">Matriz</label>
                                            </div>
                                            <div class="form-check">
                                              <input class="form-check-input" type="radio" name="is_main" value="s" {{ $establishmentData->is_branch == true ? 'checked' : '' }}>
                                              <label class="form-check-label">Sucursal</label>
                                            </div>
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
                        @if($register == 'yes')
                        <div class="tab-pane" id="uploadfile">
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
                        @endif
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

            </div>

        </div>

      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
    @if($register == 'yes')
        @foreach ($requirementEstablishment as $rta)
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

                        <div class="form-group">
                            <label for="InputFile{{$rta->id}}">Subir archivo</label>
                            <div class="input-group">
                              <div class="custom-file">
                                <input type="file" class="custom-file-input" id="InputFile{{$rta->id}}" lang="es">
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

        let name_p = document.getElementById('name_p');
        let last_name_p = document.getElementById('last_name_p');
        let name_r = document.getElementById('name_r');
        let last_name_r = document.getElementById('last_name_r');
        let legal_representative_id_2 = document.getElementById('legal_representative_id_2');
        let legal_representative_id = document.getElementById('legal_representative_id');
        let owner_id_2 = document.getElementById('owner_id_2');
        let owner_id = document.getElementById('owner_id');

        @if($register == 'yes')
            @foreach ($requirementEstablishment as $rta)
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
                                toastr.success('Archivo cargado con exito');
                                loading.style.display = 'none';
                                $('#modal-{{$rta->id}}').modal('hide');
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
                            toastr.error('Revise la validacion del archivo');

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
        var modalempresa = document.getElementById('modalempresa');
        var modalpropietario = document.getElementById('modalpropietario');
        var modalrepresentante = document.getElementById('modalrepresentante');
        //cargar modal persona
        modalempresa.addEventListener('click', function(e) {
            document.getElementById('numbermodal').value = 1;
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

        let fieldsArray = ["name","start_date","registry_number","cadastral_registry","organization_type","local","web_page","phone","email","tourist_activity_id","classification_id","category_id","establishment_id","owner_id","legal_representative_id"];

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
                       // divElementParent.removeChild(divElementLastChild);
                        //console.log(divElementLastChild);
                    }

                }
            })
        }

        function viewValidacion(errorsValidations){
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
            let establishment_id = document.getElementById("establishment_id_2").value;
            let owner_id = document.getElementById("owner_id_2").value;
            let legal_representative_id = document.getElementById("legal_representative_id_2").value;
            const rbs = document.querySelectorAll('input[name="is_main"]');
            let selectedValue;
            for (const rb of rbs) {
                if (rb.checked) {
                    selectedValue = rb.value;
                    break;
                }
            }

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
            establishment_id:establishment_id,
            owner_id:owner_id,
            legal_representative_id:legal_representative_id,
            selectedValue:selectedValue
            }).then(function(res) {
                clearValidation(fieldsArray);
                if(res.status==200) {
                    console.log("Guardando..");

                    loading.style.display = 'none';
                    if(res.data.saved == 'ok'){
                        window.location.href = '/admin/establishments/create/'+res.data.id;
                    }
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
                    console.log('regla + '+ errorsValidations[key])

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

              if(err.response.status == 500){
                toastr.error('Error al comunicarse con el servidor, contacte al administrador de Sistemas');
                console.log('error al consultar al servidor');
              }

              if(err.response.status == 419){
                toastr.error('Es posible que tu session haya caducado, vuelve a iniciar sesion');
                console.log('Es posible que tu session haya caducado, vuelve a iniciar sesion');
              }

            }).then(function(err) {
                console.log(err);
              loading.style.display = 'none';
            });
        })
    $(function () {
        bsCustomFileInput.init()
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
        @if ($register == 'yes')
            toastr.success('El establecimiento ha sido registrado con exito');
        @endif
        let tableentities = $('#entities-table').DataTable({
            "lengthMenu": [ 5, 10],
            "language" : {
                "url": '{{ url("/js/spanish.json") }}',
            },
            "autoWidth": false,
            "order": [], //Initial no order
            "processing" : true,
            "serverSide": true,
            "ajax": {
                "url" : "{{ route('establishments.datatablesPersonas') }}",
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
        @if($register == 'yes')
        cargardatatablesRequerimientos();
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
    });

    </script>
@endpush
