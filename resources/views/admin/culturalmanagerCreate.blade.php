@extends('layouts.app')
@section('content')
    <x-header title="Crear Gestor Cultural">
        <li class="breadcrumb-item"><a href="{{ route('culturalmanagers.index') }}">Gestor Cultural</a></li>
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
                            <form action="{{ route('culturalmanagers.store') }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <br>
                                        <div class="form-group">
                                            <button class="btn btn-primary" type="submit"><i class="fa fa-plus-square"></i> Guardar gestor cultural</button>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="cc_ruc"> Selecciona Persona / empresa</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-lg">Buscar</button>
                                            </div>
                                            <!-- /btn-group -->
                                            <input id="cc_ruc" name="cc_ruc" type="text" class="form-control @error('people_entities_id')is-invalid @enderror" value="{{ old('cc_ruc') }}">
                                            @error('people_entities_id')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <hr>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>*Tipo de Actividad</label>
                                            <select id="type_activities_id" name="type_activities_id" class="custom-select @error('type_activities_id') is-invalid @enderror">
                                                <option value="">Seleccione Tipo</option>
                                                @isset($TypeActivity)
                                                    @foreach ($TypeActivity as $ta)
                                                        <option value="{{$ta->id}}" {{ old('type_activities_id') == $ta->id ? 'selected' : '' }}>{{$ta->name}}</option>
                                                    @endforeach
                                                @endisset
                                            </select>
                                            @error('type_activities_id')
                                                <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input type="hidden" class="form-control" id="people_entities_id" name="people_entities_id" value="{{ old('people_entities_id') }}" />

                                        </div>
                                        <div class="form-group">
                                            <label>*Ambito de Actividad</label>
                                            <select id="scope_activities_id" name="scope_activities_id" class="custom-select @error('scope_activities_id') is-invalid @enderror">
                                                <option value="">Seleccione Ambito</option>
                                                @isset($ScopeActivity)
                                                    @foreach ($ScopeActivity as $sa)
                                                        <option value="{{$sa->id}}" {{ old('scope_activities_id') == $sa->id ? 'selected' : '' }} >{{$sa->name}}</option>
                                                    @endforeach
                                                @endisset
                                            </select>
                                            @error('scope_activities_id')
                                                <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>*Estado</label>
                                            <select id="status" name="status" class="custom-select @error('status') is-invalid @enderror">
                                                <option value="">Seleccione Tipo</option>
                                                    <option value="1" {{ old('scope_activities_id') == 1 ? 'selected' : '' }}>Activo</option>
                                                    <option value="2" {{ old('scope_activities_id') == 2 ? 'selected' : '' }}>Inactivo</option>


                                            </select>
                                            @error('status')
                                                <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>*Pais</label>
                                            <select id="country_id" name="country_id" class="custom-select  @error('country_id') is-invalid @enderror">
                                                @isset($CountryData)
                                                    <option value="">Seleccione pais</option>
                                                    @foreach ($CountryData as $cd)
                                                        @if(old('country_id') != null)
                                                            <option value="{{ $cd->id }}" {{ old('country_id') == $cd->id ? 'selected' : '' }}>{{ $cd->name }}</option>
                                                        @else
                                                            <option value="{{ $cd->id }}">{{ $cd->name }}</option>
                                                        @endif
                                                    @endforeach
                                                @endisset
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>*Provincia</label>
                                            <select id="province_id" name="province_id" class="custom-select @error('province_id') is-invalid @enderror">
                                                <option value="">Seleccione provincia</option>
                                                @if(old('province_id') !== null)
                                                    @foreach ($ProvinceData as $p)
                                                        <option value="{{ $p->id }}" {{ old('province_id') == $p->id ? 'selected' : '' }}>{{ $p->name }}</option>
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
                                                @if(old('province_id') !== null)
                                                    @foreach ($CantonData as $c)
                                                        <option value="{{ $c->id }}" {{ old('canton_id') == $c->id ? 'selected' : '' }}>{{ $c->name }}</option>
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
                                                <option value="">Seleccione canton</option>
                                                @if(old('province_id') !== null)
                                                    @foreach ($ParishData as $pa)
                                                        <option value="{{ $pa->id }}" {{ old('parish_id') == $pa->id ? 'selected' : '' }}>{{ $pa->name }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>

                                    </div>
                                    <div class="col-lg-6">

                                        <div class="form-group">
                                            <label for="name">Nombres/Nombre Comercial</label>
                                            <input type="text" class="form-control" id="name2" value="{{ old('name') }}" disabled>

                                        </div>
                                        <div class="form-group">
                                            <label for="last_name">Apellido Paterno/Razon Social</label>
                                            <input type="text" class="form-control" id="last_name" value="{{ old('last_name',$PersonEntityData->last_name) }}" disabled>

                                        </div>


                                        <div class="form-group">
                                            <label for="email">Correo Electronico</label>
                                            <input type="email" class="form-control" id="email" value="{{ old('email',$PersonEntityData->email) }}" disabled>

                                        </div>
                                        <div class="form-group">
                                            <label for="status2">Estado</label>
                                            <input type="text" class="form-control" id="status2" value="{{ old('status',$PersonEntityData->status) }}" disabled>

                                        </div>
                                        <div class="form-group">
                                            <label for="number_phone1">Telefono</label>
                                            <input type="number" class="form-control" id="number_phone1" value="{{ old('number_phone1',$PersonEntityData->number_phone1) }}" disabled>

                                        </div>
                                        <div class="form-group">
                                            <label for="address">Direccion</label>
                                            <input type="email" class="form-control" id="address" value="{{ old('address',$PersonEntityData->address) }}" disabled>

                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>
                      </div>
                      <!-- /.tab-content -->
                    </div><!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
  </div>
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
            <div class="card">
                @csrf
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
                        <th>Nombres / Nombre comercial</th>
                        <th>Apellidos / Razon Social</th>
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
        let cc_ruc = document.getElementById('cc_ruc');
        let name2 = document.getElementById('name2');
        let last_name = document.getElementById('last_name');
        let email = document.getElementById('email');
        let status = document.getElementById('status2');
        let address = document.getElementById('address');
        let number_phone1 = document.getElementById('number_phone1');
        let country_id = document.getElementById('country_id');
        let province_id = document.getElementById('province_id');
        let canton_id = document.getElementById('canton_id');
        let parish_id = document.getElementById('parish_id');
        let people_entities_id = document.getElementById('people_entities_id');
        let name_cultural = document.getElementById('name');

        var selectCountry = document.getElementById('country_id');
        var selectProvince = document.getElementById('province_id');
        var selectCanton = document.getElementById('canton_id');
        var selectParish = document.getElementById('parish_id');

        let token = "{{csrf_token()}}";

        function selectedPersonEntity(id){
            loading.style.display = '';
            axios.post('{{route("peopleentities.get")}}', {id:id,_token: token}).then(function(res) {
                if(res.status==200) {
                    console.log("cargando pronvias");
                    console.log(res.data);
                    cc_ruc.value = res.data.cc_ruc;
                    name2.value = res.data.name;
                    email.value = res.data.email;
                    number_phone1.value = res.data.number_phone1;
                    last_name.value = res.data.last_name+' '+res.data.maternal_last_name;
                    status.value = res.data.status;
                    address.value = res.data.address;
                    people_entities_id.value = res.data.id;
                    //name_cultural.value = res.data.name+' '+res.data.last_name+' '+res.data.maternal_last_name;
                    $('#modal-lg').modal('hide');
                    loading.style.display = 'none';
                }
            }).catch(function(err) {
                    console.log(err);
                    loading.style.display = 'none';
            }).then(function() {
                    loading.style.display = 'none';
            });
        }

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
            axios.post('{{route("provinces.show")}}', {country_id:country_id,_token: token}).then(function(res) {
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
            axios.post('{{route("cantons.show")}}', {province_id:province_id,_token: token}).then(function(res2) {
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
            axios.post('{{route("parishes.show")}}', {canton_id:canton_id,_token: token}).then(function(res2) {
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

    $(function () {
        var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });
        @if ($errors->any())
            toastr.error('Revise los campos que son obligatorios');
            let people_entities_id_val = document.getElementById('people_entities_id').value;
            selectedPersonEntity(people_entities_id_val);
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
                "url" : "{{ route('peopleentities.datatablesPersonas') }}",
                "type": "post",
                "data": function (d){
                    d._token = $("input[name=_token]").val();
                }
            },
            "columns": [
                {data: 'cc_ruc'},
                {data: 'name_tradename'},
                {data: 'last_name_bussines_name'},
                {data: 'status'},
                {data: 'email'},
                {data: 'action', name: 'action', orderable: false, searchable: false},

            ]
        });
    });

    </script>
@endpush
