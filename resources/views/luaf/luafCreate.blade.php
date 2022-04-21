@extends('layouts.app')
@section('content')
    <x-header title="Tabla de porcentaje de LUAF">
        <li class="breadcrumb-item active">Tabla de porcentaje de LUAF</li>
    </x-header>
     <!-- Main content -->
  <div class="content">
    <div class="container-fluid">

      <div class="row">
        <div class="col-lg-12">
          <div class="card card-default">
            @csrf

            <div class="card-body">
                <!-- formulario de informacion -->
                <form id="formLuafTable" action="{{ route('luaf.store') }}" method="post">
                @csrf
                <div class="row mb-3">
                    <div class="col-lg-4">
                        <div class="btn-group">
                            <button type="sutmit" class="btn btn-primary float-sm-left"> <i class="fa fa-plus-square"></i> Agregar</button>
                            <button type="button" class="btn btn-primary dropdown-toggle dropdown-icon" data-toggle="dropdown" aria-expanded="false">
                            <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu" role="menu" style="">
                            <a class="dropdown-item" target="_blank" href="{{route('luaf.documentation')}}">Documentacion</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Actividad turistica *</label>
                            <select id="tourist_activity_id" name="tourist_activity_id" class="custom-select @error('tourist_activity_id') is-invalid @enderror">
                                @isset($touristActivity)
                                    <option value="">Seleccione Actividad</option>
                                    @foreach ($touristActivity as $ta)
                                        @if(Cookie::get('tourist_activity_id'))
                                            @if($ta->id == Cookie::get('tourist_activity_id'))
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

                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Clasificacion *</label>
                            <select id="classification_id" name="classification_id" class="custom-select @error('classification_id') is-invalid @enderror">
                                @isset($establishmentClassification)
                                    <option value="">Seleccione Clasificacion</option>

                                        @foreach ($establishmentClassification as $ec)
                                            @if(Cookie::get('classification_id') != null)
                                                @if($ec->id == Cookie::get('classification_id'))
                                                    <option value="{{ $ec->id }}" selected>{{ $ec->name }}</option>
                                                @else
                                                    <option value="{{ $ec->id }}">{{ $ec->name }}</option>
                                                @endif
                                            @endif
                                        @endforeach


                                @endisset
                            </select>
                        </div>

                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Categoria *</label>
                            <select id="category_id" name="category_id" class="custom-select @error('category_id') is-invalid @enderror">
                                @isset($establishmentCategory)
                                    <option value="">Seleccione Categoria</option>
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
                                @endisset
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="percentage">Porcentaje *</label>
                            <input type="number" class="form-control @error('percentage')is-invalid @enderror" id="percentage" name="percentage" value="{{old('percentage')}}" >
                            @error('percentage')
                            <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="percentage">Año *</label>
                            <input type="number" class="form-control @error('year')is-invalid @enderror" id="year" name="year" value="{{old('year')}}" >
                            @error('year')
                            <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="observation">Observacion </label>
                            <input type="text" class="form-control @error('observacion')is-invalid @enderror" id="observacion" name="observacion" value="{{old('observacion')}}" >
                            @error('observacion')
                            <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                </form>
            </div>
            <div id="loading" class="overlay dark" style="display: none">
                <i class="fas fa-2x fa-sync-alt fa-spin"></i>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
            @isset($touristActivity)
                @foreach ($touristActivity as $ta)
                    <div class="col-lg-4">
                        <div class="card card-default">
                        @csrf

                            <div class="card-body">
                                <table id="establishment-table" class="table table-sm table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th colspan="4">{{$ta->name}}</th>
                                        </tr>
                                        <tr>
                                            <th>Clasificacion</th>
                                            <th>Categoria</th>
                                            <th>Porcentaje</th>
                                            <th>Año</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @isset($LuafTable)
                                            @foreach ($LuafTable as $lt)
                                                @if($lt->tourist_activity_id == $ta->id)
                                                    <tr>
                                                        <td>{{$lt->establishments_classifications->name}}</td>
                                                        <td>{{$lt->establishments_categories->name}}</td>
                                                        <td>{{$lt->percentage}}</td>
                                                        <td>{{$lt->year}}</td>
                                                    </tr>
                                                @endif

                                            @endforeach
                                        @endisset

                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endisset

      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
@endsection
@push('scripts')
    <script>

        let token = "{{csrf_token()}}";
        let loading = document.getElementById('loading');
        let loading_modal = document.getElementById('loading_modal');
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
        $(function () {
            var Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });
            $('#formLuafTable').validate({
                rules: {
                        percentage: {
                            required: true,
                            number: true,
                        },

                        year: {
                            required: true,
                            number: true,
                            digits: true,
                            minlength: 4,
                            maxlength: 4
                        },
                        tourist_activity_id: {
                            required: true,
                            number: true,
                        },
                        classification_id: {
                            required: true,
                            number: true,
                        },
                        category_id: {
                            required: true,
                            number: true,
                        },
                    },
                messages: {
                        percentage: {
                            required: "El campo numero de registro es requerido.",
                            number: "El campo numero de registro debe ser un numero valido."
                        },
                        year: {
                            required: "El campo numero de registro es requerido.",
                            number: "El campo numero de registro debe ser un numero valido."
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
            @if (session('err'))
                toastr.error('{{session('err')}}');
            @endisset
        });

    </script>
@endpush


