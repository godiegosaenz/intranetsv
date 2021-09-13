@extends('layouts.app')
@section('content')
    <x-header title="Editar Personas / Empresas">
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
                        <li class="nav-item"><a class="nav-link" href="#formulario" data-toggle="tab"> Formulario de edicion de usuarios</a></li>
                      </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                      <div class="tab-content">
                        <div class="active tab-pane" id="formulario">
                            <form action="{{ route('peopleentities.update', $PersonEntity) }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-lg-6">
                                        <br>
                                        <div class="form-group">
                                            <button class="btn btn-primary" type="submit"><i class="fa fa-plus-square"></i> Actualizar Persona/Empresa</button>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Tipo</label>
                                            <select id="type" name="type"class="custom-select">
                                              <option value="1" {{$PersonEntity->type == 1 ? 'selected' : '' }}>Persona</option>
                                              <option value="2" {{$PersonEntity->type == 2 ? 'selected' : '' }}>Empresa</option>
                                              <option value="3" {{$PersonEntity->type == 3 ? 'selected' : '' }}>Institucion</option>
                                              <option value="4" {{$PersonEntity->type == 4 ? 'selected' : '' }}>Asociacion</option>
                                              <option value="5" {{$PersonEntity->type == 5 ? 'selected' : '' }}>Organizacion sin fines de lucro</option>
                                            </select>
                                          </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <hr>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="cc_ruc">*Cédula/Ruc</label>
                                            <input type="number" class="form-control  @error('cc_ruc')is-invalid @enderror" name="cc_ruc" id="cc_ruc" placeholder="1312......." value="{{ old('cc_ruc',$PersonEntity->cc_ruc) }}" required>
                                            @error('cc_ruc')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="name">*Nombres/Nombre Comercial</label>
                                            <input type="text" class="form-control @error('name')is-invalid @enderror" name="name" id="name" placeholder="Die...." value="{{ old('name',$PersonEntity->name) }}" required>
                                            @error('name')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="last_name">*Apellido Paterno/Razon Social</label>
                                            <input type="text" class="form-control @error('last_name')is-invalid @enderror" name="last_name" id="last_name" placeholder="Rodr..." value="{{ old('last_name',$PersonEntity->last_name) }}" required>
                                            @error('last_name')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="maternal_last_name">Apellido Materno</label>
                                            <input type="text" class="form-control @error('maternal_last_name')is-invalid @enderror" name="maternal_last_name" id="maternal_last_name" placeholder="Zambr..." value="{{ old('maternal_last_name',$PersonEntity->maternal_last_name) }}" required>
                                            @error('maternal_last_name')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Fecha Nacimiento:</label>

                                            <div class="input-group">
                                              <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                              </div>
                                              <input type="text" class="form-control" id="date_birth" name="date_birth" value="{{ old('date_birth',$PersonEntity->date_birth) }}" required />
                                            </div>
                                            <!-- /.input group -->
                                        </div>
                                        <div class="form-group">
                                            <label for="email">*Correo Electronico</label>
                                            <input type="email" class="form-control @error('email')is-invalid @enderror" name="email" id="email" placeholder="abcd....@gmail.com" value="{{ old('email',$PersonEntity->email) }}" required>
                                            @error('email')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>*Estado</label>
                                            <select id="status" name="status" class="custom-select" required>
                                                <option value="">Seleccione estado</option>
                                                @if ($PersonEntity->status == 1)
                                                    <option value="1" selected>Activo</option>
                                                    <option value="2">Inactivo</option>
                                                @else
                                                    <option value="1">Activo</option>
                                                    <option value="2" selected>Inactivo</option>
                                                @endif


                                            </select>
                                            @error('status')
                                                <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                          </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="number_phone1">*Telefono</label>
                                            <input type="text" class="form-control @error('number_phone1')is-invalid @enderror" name="number_phone1" id="number_phone1" placeholder="0995....." value="{{ old('number_phone1',$PersonEntity->number_phone1) }}" required>
                                            @error('number_phone1')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>*Pais</label>
                                            <select id="country_id" name="country_id" class="custom-select  @error('country_id') is-invalid @enderror" required>
                                                <option value="">Seleccione pais</option>
                                                @isset($CountryData)
                                                    @foreach ($CountryData as $cd)
                                                        @if(Cookie::get('country_id'))
                                                            @if($cd->id == Cookie::get('country_id'))
                                                                <option value="{{ $cd->id }}" selected>{{ $cd->name }}</option>
                                                            @else
                                                                <option value="{{ $cd->id }}">{{ $cd->name }}</option>
                                                            @endif

                                                        @else
                                                            @if($cd->id == $PersonEntity->country_id)
                                                                <option value="{{ $cd->id }}" selected>{{ $cd->name }}</option>
                                                            @else
                                                                <option value="{{ $cd->id }}">{{ $cd->name }}</option>
                                                            @endif

                                                        @endif
                                                    @endforeach
                                                @endisset
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>*Provincia</label>

                                            <select id="province_id" name="province_id" class="custom-select @error('province_id') is-invalid @enderror" required>
                                                <option value="">Seleccione provincia</option>
                                                @if($ProvinceData)
                                                    @foreach ($ProvinceData as $p)
                                                        @if(Cookie::get('province_id'))
                                                            @if($p->id == Cookie::get('province_id'))
                                                                <option value="{{ $p->id }}" selected>{{ $p->name }}</option>
                                                            @else
                                                                <option value="{{ $p->id }}">{{ $p->name }}</option>
                                                            @endif

                                                        @else
                                                            @if($p->id == $PersonEntity->province_id)
                                                                <option value="{{ $p->id }}" selected>{{ $p->name }}</option>
                                                            @else
                                                                <option value="{{ $p->id }}">{{ $p->name }}</option>
                                                            @endif
                                                        @endif
                                                    @endforeach
                                                @endif

                                            </select>
                                            @error('province_id')
                                                <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>*Canton</label>
                                            <select id="canton_id" name="canton_id" class="custom-select @error('canton_id') is-invalid @enderror" required>
                                                <option value="">Seleccione canton</option>
                                                @if ($CantonData)
                                                    @foreach ($CantonData as $c)
                                                        @if(Cookie::get('canton_id'))
                                                            @if($c->id == Cookie::get('canton_id'))
                                                                <option value="{{ $c->id }}" selected>{{ $c->name }}</option>
                                                            @else
                                                                <option value="{{ $c->id }}">{{ $c->name }}</option>
                                                            @endif

                                                        @else
                                                            @if ($c->id == $PersonEntity->canton_id)
                                                                <option value="{{ $c->id }}" selected>{{ $c->name }}</option>
                                                            @else
                                                                <option value="{{ $c->id }}">{{ $c->name }}</option>
                                                            @endif
                                                        @endif
                                                    @endforeach
                                                @endif

                                            </select>
                                            @error('canton_id')
                                                <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>*Parroquia</label>
                                            <select id="parish_id" name="parish_id" class="custom-select @error('parish_id') is-invalid @enderror" required>
                                                <option value="">Seleccione canton</option>
                                                @if ($ParishData)
                                                    @foreach ($ParishData as $pa)
                                                        @if(Cookie::get('parish_id'))
                                                            @if($pa->id == Cookie::get('parish_id'))
                                                                <option value="{{ $pa->id }}" selected>{{ $pa->name }}</option>
                                                            @else
                                                                <option value="{{ $pa->id }}">{{ $pa->name }}</option>
                                                            @endif

                                                        @else
                                                            @if($pa->id == $PersonEntity->parish_id)
                                                                <option value="{{ $pa->id }}" selected>{{ $pa->name }}</option>
                                                            @else
                                                                <option value="{{ $pa->id }}">{{ $pa->name }}</option>
                                                            @endif

                                                        @endif
                                                    @endforeach
                                                @else

                                                @endif

                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="address">*Direccion</label>
                                            <input type="text" class="form-control @error('address')is-invalid @enderror" name="address" id="address" placeholder="Calle ..." value="{{ old('address',$PersonEntity->address) }}" required>
                                            @error('address')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
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
    var selectCountry = document.getElementById('country_id');
    var selectProvince = document.getElementById('province_id');
    var selectCanton = document.getElementById('canton_id');
    var selectParish = document.getElementById('parish_id');
    let token = "{{csrf_token()}}";
    // funcion para cargar provincia
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
        axios.post('/admin/provinces/'+country_id, {
        data: {
        _token: token
        }
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
        axios.post('/admin/cantons/'+province_id, {
        data: {
        _token: token
        }
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
        axios.post('/admin/parishes/'+canton_id, {
        data: {
        _token: token
        }
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

    //jquery
    $(function () {
        var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
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
