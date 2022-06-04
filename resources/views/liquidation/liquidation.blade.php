@extends('layouts.app')
@section('content')
    <x-header title="Pago de LUAF">
        <li class="breadcrumb-item active">Emision de titulos</li>
    </x-header>
     <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <div class="card card-default">
            @csrf

            <div class="card-body">
                <form action="{{route('liquidation.get')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-lg-2">
                            <div class="form-group">
                                <div class="form-check">
                                <input class="form-check-input" type="radio" name="radio1">
                                <label class="form-check-label">Establecimiento</label>
                                </div>
                                <div class="form-check">
                                <input class="form-check-input" type="radio" name="radio1" checked="">
                                <label class="form-check-label">Radio checked</label>
                                </div>

                            </div>
                        </div>

                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-2">
                            <div class="btn-group">
                                <button type="sutmit" class="btn btn-primary float-sm-left"> <i class="fas fa-search"></i>  Consultar</button>

                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                <button id="modalempresa" type="button" class="btn btn-primary">Buscar</button>
                                </div>
                                <!-- /btn-group -->
                                <input id="establishment_id" name="establishment_id" type="text" class="form-control @error('establishment_id_2')is-invalid @enderror" value="" disabled>

                                @error('establishment_id_2')
                                <span class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <input id="establishment_id_2" name="establishment_id_2" type="hidden" class="form-control @error('establishment_id_2')is-invalid @enderror" value="" >
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
      <!-- /.row -->
      <div class="row">
        <div class="col-lg-6">
            <h3>Total a cancelar 0.00</h3>
        </div>
        <div class="col-lg-6">
            <div class="float-right">
                <div class="form-group">
                    <button class="btn btn-primary btn-block" type="submit"><i class="fa fa-plus-square"></i> Procesar</button>
                </div>
            </div>
        </div>
      </div>
      <div class="row">
          <div class="col-lg-12">
            <div class="card card-default card-outline card-outline-tabs">
                <div class="card-header p-0 border-bottom-0">
                  <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="custom-tabs-step1-tab" data-toggle="pill" href="#custom-tabs-step1" role="tab" aria-controls="custom-tabs-step1" aria-selected="true">Informacion de establecimiento</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false">Informacion turistica</a>
                    </li>

                  </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="custom-tabs-four-tabContent">
                        <div class="tab-pane fade show active" id="custom-tabs-step1" role="tabpanel" aria-labelledby="custom-tabs-step1-tab">
                            <div class="row">
                                <div class="col-lg-12">
                                    <table id="liquidacion-table" class="table table-sm table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>*</th>
                                                <th>Seleccionar</th>
                                                <th>N° Liquidacion</th>
                                                <th>Año</th>
                                                <th>Establecimiento</th>
                                                <th>Propietario</th>
                                                <th>Emisión</th>
                                                <th>Descuento</th>
                                                <th>Recargo</th>
                                                <th>Interes</th>
                                                <th>Coactiva</th>
                                                <th>Pago</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @isset($Liquidation)
                                                @foreach ($Liquidation as $l)
                                                    <tr>
                                                        <td><i class="nav-icon fas fa-circle text-danger"></i></td>
                                                        <td>
                                                            <div class="form-group">
                                                                <div class="form-check">
                                                                <input class="form-check-input" name="checkLiquidation[]" type="checkbox" value="{{$l->id}}">
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>{{$l->liquidation_code}}</td>
                                                        <td>{{$l->year}}</td>
                                                        <td>{{$l->establishment->name}}</td>
                                                        <td>Propietario</td>
                                                        <td>{{$l->total_payment}}</td>
                                                        <td>0.00</td>
                                                        <td>0.00</td>
                                                        <td>0.00</td>
                                                        <td>0.00</td>
                                                        <td>{{$l->total_payment}}</td>
                                                    </tr>
                                                @endforeach
                                            @endisset

                                        </tbody>

                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
                            Tab2
                        </div>
                    </div>
                </div>
            </div>
          </div>
      </div>
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
  <div class="modal fade" id="modal-establecimientos">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Seleccione Establecimiento</h4>
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
                    <table id="establishment-table" class="table table-sm table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>estado</th>
                            <th>Tipo de actividad</th>
                            <th>Clasificacion</th>
                            <th>Categoria</th>
                            <th>Inicio de actividad</th>
                            <th>Tipo de establecimiento</th>
                            <th>Tipo de Local</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>

      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@endsection
@push('scripts')
    <script>
    //cargar modal persona
    modalempresa.addEventListener('click', function(e) {
        //document.getElementById('numbermodal').value = 1;
        $('#modal-establecimientos').modal('show');
        //loading_modal.style.display = '';

    });
    function selectEstablishment(Establishment){
        let inputEstablishmentId = document.getElementById('establishment_id_2');
        inputEstablishmentId.value = Establishment;
        $('#modal-establecimientos').modal('hide');
    }
    $(function () {
        let establishmenttable = $('#establishment-table').DataTable({
            "lengthMenu": [ 5, 10],
            "language" : {
                "url": '{{ url("/js/spanish.json") }}',
            },
            "scrollX": false,
            "autoWidth": false,
            "order": [], //Initial no order
            "processing" : true,
            "serverSide": true,
            "ajax": {
                "url" : "{{ route('establishments.datatablesEstablishmentLiquidation') }}",
                "type": "post",
                "data": function (d){
                    d._token = $("input[name=_token]").val();
                }
            },
            "columns": [
                {data: 'name', 'width': '150px', 'targets': 0},
                {data: 'status'},
                {data: 'tourist_activity', 'width': '120px', 'targets': 2},
                {data: 'classification' , 'width': '120px', 'targets': 3},
                {data: 'category', 'width': '120px', 'targets': 4},
                {data: 'start_date', 'width': '100px', 'targets': 5},
                {data: 'EstablishmentTypeName'},
                {data: 'LocalName'},
                {data: 'action', 'width': '150px', 'targets': 12 , name: 'action', orderable: false, searchable: false},

            ]
        });
    });

    </script>
@endpush

