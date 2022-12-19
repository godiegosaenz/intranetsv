@extends('layouts.app')
@section('content')
    <x-header title="Recaudación">
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
                <form id="formularioConsultarLquidacion" action="{{route('liquidation.get')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-lg-2">
                            <h5>Selecciones establecimiento</h5>
                        </div>

                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-2">
                            <div class="btn-group">
                                <button id="btnConsulta" class="btn btn-primary" type="submit" disabled data-toggle="modal" data-target="#modal-establecimientos">
                                    <span id="spanConsulta" class="bi bi-search" role="status" aria-hidden="true"></span>
                                    Consultar
                                </button>
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
          </div>
        </div>
      </div>
      <!-- /.row -->
      <div class="row mt-3">
        <div class="col-lg-6">
            <h3 id="htotal">Total a cancelar 0.00</h3>
        </div>
        <div class="col-lg-6">
            <div class="float-right">
                <div class="form-group">
                    <button id="btnpago" class="btn btn-primary btn-block" type="button"><i class="fa fa-plus-square"></i> Procesar pago</button>
                </div>
            </div>
        </div>
      </div>
      <div class="row">
          <div class="col-lg-12">
            <div class="card card-default card-outline card-outline-tabs" style="min-height: 300px">
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
                                                <th>Total a Pagar</th>
                                                <th>Accion</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tbodyLiquidation">

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
                <div id="loading" class="overlay dark" style="display: none">
                    <i class="fas fa-2x fa-sync-alt fa-spin"></i>
                </div>
            </div>
          </div>
      </div>
    </div><!-- /.container-fluid -->
  </div>
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
    Launch demo modal
  </button>
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
                    <div class="alert alert-info alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5><i class="icon fas fa-ban"></i> ¡Importante!</h5>
                        Si ocurre algun error al cargar la tabla, de clic <a class="btn btn-primary btn-sm" onclick="recargarTablaEstablecimiento()">aqui</a> .
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table id="establishment-table" class="table table-sm table-bordered table-hover" style="width:100%">
                            <thead>
                            <tr>
                                <th>RUC</th>
                                <th>Nombre</th>
                                <th>Tipo de actividad</th>
                                <th>Clasificacion</th>
                                <th>Categoria</th>
                                <th>Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th><input type="text" class="form-control"></th>
                                    <th><input type="text" class="form-control"></th>
                                    <th><select class="form-control" name="" id=""><option value="">Tipo</option></select></th>
                                    <th><select class="form-control" name="" id=""></select></th>
                                    <th></th>
                                    <th>Acciones</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>

      </div>
      <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
  <!-- Modal -->
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
</div>
@endsection
@push('scripts')
    <script>
    var establishmenttable;
    let token = "{{csrf_token()}}";
    let loading = document.getElementById('loading');
    let btnpago = document.getElementById('btnpago');

    function recargarTablaEstablecimiento(){
        establishmenttable.ajax.reload();
    }
    //cargar modal persona
    modalempresa.addEventListener('click', function(e) {
        //document.getElementById('numbermodal').value = 1;
        $('#modal-establecimientos').modal('show');
        //loading_modal.style.display = '';

    });
    btnpago.addEventListener('click', function(e) {
        //document.getElementById('numbermodal').value = 1;
        $('#modalpago').modal('show');
        //loading_modal.style.display = '';

    });
    function selectEstablishment(id,name){
        let inputEstablishmentId = document.getElementById('establishment_id_2');
        let establishment_id = document.getElementById('establishment_id');
        let btnConsulta = document.getElementById('btnConsulta');
        btnConsulta.removeAttribute('disabled');
        inputEstablishmentId.value = id;
        establishment_id.value = name;
        $('#modal-establecimientos').modal('hide');
    }
    var formularioConsultarLquidacion = document.getElementById('formularioConsultarLquidacion');
    formularioConsultarLquidacion.addEventListener('submit', function(e) {
        e.preventDefault()
        loading.style.display = '';
        let btnConsulta = document.getElementById('btnConsulta');
        btnConsulta.setAttribute("disabled", "disabled");
        btnConsulta.innerHTML = '<span id="spanConsulta" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Consultando...';
        let formData = new FormData(this);
        axios.post(formularioConsultarLquidacion.getAttribute('action'),formData).then(function(res) {
            if(res.status==200) {
                if(res.data.estado == 'ok'){
                    btnConsulta.removeAttribute('disabled')
                    btnConsulta.innerHTML = '<span id="spanConsulta" class="bi bi-search" role="status" aria-hidden="true"></span> Consultar';
                    loading.setAttribute('style','display:none');
                    style="display: none"
                    var array_Liquidation = res.data.Liquidation;
                    var countLiquidation = Object.keys(array_Liquidation).length;
                    var tbodyLiquidation = document.getElementById('tbodyLiquidation');
                    var totalapagar = 0;
                    var tablehtmlLiquidation = '';
                    if(countLiquidation > 0){
                        for (let clave2 in array_Liquidation){
                            for (var key in array_Liquidation[clave2])
                            {
                                if (array_Liquidation[clave2].hasOwnProperty(key)) {
                                    if(array_Liquidation[clave2][key]['status'] == 1)
                                    {
                                        tablehtmlLiquidation += '<td>';
                                        tablehtmlLiquidation += '<i style="color:green;" class="fa fa-solid fa-circle"></i>';
                                        tablehtmlLiquidation += '</td>';
                                        tablehtmlLiquidation += '<td>   ';
                                        tablehtmlLiquidation += '</td>';
                                    }else
                                    {
                                        totalapagar = totalapagar + array_Liquidation[clave2][key]['total'];
                                        tablehtmlLiquidation += '<td>';
                                        tablehtmlLiquidation += '<i style="color:red;" class="fa fa-solid fa-circle"></i>';
                                        tablehtmlLiquidation += '</td>';
                                        tablehtmlLiquidation += '<td>';
                                        tablehtmlLiquidation += '<div class="form-check">';
                                        tablehtmlLiquidation += '<input class="form-check-input" type="checkbox" value="'+array_Liquidation[clave2][key]['id']+'" name="checkLiquidacion[]">';
                                        tablehtmlLiquidation += '</div>';
                                        tablehtmlLiquidation += '</td>';
                                    }
                                    tablehtmlLiquidation += '<td>';
                                    tablehtmlLiquidation += array_Liquidation[clave2][key]['liquidation_code'];
                                    tablehtmlLiquidation += '</td>';
                                    tablehtmlLiquidation += '<td>';
                                    tablehtmlLiquidation += array_Liquidation[clave2][key]['year'];
                                    tablehtmlLiquidation += '</td>';
                                    tablehtmlLiquidation += '<td>';
                                    tablehtmlLiquidation += array_Liquidation[clave2][key]['establisment_name'];
                                    tablehtmlLiquidation += '</td>';
                                    tablehtmlLiquidation += '<td>';
                                    tablehtmlLiquidation += array_Liquidation[clave2][key]['propietario'];
                                    tablehtmlLiquidation += '</td>';
                                    tablehtmlLiquidation += '<td>';
                                    tablehtmlLiquidation += array_Liquidation[clave2][key]['total_payment'];
                                    tablehtmlLiquidation += '</td>';
                                    tablehtmlLiquidation += '<td>';
                                    tablehtmlLiquidation += array_Liquidation[clave2][key]['descuento'];
                                    tablehtmlLiquidation += '</td>';
                                    tablehtmlLiquidation += '<td>';
                                    tablehtmlLiquidation += array_Liquidation[clave2][key]['recargo'];
                                    tablehtmlLiquidation += '</td>';
                                    tablehtmlLiquidation += '<td>';
                                    tablehtmlLiquidation += array_Liquidation[clave2][key]['interes'];
                                    tablehtmlLiquidation += '</td>';
                                    tablehtmlLiquidation += '<td>';
                                    tablehtmlLiquidation += array_Liquidation[clave2][key]['total'];
                                    tablehtmlLiquidation += '</td>';
                                    tablehtmlLiquidation += '<td>';
                                    tablehtmlLiquidation += '<button class="btn btn-primary btn-xs"><i class="fa fa-solid fa-eye"></i></button><button class="btn btn-primary btn-xs"><i class="fa fa-solid fa-money-bill"></i></button>'
                                    tablehtmlLiquidation += '</td>';
                                    tablehtmlLiquidation += '</tr>';
                                }
                            }

                        }
                        tbodyLiquidation.innerHTML = tablehtmlLiquidation;
                        let htotal = document.getElementById('htotal');
                        htotal.innerHTML = 'Total a cancelar '+totalapagar;
                    }

                }else{

                    console.log('error al consultar al servidor');
                }

            }
        }).catch(function(err) {
            console.log(err);
            if(err.response.status == 500){
                console.log('error al consultar al servidor');
            }

            if(err.response.status == 419){
                //toastr.error('Es posible que tu session haya caducado, vuelve a iniciar sesion');
                console.log('Es posible que tu session haya caducado, vuelve a iniciar sesion');
            }
            if(err.response.status == 422){
                //toastr.error('Revise la validacion del archivo');

            }
            loading.style.display = 'none';

        }).then(function() {
                //loading.style.display = 'none';
        });
    });
    $(function () {
        establishmenttable = $('#establishment-table').DataTable({
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
            initComplete: function () {
                // Apply the search
                this.api()
                    .columns()
                    .every(function () {
                        var that = this;

                        $('input', this.footer()).on('keyup change clear', function () {
                            if (that.search() !== this.value) {
                                that.search(this.value).draw();
                            }
                        });
                    });
            },
            "columns": [
                {data: 'ruc', 'width': '150px', 'targets': 0},
                {data: 'name', 'width': '150px', 'targets': 0},
                {data: 'tourist_activity', 'width': '120px', 'targets': 2},
                {data: 'classification' , 'width': '120px', 'targets': 3},
                {data: 'category', 'width': '120px', 'targets': 4},
                {data: 'action', 'width': '150px', 'targets': 12 , name: 'action', orderable: false, searchable: false},

            ]
        });
    });



    </script>
@endpush

