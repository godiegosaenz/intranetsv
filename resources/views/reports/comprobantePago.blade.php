<!DOCTYPE html>
<html>
<head>
    <title>Hi</title>
    <style>
        .tablecomprobante {
            font-family: arial, verdana, sans-serif;
        }
        .tablecomprobante td ,
        .tablecomprobante th {
            background-color: #fff !important;
        }

        .anulado{
            font-family: arial, verdana, sans-serif;
            position: absolute;
            letter-spacing:10px;
            top: 60px;
            left: 100px;
            z-index: 100;
            font-size: 100px;
            transform: rotate(45deg);
            color: red;
        }


    </style>
</head>
<body>
    @if($Pay->status == 2)
        <p class="anulado" style="opacity: 0.5;">ANULADO</p>
    @endif
    <div class="contenido">
        <div class="cabecera">
            <table class="tablecomprobante" style="width:100%;">
                <tr>
                    <td style="width: 50px;" rowspan="2"><img src="{{asset('img/logogadmsv.jpg')}}" alt="Logo" height="100px"></td>
                    <td style="margin:0px; padding:0px;" align="center"><h4 style="margin:0px;">G.A.D. MUNICIPAL DEL CANTON SAN VICENTE</h4><h5 style="margin:0px;">DEPARTAMENTO FINANCIERO</h5></td>
                </tr>
                <tr>
                    <td align="center">
                        <table style="border:0px;" width="100%" border="0">
                            <tr style="border:0px;">
                                <td style="width: 50%;border:0px;font-size:9;" align="left"><strong>LICENCIA UNICA ANUAL DE FUNCIONAMIENTO DEL AÑO 2022</strong></td>
                                <td style="width: 50%;border:0px;" rowspan="2">
                                    <table style="border:0px;border-collapse: collapse !important;font-size:7;" width="100%" heigth="100%" class="tableinformacion2">
                                        <tr>
                                            <td style="width:33%;border: 1px solid black;"><strong>Fecha de impresion:</strong><br><p>{{ now()}}</p></td>
                                            <td style="width:33%;border: 1px solid black;"><strong>Cajero:</strong> :<br>{{$Pay->UserName}}</td>
                                            <td style="border: 1px solid black;"><strong>Comprobante:</strong><br> {{ $Pay->NumComprobante }}</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr style="border:0px;">
                                <td style="border:0px;font-size:9;" align="left"><strong>TITULO DE CREDITO N° {{$Pay->liquidation->liquidation_code}}</strong></td>
                            </tr>


                        </table>
                    </td>
                </tr>
            </table>

        </div>
        <div style="margin-top: 5px;">
            <table style="border:0px;border-collapse: collapse !important;font-size:10;font-family: arial, verdana, sans-serif;" width="100%" border="1" cellspacing="">
                <tr>
                    <td style="border: 1px solid black;"><strong>RUC/CI: </strong><br>{{$Pay->liquidation->establishment->people_entities_establishment->cc_ruc}}</td>
                    <td><strong>Establecimiento: </strong><br>{{$Pay->liquidation->establishment->name}}</td>
                    <td><strong>Contribuyente: </strong><br>{{$Pay->liquidation->establishment->people_entities_owner->name.' '.$Pay->liquidation->establishment->people_entities_owner->name}}</td>
                </tr>
                <tr>
                    <td><strong>Fecha de emisión: </strong><br>{{$Pay->liquidation->created_at}}</td>
                    <td><strong>Fecha de recaudación: </strong><br>{{$Pay->payment_day}}</td>
                    @if($Pay->liquidation->establishment->address != null)
                    <td><strong>Dirección: </strong><br>{{$Pay->liquidation->establishment->address}}</td>
                    @else
                    <td><strong>Dirección: </strong><br>S/N</td>
                    @endif
                </tr>
            </table>
        </div>
        <div style="margin-top: 10px;">
            <table style="border:0px;border-collapse: collapse !important;font-size:9;font-family: arial, verdana, sans-serif;" width="100%" border="1" cellspacing="">
                <tr>
                    <td style="width: 70%;padding:10px;" align="center"><strong>CONCEPTO DE RUBRO</strong></td>
                    <td style="padding:10px;"><strong>VALORES</strong></td>
                </tr>
                <tr>
                    <td style="vertical-align:top;">
                        <table style="border:0px;border-collapse: collapse !important;font-size:9; width:100%;">
                            <tr>
                                <td style="padding: 5px;"><strong>RUBRO</strong></td>
                                <td style="text-align: right;padding-right: 25px;"><strong>VALOR</strong></td>
                            </tr>
                            @foreach ($Pay->rubro as $pr)
                                <tr>
                                    <td style="padding: 5px;">{{$pr->name}}</td>
                                    <td style="text-align: right;padding-right: 25px;">{{$pr->pivot->value}}</td>
                                </tr>
                            @endforeach
                        </table>
                        <br>
                        <br>
                        <br>
                        <br>

                    </td>
                    <td>
                        <div>
                            <table style="border-collapse: collapse !important;font-size:9; width:100%;">
                                <tr >
                                    <td style="border:0px solid black;padding:5px;">Efectivo</td>
                                    <td>{{$Pay->value}}</td>
                                </tr>
                                <tr>
                                    <td style="border:0px solid black;padding:5px;">Nota de credito</td>
                                    <td>0.00</td>
                                </tr>
                                <tr>
                                    <td style="border:0px solid black;padding:5px;">Transferencia</td>
                                    <td">0.00</td>
                                </tr>
                            </table>
                        </div>
                        <br>
                        <div>
                            <table style="border-collapse: collapse !important;font-size:9; width:100%;">
                                <tr>
                                    <td style="border:1px solid black;padding:5px;">Subtotal</td>
                                    <td style="border:1px solid black;">{{$Pay->liquidation->total_payment}}</td>
                                </tr>
                                <tr>
                                    <td style="border:1px solid black;padding:5px;">Intereses</td>
                                    <td style="border:1px solid black;">{{$Pay->interest}}</td>
                                </tr>
                                <tr>
                                    <td style="border:1px solid black;padding:5px;">Descuentos</td>
                                    <td style="border:1px solid black;">{{$Pay->discount}}</td>
                                </tr>
                                <tr>
                                    <td style="border:1px solid black;padding:5px;">Recargos</td>
                                    <td style="border:1px solid black;">{{$Pay->surcharge}}</td>
                                </tr>
                                <tr>
                                    <td style="border:1px solid black;padding:5px;">Total a Cancelar</td>
                                    <td style="border:1px solid black;">{{$Pay->value}}</td>
                                </tr>
                            </table>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
        <div style="margin-top: 10px;">
            <table>
                <tr>
                    <td style="text-align:center;width:25%; padding-right:15px;">________________</td>
                    <td style="text-align:center;width:25%; padding-right:15px;">________________</td>
                    <td style="text-align:center;width:25%; padding-right:15px;">________________</td>
                </tr>
                <tr>
                    <td style="text-align:center;width:25%; padding-right:15px;">Tesorero(a)</td>
                    <td style="text-align:center;width:25%;padding-right:15px;">Recaudador(a)</td>
                    <td style="text-align:center;width:25%;padding-right:15px;">Jefe de Rentas(a)</td>
                </tr>
            </table>
        </div>
    </div>
</body>
</html>
