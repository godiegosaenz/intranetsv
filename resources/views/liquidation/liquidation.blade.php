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
                            <h5>Seleccione establecimiento</h5>
                        </div>

                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-2">
                            <div class="btn-group">
                                <button id="btnConsulta" class="btn btn-primary" type="submit" disabled>
                                    <span id="spanConsulta" class="bi bi-search" role="status" aria-hidden="true"></span>
                                    Consultar
                                </button>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                <button id="modalempresa" type="button" class="btn btn-dark">Buscar</button>
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
                    <button id="btnpago" class="btn btn-dark btn-block" type="button"><i class="fa fa-plus-square"></i> Procesar pago</button>
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
                        <a class="nav-link active" id="custom-tabs-step1-tab" data-toggle="pill" href="#custom-tabs-step1" role="tab" aria-controls="custom-tabs-step1" aria-selected="true">Emisión</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false">Cuotas de convenio</a>
                    </li>

                  </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="custom-tabs-four-tabContent">
                        <div class="tab-pane fade show active" id="custom-tabs-step1" role="tabpanel" aria-labelledby="custom-tabs-step1-tab">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form id="formLiquidaciones" name="formLiquidaciones" method="post" action="">
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
                                    </form>
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
@endsection
@section('modals')
<!-- Modal -->
    <div class="modal fade" id="modalDetalle" tabindex="-1" role="dialog" aria-labelledby="modalDetalleLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div id="overlaymodaldetalle" class="overlay">
                    <i class="fas fa-2x fa-sync fa-spin"></i>
                </div>
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detalle emisión</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <table class="table table-bordered table-sm">
                                <thead>
                                    <tr style="background: #BCDCF9;">
                                        <th colspan="4">PAGO : LUAF Licencia Unica anual de funcionamiento.</th>
                                    </tr>
                                </thead>
                                <tbody id="">
                                    <tr>
                                        <td style="width:20%;"><strong>Establecimiento :</strong></td>
                                        <td style="width:30%;"id="tdestablecimiento"></td>
                                        <td><strong>RUC</strong></td>
                                        <td id="tdruc"></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Propietario :</strong></td>
                                        <td id="tdpropietario" colspan="3"></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Representante Legal :</strong></td>
                                        <td id="tdrepresentante" colspan="3"></td>
                                    </tr>
                                    <tr>
                                        <td id="tdliquidacion"><strong># Liquidacion:</strong> </td>
                                        <td id="tdfecha"><strong>Fecha:</strong> </td>
                                        <td id="tdvalor"><strong>Valor:</strong> </td>
                                        <td id="tdestado"><strong>Estado:</strong> </td>
                                    </tr>
                                    <tr>
                                        <td><strong>Emision :</strong></td>
                                        <td id="tdemision"></td>
                                        <td colspan="2" rowspan="5">
                                            <table class="table table-bordered">
                                                <thead style="background: #BCDCF9;">
                                                    <tr>
                                                        <th>RUBRO</th>
                                                        <th>VALOR</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tbodyrubro">

                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>Descuento :</strong></td>
                                        <td id="tddescuento"></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Recargo :</strong></td>
                                        <td id="tdrecargo"></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Interes :</strong></td>
                                        <td id="tdinteres"></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Total :</strong></td>
                                        <td id="tdtotal"></td>
                                    </tr>
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="modalpago" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div id="overlaymodalpago" class="overlay">
                    <i class="fas fa-2x fa-sync fa-spin"></i>
                </div>
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">PROCESAR PAGO</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div id="alertPago" class="alert alert-danger alert-dismissible" style="display: none;">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h5><i class="icon fas fa-ban"></i> ¡Importante!</h5>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <table class="table table-bordered table-sm">
                                <thead>
                                    <tr>
                                        <th style="background: #BCDCF9;" colspan="4">PAGO : LUAF Licencia Unica anual de funcionamiento.</th>
                                    </tr>
                                    <tr>
                                        <th>Ruc</th>
                                        <th>Establecimiento</th>
                                        <th>Propietario</th>
                                        <th>Año</th>
                                    </tr>
                                </thead>
                                <tbody id="tbodyPagoLuaf">

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th id="htotal2" colspan="2">Valor a Cancelar 0.00</th>
                                        <th colspan="2">Observacion</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <table class="table table-bordered table-sm">
                                <tr style="background: #BCDCF9;">
                                    <td colspan="2">Detalle de cobro</td>
                                </tr>
                                <tr>
                                    <td>Contado</td>
                                    <td>0.00</td>
                                </tr>
                                <tr>
                                    <td>Notas de credito</td>
                                    <td>0.00</td>
                                </tr>
                                <tr>
                                    <td>Total</td>
                                    <td>0.00</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-9">
                            <div class="card card-primary">
                                <div class="card-body">
                                    <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
                                        <li class="nav-item">
                                        <a class="nav-link active" id="custom-content-below-home-tab" data-toggle="pill" href="#custom-content-below-home" role="tab" aria-controls="custom-content-below-home" aria-selected="true">Efectivo</a>
                                        </li>
                                        <li class="nav-item">
                                        <a class="nav-link" id="custom-content-below-profile-tab" data-toggle="pill" href="#custom-content-below-profile" role="tab" aria-controls="custom-content-below-profile" aria-selected="false">Nota de credito</a>
                                        </li>
                                        <li class="nav-item">
                                        <a class="nav-link" id="custom-content-below-messages-tab" data-toggle="pill" href="#custom-content-below-messages" role="tab" aria-controls="custom-content-below-messages" aria-selected="false">Transferencia</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="custom-content-below-tabContent">
                                        <div class="tab-pane fade show active" id="custom-content-below-home" role="tabpanel" aria-labelledby="custom-content-below-home-tab">
                                            <div class="col-8 mt-3">
                                                <div class="form-group row">
                                                    <label for="inputValorRecibido" class="col-sm-4 col-form-label">* Valor recibido: </label>
                                                    <div class="col-sm-8">
                                                    <input type="number" class="form-control" id="inputValorRecibido" name="inputValorRecibido" placeholder="0.00" onkeyup="calcularCambio()">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputValorCobrar" class="col-sm-4 col-form-label">* Valor a cobrar: </label>
                                                    <div class="col-sm-8">
                                                    <input type="number" class="form-control" id="inputValorCobrar" name="inputValorCobrar" placeholder="0.00">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputCambio" class="col-sm-4 col-form-label">* Cambio: </label>
                                                    <div class="col-sm-8">
                                                    <input type="number" class="form-control" id="inputCambio" name="inputCambio" placeholder="0.00">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="custom-content-below-profile" role="tabpanel" aria-labelledby="custom-content-below-profile-tab">
                                        Mauris tincidunt mi at erat gravida, eget tristique urna bibendum. Mauris pharetra purus ut ligula tempor, et vulputate metus facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Maecenas sollicitudin, nisi a luctus interdum, nisl ligula placerat mi, quis posuere purus ligula eu lectus. Donec nunc tellus, elementum sit amet ultricies at, posuere nec nunc. Nunc euismod pellentesque diam.
                                        </div>
                                        <div class="tab-pane fade" id="custom-content-below-messages" role="tabpanel" aria-labelledby="custom-content-below-messages-tab">
                                        Morbi turpis dolor, vulputate vitae felis non, tincidunt congue mauris. Phasellus volutpat augue id mi placerat mollis. Vivamus faucibus eu massa eget condimentum. Fusce nec hendrerit sem, ac tristique nulla. Integer vestibulum orci odio. Cras nec augue ipsum. Suspendisse ut velit condimentum, mattis urna a, malesuada nunc. Curabitur eleifend facilisis velit finibus tristique. Nam vulputate, eros non luctus efficitur, ipsum odio volutpat massa, sit amet sollicitudin est libero sed ipsum. Nulla lacinia, ex vitae gravida fermentum, lectus ipsum gravida arcu, id fermentum metus arcu vel metus. Curabitur eget sem eu risus tincidunt eleifend ac ornare magna.
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-window-close"></i> Cancelar</button>
                <button id="btnProcesarPago" type="button" class="btn btn-primary"><i class="far fa-save"></i> Procesar</button>
                <a id="btnImprimirComprobante" style="display: none;" class="btn btn-secondary"><i class="far fa-file-pdf"></i> Imprimir comprobante</a>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content -->
    <div class="modal fade" id="modal-establecimientos" tabindex="-1" aria-hidden="true">
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

 @endsection
@push('scripts')
    <script>
    var establishmenttable;
    let token = "{{csrf_token()}}";
    let loading = document.getElementById('loading');
    let btnpago = document.getElementById('btnpago');
    let btnProcesarPago = document.getElementById('btnProcesarPago');

    function recargarTablaEstablecimiento(){
        establishmenttable.ajax.reload();
    }
    //cargar modal persona
    modalempresa.addEventListener('click', function(e) {
        //document.getElementById('numbermodal').value = 1;
        $('#modal-establecimientos').modal('show');
        //loading_modal.style.display = '';

    });

    function verificarSeleccionCasillas(){
        let formData2 = new FormData(formLiquidaciones);
        if(formData2.getAll("checkLiquidacion[]").length > 0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    btnpago.addEventListener('click', function(e) {
        if(verificarSeleccionCasillas() === false){
            toastr.error('!Advertencia. No hay ninguna liquidacion seleccionada');
            return false;
        }
        $('#modalpago').modal('show');
        var formLiquidaciones = document.getElementById('formLiquidaciones');
        let formData = new FormData(formLiquidaciones);
        axios.post('{{route("liquidation.pago")}}',formData).then(function(res) {
            if(res.status==200) {
                if(res.data.estado == 'ok'){
                    var array_Liquidation = res.data.Liquidation;
                    var countLiquidation = Object.keys(array_Liquidation).length;
                    var totalapagar = parseFloat(0);
                    var tablehtmlLiquidation = '';
                    if(countLiquidation > 0){
                        for (let clave2 in array_Liquidation){
                            for (var key in array_Liquidation[clave2])
                            {
                                if (array_Liquidation[clave2].hasOwnProperty(key)) {
                                    totalapagar = parseFloat(totalapagar) + parseFloat(array_Liquidation[clave2][key]['total']);
                                }
                            }
                        }
                    }
                    let htotal2 = document.getElementById('htotal2');
                    htotal2.innerHTML = 'Valor a Cancelar ' + totalapagar;
                    document.getElementById('inputValorCobrar').value = totalapagar;
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
        var overlaymodalpago = document.getElementById('overlaymodalpago');
        overlaymodalpago.setAttribute('style','display:none');
    });
    function selectEstablishment(id,name,ruc,propietario){
        loading.style.display = '';
        let inputEstablishmentId = document.getElementById('establishment_id_2');
        let establishment_id = document.getElementById('establishment_id');
        let btnConsulta = document.getElementById('btnConsulta');
        btnConsulta.removeAttribute('disabled');
        inputEstablishmentId.value = id;
        establishment_id.value = name;
        $('#modal-establecimientos').modal('hide');
        var tbodyPagoLuaf = document.getElementById('tbodyPagoLuaf');
        tablehtmlLiquidation = '<tr>';
        tablehtmlLiquidation += '<td>';
        tablehtmlLiquidation += ruc;
        tablehtmlLiquidation += '</td>';
        tablehtmlLiquidation += '<td>';
        tablehtmlLiquidation += name;
        tablehtmlLiquidation += '</td>';
        tablehtmlLiquidation += '<td>';
        tablehtmlLiquidation += propietario;
        tablehtmlLiquidation += '</td>';
        tablehtmlLiquidation += '<td>';
        tablehtmlLiquidation += '';
        tablehtmlLiquidation += '</td>';
        tablehtmlLiquidation += '</tr>';
        tbodyPagoLuaf.innerHTML = tablehtmlLiquidation;
        var tbodyLiquidation = document.getElementById('tbodyLiquidation');
        tbodyLiquidation.innerHTML = '';
        loading.setAttribute('style','display:none');
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
                                    tablehtmlLiquidation += '<button type="button" class="btn btn-info btn-xs" onclick="mostrardetalleliquidacion('+array_Liquidation[clave2][key]['id']+')"><i class="fa fa-solid fa-eye"></i></button> <button class="btn btn-info btn-xs"><i class="fa fa-solid fa-money-bill"></i></button>'
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
    btnProcesarPago.addEventListener('click', function(e) {
        var overlaymodalpago = document.getElementById('overlaymodalpago');
        overlaymodalpago.removeAttribute('style');
        if(verificarSeleccionCasillas() === false){
            toastr.error('!Advertencia. No hay ninguna liquidacion seleccionada');
            return false;
        }
        var inputValorCobrar = document.getElementById('inputValorCobrar');
        if(inputValorCobrar.value == '' || inputValorCobrar == null){
            alertPago.setAttribute('style','');
            alertPago.setAttribute('class','alert alert-warning');
            alertPago.innerHTML = '¡Advertencia!. Debe llenar el campo valor cobrar';
            toastr.warning('¡Advertencia!. Debe llenar el campo valor cobrar');
            overlaymodalpago.setAttribute('style','display:none');
            return false;
        }
        var formLiquidaciones = document.getElementById('formLiquidaciones');
        let formData = new FormData(formLiquidaciones);
        formData.append('value',inputValorCobrar.value);
        axios.post('{{route("pay.store")}}',formData).then(function(res) {
            if(res.status==200) {
                var alertPago = document.getElementById('alertPago');
                var btnProcesarPago = document.getElementById('btnProcesarPago');

                if(res.data.estado == 'ok'){
                    var btnImprimirComprobante = document.getElementById('btnImprimirComprobante');
                    var htotal = document.getElementById('htotal');
                    var establishment_id_2 = document.getElementById('establishment_id_2');
                    var establishment_id = document.getElementById('establishment_id');
                    btnImprimirComprobante.removeAttribute('style');
                    btnImprimirComprobante.setAttribute('href',res.data.enlace);
                    toastr.success('¡Felicidades!. Se registro el pago, descarga el comprobante');
                    alertPago.setAttribute('style','');
                    alertPago.setAttribute('class','alert alert-success');
                    alertPago.innerHTML = '¡Felicidades!. Se registro el pago, descarga el comprobante';
                    var tbodyLiquidation = document.getElementById('tbodyLiquidation');
                    tbodyLiquidation.innerHTML = '';
                    establishment_id.value = '';
                    establishment_id_2.value = '';
                    htotal.innerHTML = 'Total a pagar 0.00';
                    //falta descargar el comprobante
                    overlaymodalpago.setAttribute('style','display:none');
                    btnProcesarPago.setAttribute('disabled','disabled');
                }else if(res.data.estado == 'validacion'){
                    alertPago.setAttribute('style','');
                    alertPago.setAttribute('class','alert alert-warning');
                    alertPago.innerHTML = '¡Advertencia!. Debe llenar el campo valor cobrar';
                    overlaymodalpago.setAttribute('style','display:none');
                }else{
                    toastr.error('Atencion. Hubo un error al conectarse al servidor, reporta al administrador de sistemas');
                    alertPago.setAttribute('style','');
                    alertPago.setAttribute('class','alert alert-danger');
                    alertPago.innerHTML = 'Importante!. Hubo un error de conexion al servidor, contacte al administrador de sistemas';
                    overlaymodalpago.setAttribute('style','display:none');
                    console.log('error al consultar al servidor');
                }

            }
        }).catch(function(err) {
            console.log(err);
            overlaymodalpago.setAttribute('style','display:none');
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
        //overlaymodalpago.setAttribute('style','display:none');
    });
    $('#modalpago').on('hidden.bs.modal', function (e) {
        var alertPago = document.getElementById('alertPago');
        var btnImprimirComprobante = document.getElementById('btnImprimirComprobante');
        alertPago.setAttribute('style','display:none');
        btnImprimirComprobante.setAttribute('style','display:none');
        document.getElementById('inputValorCobrar').value = '';
        document.getElementById('inputCambio').value = '';
        document.getElementById('inputValorRecibido').value = '';

    })
    function mostrardetalleliquidacion(id){
        $('#modalDetalle').modal('show');
        var overlaymodaldetalle = document.getElementById('overlaymodaldetalle');
        axios.post('{{route("liquidation.detalle")}}',{liquidacion_id : id}).then(function(res) {
            if(res.status==200) {
                if(res.data.estado == 'ok'){
                    var array_Liquidation = res.data.Liquidation;
                    var countLiquidation = Object.keys(array_Liquidation).length;
                    var totalapagar = parseFloat(0);
                    var tablehtmlLiquidation = '';
                    var tbodytablerubro = '';
                    if(countLiquidation > 0){
                        for (let clave2 in array_Liquidation){
                            for (var key in array_Liquidation[clave2])
                            {
                                if (array_Liquidation[clave2].hasOwnProperty(key)) {
                                    document.getElementById('tdestablecimiento').innerHTML = array_Liquidation[clave2][key]['establisment_name'];
                                    document.getElementById('tdruc').innerHTML = array_Liquidation[clave2][key]['cc_ruc'];
                                    document.getElementById('tdpropietario').innerHTML = array_Liquidation[clave2][key]['propietario'];
                                    document.getElementById('tdrepresentante').innerHTML = array_Liquidation[clave2][key]['representante'];
                                    document.getElementById('tdliquidacion').innerHTML = '<strong># Liquidacion: </strong>'+array_Liquidation[clave2][key]['liquidation_number'];
                                    document.getElementById('tdfecha').innerHTML = '<strong>Fecha: </strong>'+array_Liquidation[clave2][key]['fecha'];
                                    document.getElementById('tdvalor').innerHTML = '<strong>Valor: </strong>'+ parseFloat(array_Liquidation[clave2][key]['total']);
                                    if(array_Liquidation[clave2][key]['status'] == 1){
                                        document.getElementById('tdestado').innerHTML = '<strong>Estado: </strong> PAGADO';
                                    }else{
                                        document.getElementById('tdestado').innerHTML = '<strong>Estado: </strong> POR PAGAR';
                                    }
                                    document.getElementById('tdemision').innerHTML = parseFloat(array_Liquidation[clave2][key]['total_payment']);
                                    document.getElementById('tdinteres').innerHTML = parseFloat(array_Liquidation[clave2][key]['interes']);
                                    document.getElementById('tdrecargo').innerHTML = parseFloat(array_Liquidation[clave2][key]['recargo']);
                                    document.getElementById('tddescuento').innerHTML = parseFloat(array_Liquidation[clave2][key]['descuento']);
                                    document.getElementById('tdtotal').innerHTML = parseFloat(array_Liquidation[clave2][key]['total']);

                                    var countRubroLiquidacion = Object.keys(array_Liquidation[clave2][key]['liquidation_rubro']).length;

                                    if(countRubroLiquidacion > 0){
                                        for (let clave3 in array_Liquidation[clave2][key]['liquidation_rubro']){
                                            tbodytablerubro += '<tr>';
                                            tbodytablerubro += '<td>';
                                            tbodytablerubro += array_Liquidation[clave2][key]['liquidation_rubro'][clave3]['name']
                                            tbodytablerubro += '</td>';
                                            tbodytablerubro += '<td>';
                                            tbodytablerubro += array_Liquidation[clave2][key]['liquidation_rubro'][clave3]['pivot']['value'];
                                            tbodytablerubro += '</td>';
                                            tbodytablerubro += '</tr>';
                                        }
                                    }

                                }
                            }
                        }

                    }
                    console.log(tbodytablerubro);
                    document.getElementById('tbodyrubro').innerHTML = tbodytablerubro;
                    overlaymodaldetalle.setAttribute('style','display:none');
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
    }
    function calcularCambio(){
        if (event.keyCode === 13) {
            var overlaymodalpago = document.getElementById('overlaymodalpago');
            overlaymodalpago.removeAttribute('style');
            var inputValorRecibido = document.getElementById('inputValorRecibido');
            var inputValorCobrar = document.getElementById('inputValorCobrar');
            var inputCambio = document.getElementById('inputCambio');
            resultado = parseFloat(inputValorRecibido.value - inputValorCobrar.value);
            inputCambio.value = resultado.toFixed(2);
            overlaymodalpago.setAttribute('style','display:none');
        }
    }
    $(function () {
        var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });
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

