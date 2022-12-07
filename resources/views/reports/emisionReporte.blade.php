<!DOCTYPE html>
<html>
<head>
    <title>Hi</title>
</head>
<body>
    <div class="contenido">
        <div class="cabecera">
            <table>
                <tr>
                    <td rowspan="2"><img src="{{asset('img/logogadmsv.jpg')}}" alt="Logo" height="120px"></td>
                    <td align="center"><h2>Gobierno Autonomo Descentralizado Municipal del Canton San Vicente</h2></td>
                </tr>
                <tr>
                    <td align="center"><h4>Saldos de rubros de LUAF correspondiente al año 2022</h4></td>
                </tr>
            </table>
            <table width="100%" border="0">
                <tr>
                    <td align="left"><strong>Descripcion del Rubro</strong></td>
                    <td align="right"><strong>Valor emision inicial</strong></td>
                    <td align="right"><strong>Bajas</strong></td>
                    <td align="right"><strong>Valor de emision actual</strong></td>
                    <td align="right"><strong>Valor recaudado</strong></td>
                </tr>
                @foreach ($emision as $em)
                    <tr>
                        <td align="left">{{$em->rubros->name}}</td>
                        <td align="right">{{$em->InitialValueFormat}}</td>
                        <td align="right">{{number_format(0, 2, ',', '.')}}</td>
                        <td align="right">{{$em->InitialValueFormat}}</td>
                        <td align="right">{{number_format(0, 2, ',', '.')}}</td>
                    </tr>
                @endforeach
                <tr>
                    <td align="left"><strong>Totales>>></strong></td>
                    <td align="right">{{number_format($emision->sum('initial_value'), 2, ',', '.')}}</td>
                    <td align="right">{{number_format(0, 2, ',', '.')}}</td>
                    <td align="right">{{number_format($emision->sum('initial_value'), 2, ',', '.')}}</td>
                    <td align="right">{{number_format(0, 2, ',', '.')}}</td>
                </tr>

            </table>
        </div>
        <div class="cuerpo">
            <table width="100%" border="1" cellspacing="">
                <tr>
                    <td>Numero de liquidacion</td>
                    <td>Establecimiento</td>
                    <td>Codigo</td>
                    <td>Año</td>
                    <td>Valor LUAF</td>
                    <td>Administrativo</td>
                    <td>Total</td>
                </tr>
                @foreach ($Liquidation as $li)
                <tr>
                    <td>{{$li->liquidation_number}}</td>
                    <td>{{$li->establishment->name}}</td>
                    <td>{{$li->liquidation_code}}</td>
                    <td>{{$li->year}}</td>


                </tr>
                @endforeach
            </table>
        </div>
    </div>
</body>
</html>
