@extends('layouts.app')
@section('content')
    <x-header title="Panel de establecimientos turisticos">
        <li class="breadcrumb-item active">Emision de titulos</li>
    </x-header>
     <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row mb-3">
        <div class="col-sm-12">
            <a class="btn btn-primary float-sm-left" href="{{ route('establishments.create')}}"><i class="fa fa-plus-square"></i> Registrar</a>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <div class="card card-default">
            <div class="card-body">
                <div id="stepper1" class="bs-stepper">
                    <div class="bs-stepper-header" role="tablist">
                      <!-- your steps here -->
                      <div class="step" data-target="#year-emision-part">
                        <button type="button" class="step-trigger" role="tab" aria-controls="year-emision-part" id="year-emision-part-trigger">
                          <span class="bs-stepper-circle">1</span>
                          <span class="bs-stepper-label">Año de emision</span>
                        </button>
                      </div>
                      <div class="line"></div>
                      <div class="step" data-target="#porcentaje-part">
                        <button type="button" class="step-trigger" role="tab" aria-controls="porcentaje-part" id="porcentaje-part-trigger">
                          <span class="bs-stepper-circle">2</span>
                          <span class="bs-stepper-label">Porcentaje del Rubro LUAF</span>
                        </button>
                      </div>
                      <div class="line"></div>
                      <div class="step" data-target="#emision-part">
                        <button type="button" class="step-trigger" role="tab" aria-controls="emision-part" id="emision-part-trigger">
                          <span class="bs-stepper-circle">3</span>
                          <span class="bs-stepper-label">Seleccionar otros rubros</span>
                        </button>
                      </div>
                    </div>
                    <div class="bs-stepper-content">
                        <form id="formEmision" action="{{route('emision.store')}}" method="post">
                            @csrf
                            <div id="year-emision-part" class="content" role="tabpanel" aria-labelledby="year-emision-part-trigger">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <br>
                                        <div class="form-group">
                                            <button id="btnSiguiente" class="btn btn-secondary" type="button" onclick="stepnext()"><i class="fa fa-arrow-right"></i> Siguiente </button>
                                        </div>
                                        <div class="form-group">
                                            <label for="year_emision">Año de emision</label>
                                            <input type="text" class="form-control" id="year_emision" name="year_emision">
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div id="porcentaje-part" class="content" role="tabpanel" aria-labelledby="porcentaje-part-trigger">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <br>
                                        <div class="form-group">
                                            <button id="btnstep3" class="btn btn-secondary" type="button" onclick="stepprevious()"><i class="fa fa-arrow-left"></i> Anterior </button>
                                            <button id="btnSiguiente" class="btn btn-secondary" type="button" onclick="stepnext()"><i class="fa fa-arrow-right"></i> Siguiente </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <table id="luaf-table" class="table table-sm table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Seleccionar</th>
                                                    <th>Actividad Turistica</th>
                                                    <th>Clasificacion</th>
                                                    <th>Categoria</th>
                                                    <th>Porcentaje</th>
                                                    <th>Año</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @isset($LuafTable)
                                                    @foreach ($LuafTable as $lt)

                                                            <tr>
                                                                <td>
                                                                    <div class="form-group">
                                                                        <div class="form-check">
                                                                        <input class="form-check-input" name="checkLuaf[]" type="checkbox" value="{{$lt->id}}">
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>{{$lt->tourist_activities->name}}</td>
                                                                <td>{{$lt->establishments_classifications->name}}</td>
                                                                <td>{{$lt->establishments_categories->name}}</td>
                                                                <td>{{$lt->percentage}}</td>
                                                                <td>{{$lt->year}}</td>
                                                            </tr>


                                                    @endforeach
                                                @endisset

                                            </tbody>

                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div id="emision-part" class="content" role="tabpanel" aria-labelledby="emision-part-trigger">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <br>
                                        <div class="form-group">
                                            <button id="btnstep3" class="btn btn-secondary" type="button" onclick="stepprevious()"><i class="fa fa-arrow-left"></i> Anterior </button>
                                            <button class="btn btn-primary" type="submit"><i class="fa fa-check"></i> Emitir LUAF </button>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <hr>
                                    </div>
                                    <div class="col-lg-12">
                                        <table id="requirements-table" class="table table-sm table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Seleccionar</th>
                                                    <th>Rubro</th>
                                                    <th>Estado</th>
                                                    <th>valor</th>
                                                    <th>Cuenta contable</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @isset($Rubro)
                                                    @foreach ($Rubro as $r)
                                                        <tr>
                                                            <td>
                                                                <div class="form-group">
                                                                    <div class="form-check">
                                                                    <input class="form-check-input" name="checkrubro[]" type="checkbox" value="{{$r->id}}">

                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>{{$r->name}}</td>
                                                            <td>{{$r->status}}</td>
                                                            <td>{{$r->value}}</td>
                                                            <td>{{$r->accounting_account}}</td>
                                                        </tr>
                                                    @endforeach
                                                @endisset

                                            </tbody>
                                        </table>
                                    </div>
                                </div>




                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div id="loading" class="overlay dark" style="display: none">
                <i class="fas fa-2x fa-sync-alt fa-spin"></i>
            </div>
          </div>
        </div>
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
@endsection
@push('scripts')
    <script>
        var stepper = new Stepper(document.querySelector('#stepper1'))
        function stepnext(){
            stepper.next()
        }
        function stepprevious(){
            stepper.previous()
        }
        let token = "{{csrf_token()}}";
        let loading = document.getElementById('loading');
        var formEmision = document.getElementById('formEmision');
        formEmision.addEventListener('submit', function(e) {
            e.preventDefault()
            var loading = document.getElementById('loading');
            var year_emision = document.getElementById('year_emision').value;
            var checkLuaf = []
            var checkboxes = document.getElementsByName("checkLuaf[]");
            for (var i = 0; i < checkboxes.length; i++) {
                if(checkboxes[i].checked){
                    checkLuaf.push(checkboxes[i].value)
                }

            }
            var checkrubro = []
            var checkboxes2 = document.getElementsByName("checkrubro[]");
            for (var i = 0; i < checkboxes2.length; i++) {
                if(checkboxes2[i].checked){
                    checkrubro.push(checkboxes2[i].value)
                }

            }
            loading.style.display = '';
            let formData = new FormData(this);
            formData.append('_token',token);
            formData.append('year_emision',year_emision);
            formData.append('checkLuaf',checkLuaf);
            formData.append('checkrubro',checkrubro);
            axios.post('/admin/emision',formData).then(function(res) {
                if(res.status==200) {
                    if(res.data.success == true){
                        console.log("guardando ..");
                        //requirementstable.ajax.reload();
                        toastr.success('Archivo cargado con exito');
                        loading.style.display = 'none';

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
        $(function(){
            let luaftable = $('#luaf-table').DataTable({
                "lengthMenu": [ 5, 10],
                "language" : {
                    "url": '{{ url("/js/spanish.json") }}',
                },

                "autoWidth": false,
                "order": [], //Initial no order
            });
        })
    </script>
@endpush
