@extends('layouts.app')
@section('content')
  <x-header title="Lista de comprobantes">
    <li class="breadcrumb-item active">Lista de comprobantes</li>
  </x-header>
  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row mb-3">

      </div>
      <div class="row">
        <div class="col-lg-12">
          <div class="card card-default">
            <div class="card-header">
                <h4 class="card-title">Lista de comprobantes pagados</h4>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
            </div>
            <div class="card-body">
                @csrf
                <table id="pay-table" class="table table-sm table-bordered table-hover">
                    <thead>
                    <tr>
                      <th>Detalle</th>
                      <th>Imprimir</th>
                      <th>Comprobante</th>
                      <th># liquidacion</th>
                      <th>Año</th>
                      <th>Establecimiento</th>
                      <th>Propietario</th>
                      <th>Estado</th>
                      <th>Valor</th>
                      <th>Fecha</th>
                      <th>Cajero</th>
                    </tr>
                    </thead>
                    <tbody>

                    </tbody>
                    <tfoot>

                    </tfoot>
                </table>
            </div>
          </div>
        </div>
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
@endsection
@section('modals')

<!-- Modal -->
<div class="modal fade" id="modalDetalle" tabindex="-1" role="dialog" aria-labelledby="modalDetalleLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div id="overlaymodalpago" class="overlay">
            <i class="fas fa-2x fa-sync fa-spin"></i>
        </div>
        <div class="modal-header">
          <h5 class="modal-title" id="modalDetalleLabel">Detalle</h5>
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
                        <tr>
                            <td colspan="4" style="background: #BCDCF9;">Detalle de emision</td>
                        </tr>
                        <tr>
                            <td style="width: 20%"><strong>Establecimiento</strong></td>
                            <td style="width: 30%" id="tdNombreEstablecimiento"></td>
                            <td><strong>Propietario</strong></td>
                            <td id="tdNombrePropietario"></td>
                        </tr>
                        <tr>
                            <td><strong>Año</strong></td>
                            <td id="tdYear"></td>
                            <td><strong>ID Emision</strong></td>
                            <td id="tdCodigoLiquidacion"></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <table class="table table-bordered table-sm">
                        <tr>
                            <td colspan="4" style="background: #BCDCF9;">Detalle de pago</td>
                        </tr>
                        <tr>
                            <td><strong>N° Comprobante</strong></td>
                            <td id="tdComprobanteId"></td>
                            <td><strong>Fecha de pago</strong></td>
                            <td id="tdfecha">2022-01-12</td>
                        </tr>
                        <tr>
                            <td><strong>Estado</strong></td>
                            <td id="tdEstado"></td>
                            <td><strong>Valor</strong></td>
                            <td id="tdValor"></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <button type="button" class="btn btn-block btn-secondary" data-dismiss="modal"><i class="far fa-file-pdf"></i> Imprimir</button>
                </div>
                <div class="col-4">
                    <button id="btnAnularPago" type="button" class="btn btn-block btn-danger" disabled><i class="fas fa-ban"></i> Anular pago</button>
                </div>
                <div class="col-4">
                    <button id="btnDetalleCompleto" type="button" class="btn btn-block btn-primary" onclick="detallecompleto()"><i class="fas fa-eye"></i> Ver detalle completo</button>
                </div>
            </div>
            <hr class="mt-3">
            <div id="divanularpago" class="row mt-3" style="display: none;">
                <div class="col-12">
                    <h4>Anular pago</h4>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="services_total_beds">Observacion</label>
                        <textarea name="observation" id="observation" class="form-control" cols="30" rows="2"></textarea>
                    </div>
                </div>
                <div class="col-6">
                    <button id="btnConfirmarAnulacionPago" type="button" class="btn btn-block btn-success"><i class="fas fa-eye"></i> Confirmar anulacion</button>
                </div>
                <div class="col-6">
                    <button id="btnCancelarAnulacionPago" type="button" class="btn btn-block btn-danger"><i class="fas fa-eye"></i> Cancelar anulacion</button>
                </div>
            </div>
        </div>

      </div>
    </div>
</div>
@endsection
@push('scripts')
    <script>
    var tablepay;
    var Toast;
    var btnAnularPago = document.getElementById('btnAnularPago');
    var btnCancelarAnulacionPago = document.getElementById('btnCancelarAnulacionPago');

    btnAnularPago.addEventListener('click', function(e) {
        var overlaymodalpago = document.getElementById('overlaymodalpago');
        var divanularpago = document.getElementById('divanularpago');
        overlaymodalpago.removeAttribute('style');
        divanularpago.removeAttribute('style');
        this.setAttribute('disabled','disabled');
        overlaymodalpago.setAttribute('style','display:none;');
    });

    btnCancelarAnulacionPago.addEventListener('click',function(e){
        var divanularpago = document.getElementById('divanularpago');
        var observation = document.getElementById('observation');
        divanularpago.setAttribute('style','display:none');
        btnAnularPago.removeAttribute('disabled');
        observation.value = '';
    });

    function detallecompleto(){

    }
    function selectDetalle(id){
        $('#modalDetalle').modal('show');
        axios.post('{{route("detail.pago")}}',{pay_id:id}).then(function(res) {
            if(res.status==200) {
                if(res.data.estado == 'ok'){
                    var array_Liquidation = res.data.pay;
                    var countLiquidation = Object.keys(array_Liquidation).length;
                    var totalapagar = parseFloat(0);
                    var tablehtmlLiquidation = '';
                    if(countLiquidation > 0){
                        for (let clave2 in array_Liquidation){
                            for (var key in array_Liquidation[clave2])
                            {
                                if (array_Liquidation[clave2].hasOwnProperty(key)) {
                                    document.getElementById('tdNombreEstablecimiento').innerHTML = array_Liquidation[clave2][key]['establisment_name'];
                                    document.getElementById('tdNombrePropietario').innerHTML = array_Liquidation[clave2][key]['propietario'];
                                    document.getElementById('tdYear').innerHTML = array_Liquidation[clave2][key]['year'];
                                    document.getElementById('tdCodigoLiquidacion').innerHTML = array_Liquidation[clave2][key]['liquidation_code'];
                                    document.getElementById('tdComprobanteId').innerHTML = array_Liquidation[clave2][key]['id'];
                                    document.getElementById('tdfecha').innerHTML = array_Liquidation[clave2][key]['payment_day'];
                                    document.getElementById('tdEstado').innerHTML = array_Liquidation[clave2][key]['statusPay'];
                                    document.getElementById('tdValor').innerHTML = array_Liquidation[clave2][key]['value'];
                                    document.getElementById('btnConfirmarAnulacionPago').setAttribute('onclick','anularPago('+array_Liquidation[clave2][key]['id']+')');
                                    if(array_Liquidation[clave2][key]['statusPay'] == 'Anulado'){
                                        btnAnularPago.setAttribute('disabled','disabled');
                                    }

                                }
                            }
                        }
                    }

                    //let htotal2 = document.getElementById('htotal2');
                    //htotal2.innerHTML = 'Valor a Cancelar ' + totalapagar;
                    //document.getElementById('inputValorCobrar').value = totalapagar;
                    var overlaymodalpago = document.getElementById('overlaymodalpago');
                    overlaymodalpago.setAttribute('style','display:none;');
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

    $(function () {
        Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });

        tablepay = $('#pay-table').DataTable({
            "lengthMenu": [ 5, 10],
            "language" : {
                "url": '{{ url("/js/spanish.json") }}',
            },
            "scrollX": true,
            "autoWidth": false,
            "order": [], //Initial no order
            "processing" : true,
            "serverSide": true,
            "ajax": {
                "url" : "{{ route('pay.datatables') }}",
                "type": "post",
                "data": function (d){
                    d._token = $("input[name=_token]").val();
                }
            },
            "columns": [
                {data: 'action', name: 'action', orderable: false, searchable: false},
                {data: 'imprimir'},
                {data: 'voucher_number'},
                {data: 'liquidation_code'},
                {data: 'year'},
                {data: 'establecimiento_name'},
                {data: 'propietario'},
                {data: 'status'},
                {data: 'value'},
                {data: 'payment_day'},
                {data: 'user'},
            ]
        });

        $('#modalDetalle').on('show.bs.modal', function () {
            document.getElementById('alertPago').setAttribute('style','display:none;');
            var divanularpago = document.getElementById('divanularpago');
            var observation = document.getElementById('observation');
            divanularpago.setAttribute('style','display:none');
            btnAnularPago.removeAttribute('disabled');
            observation.value = '';
        })
    });
    function anularPago(id){
        var overlaymodalpago = document.getElementById('overlaymodalpago');
        var observation = document.getElementById('observation');
        overlaymodalpago.removeAttribute('style');
        if(observation.value == null || observation.value == ''){
            toastr.info('¡Informacion!. Debe llenar el campo observacion para confirmar la anulacion');
            overlaymodalpago.setAttribute('style','display:none;');
            observation.setAttribute('class','form-control is-invalid');
            return false;
        }
        axios.post('{{route("cancel.pago")}}',{pay_id:id,observation:observation.value}).then(function(res) {
            if(res.status==200) {
                if(res.data.estado == 'ok'){
                    selectDetalle(id);
                    var btnAnularPago = document.getElementById('btnAnularPago');
                    var divanularpago = document.getElementById('divanularpago');
                    divanularpago.setAttribute('style','display:none');
                    btnAnularPago.setAttribute('disabled','disabled');
                    tablepay.ajax.reload();
                    toastr.success(res.data.message);
                    alertPago.setAttribute('style','');
                    alertPago.setAttribute('class','alert alert-success');
                    alertPago.innerHTML = res.data.message;
                    overlaymodalpago.setAttribute('style','display:none;');
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
    </script>
@endpush
