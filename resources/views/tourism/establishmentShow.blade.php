@extends('layouts.app')
@section('content')
    <x-header title="Detalle de establecimiento turistico">
        <li class="breadcrumb-item"><a href="{{ route('establishments.index') }}">Establecimiento turistico</a></li>
        <li class="breadcrumb-item active">Editar</li>
    </x-header>
    <section class="content">
        <div class="container-fluid">
        <div class="row">
            @if (session('status'))
                <div class="col-md-12">
                    <div class="alert alert-success">
                        {{session('status')}}
                    </div>
                </div>
            @endisset

            @if ($errors->any())

                <div class="col-md-12">
                    <div class="alert alert-danger">
                        {{$errors->first()}}
                    </div>
                </div>

            @endif
        </div>
            <!-- /.row -->
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary card-outline card-outline-tabs">
                    <div class="card-header p-0 border-bottom-0">
                    <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                        <li class="nav-item">
                        <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">Información</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false">Profile</a>
                        </li>
                    </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="custom-tabs-four-tabContent">
                            <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                                <div class="row">
                                    <div class="col-12">
                                        <table id="establishment-table" class="table table-sm table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th colspan="4" style="text-align: center;background: #E9F0F7;vertical-align: middle;" height="50"><strong>INFORMACIÓN DE ESTABLECIMIENTO</strong></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr style="background-color: #BCDCF9">
                                                    <td colspan="4" style="text-align: center"><strong>Informacion de ruc</strong></td>
                                                </tr>
                                                <tr>
                                                    @if($Establishment->people_entities_establishment->type == '1')
                                                    <td><i class="fa fa-user"></i> Cédula :</td>
                                                    @else
                                                    <td><i class="fa fa-user"></i> Rúc :</td>
                                                    @endif
                                                    <td>{{$Establishment->people_entities_establishment->cc_ruc}}</td>
                                                    <td>Tipo de persona</td>
                                                    <td>{{$Establishment->people_entities_establishment->TypePerson}}</td>
                                                </tr>
                                                <tr>
                                                    @if($Establishment->people_entities_establishment->type == '1')
                                                    <td><i class="fa fa-user"></i> Nombres :</td>
                                                    <td>{{$Establishment->people_entities_establishment->name}}</td>
                                                    <td><i class="fa fa-user"></i> Apellido :</td>
                                                    <td>{{$Establishment->people_entities_establishment->LastNameFull}}</td>
                                                    @else
                                                    <td><i class="fa fa-user"></i> Nombre comercial :</td>
                                                    <td>{{$Establishment->people_entities_establishment->tradename}}</td>
                                                    <td><i class="fa fa-user"></i> Razón social :</td>
                                                    <td>{{$Establishment->people_entities_establishment->bussines_name}}</td>
                                                    @endif
                                                </tr>
                                                <tr>
                                                    <td><i class="fa fa-envelope"></i> Correo :</td>
                                                    <td>{{$Establishment->people_entities_establishment->email}}</td>
                                                    <td><i class="fa fa-check"></i> Estado : </td>
                                                    <td>{{$Establishment->people_entities_establishment->status}}</td>
                                                </tr>
                                                <tr>
                                                    <td><i class="fa fa-phone"></i> Telefono :</td>
                                                    <td>{{$Establishment->people_entities_establishment->number_phone1}}</td>
                                                    <td><i class="fa fa-hourglass"></i> Edad :</td>
                                                    <td>{{$Establishment->people_entities_establishment->AgePerson.' años'}}</td>
                                                </tr>
                                                <tr style="background-color: #BCDCF9">
                                                    <td colspan="4" style="text-align: center"><strong>Informacion de Representante legal</strong></td>
                                                </tr>
                                                <tr>
                                                    @if($Establishment->people_entities_legal_representative->type == '1')
                                                    <td><i class="fa fa-user"></i> Cédula :</td>
                                                    @else
                                                    <td><i class="fa fa-user"></i> Rúc :</td>
                                                    @endif
                                                    <td>{{$Establishment->people_entities_legal_representative->cc_ruc}}</td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td><i class="fa fa-user"></i> Nombres :</td>
                                                    <td>{{$Establishment->people_entities_legal_representative->name}}</td>
                                                    <td><i class="fa fa-user"></i> Apellido :</td>
                                                    <td>{{$Establishment->people_entities_legal_representative->last_name}}</td>
                                                </tr>
                                                <tr>
                                                    <td><i class="fa fa-envelope"></i> Correo :</td>
                                                    <td>{{$Establishment->people_entities_legal_representative->email}}</td>
                                                    <td><i class="fa fa-check"></i> Estado : </td>
                                                    <td>{{$Establishment->people_entities_legal_representative->status}}</td>
                                                </tr>
                                                <tr>
                                                    <td><i class="fa fa-phone"></i> Telefono :</td>
                                                    <td>{{$Establishment->people_entities_legal_representative->number_phone1}}</td>
                                                    <td><i class="fa fa-hourglass"></i> Edad :</td>
                                                    <td>{{$Establishment->people_entities_legal_representative->AgePerson.' años'}}</td>
                                                </tr>
                                                <tr style="background-color: #BCDCF9">
                                                    <td colspan="4" style="text-align: center"><strong>Informacion de propietario</strong></td>
                                                </tr>
                                                <tr>
                                                    <td><i class="fa fa-user"></i> Cédula/Ruc :</td>
                                                    @if(isset($Establishment->people_entities_owner->cc_ruc))
                                                    <td>{{$Establishment->people_entities_owner->cc_ruc}}</td>
                                                    @else
                                                    <td></td>
                                                    @endif
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td><i class="fa fa-user"></i> Nombres :</td>
                                                    @if(isset($Establishment->people_entities_owner->name))
                                                    <td>{{$Establishment->people_entities_owner->name}}</td>
                                                    @else
                                                    <td></td>
                                                    @endif
                                                    <td><i class="fa fa-user"></i> Apellido :</td>
                                                    @if(isset($Establishment->people_entities_owner->name))
                                                    <td>{{$Establishment->people_entities_owner->last_name}}</td>
                                                    @else
                                                    <td></td>
                                                    @endif
                                                </tr>
                                                <tr>
                                                    <td><i class="fa fa-envelope"></i> Correo :</td>
                                                    @if(isset($Establishment->people_entities_owner->email))
                                                    <td>{{$Establishment->people_entities_owner->email}}</td>
                                                    @else
                                                    <td></td>
                                                    @endif
                                                    <td><i class="fa fa-check"></i> Estado : </td>
                                                    @if(isset($Establishment->people_entities_owner->status))
                                                    <td>{{$Establishment->people_entities_owner->status}}</td>
                                                    @else
                                                    <td></td>
                                                    @endisset
                                                </tr>
                                                <tr>
                                                    <td><i class="fa fa-phone"></i> Telefono :</td>
                                                    @if(isset($Establishment->people_entities_owner->number_phone1))
                                                    <td>{{$Establishment->people_entities_owner->number_phone1}}</td>
                                                    @else
                                                    <td></td>
                                                    @endif
                                                    <td><i class="fa fa-hourglass"></i> Edad :</td>
                                                    @if(isset($Establishment->people_entities_owner->AgePerson))
                                                    <td>{{$Establishment->people_entities_owner->AgePerson.' años'}}</td>
                                                    @else
                                                    <td></td>
                                                    @endif
                                                </tr>
                                                <tr style="background-color: #BCDCF9">
                                                    <td colspan="4" style="text-align: center"><strong>Informacion General</strong></td>
                                                </tr>
                                                <tr>
                                                    <td>Nombre del establecimiento</td>
                                                    <td>{{$Establishment->name}}</td>
                                                    <td>Tipo de establicimiento</td>
                                                    <td>{{$Establishment->EstablishmentTypeName}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Fecha de Inicio</td>
                                                    <td>{{$Establishment->start_date}}</td>
                                                    <td>El local es</td>
                                                    <td>{{$Establishment->localName}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Número de registro</td>
                                                    <td>{{$Establishment->registry_number}}</td>
                                                    <td>Registro Catastral</td>
                                                    <td>{{$Establishment->cadastral_registry}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Estado del establecimiento</td>
                                                    <td>{{$Establishment->status}}</td>
                                                    <td>Pagina web</td>
                                                    <td>{{$Establishment->web_page}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Correo electronico</td>
                                                    <td>{{$Establishment->email}}</td>
                                                    <td>Telefono celular</td>
                                                    <td>{{$Establishment->phone}}</td>
                                                </tr>
                                                <tr style="background-color: #BCDCF9">
                                                    <td colspan="4" style="text-align: center"><strong>Informacion de ubicación</strong></td>
                                                </tr>
                                                <tr>
                                                    <td>Pais</td>
                                                    <td>{{$Establishment->countries->name}}</td>
                                                    <td>Provincia</td>
                                                    <td>{{$Establishment->provinces->name}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Cantón</td>
                                                    <td>{{$Establishment->cantons->name}}</td>
                                                    <td>Parroquia</td>
                                                    <td>{{$Establishment->parishes->name}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Calle principal</td>
                                                    <td>{{$Establishment->main_street}}</td>
                                                    <td>Calle secundaria</td>
                                                    <td>{{$Establishment->secondary_street}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Lugar de referencia</td>
                                                    <td>{{$Establishment->location_reference}}</td>
                                                    <td>Número de establecimiento</td>
                                                    <td>{{$Establishment->number_establishment}}</td>
                                                </tr>
                                                <tr style="background-color: #BCDCF9">
                                                    <td colspan="4" style="text-align: center"><strong>Información de personal</strong></td>
                                                </tr>
                                                <tr>
                                                    <td>Número total de empleados</td>
                                                    <td>{{$Establishment->total_number_employees}}</td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>Número total de empleados hombres</td>
                                                    <td>{{$Establishment->total_number_male_employees}}</td>
                                                    <td>Número total de empleados mujeres</td>
                                                    <td>{{$Establishment->total_number_female_employees}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Número total de gerentes hombres</td>
                                                    <td>{{$Establishment->total_number_male_manager}}</td>
                                                    <td>Número total de gerentes mujeres</td>
                                                    <td>{{$Establishment->total_number_female_manager}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Número total de administradores hombres</td>
                                                    <td>{{$Establishment->total_number_administrative_men}}</td>
                                                    <td>Número total de administradoras mujeres</td>
                                                    <td>{{$Establishment->total_number_administrative_woman}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Número total de recepcionistas hombres</td>
                                                    <td>{{$Establishment->total_number_male_receptionists}}</td>
                                                    <td>Número total de recepcionistas mujeres</td>
                                                    <td>{{$Establishment->total_number_female_receptionists}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Número total de empleados en habitaciones</td>
                                                    <td>{{$Establishment->total_number_male_rooms}}</td>
                                                    <td>Número total de empleadas en habitaciones</td>
                                                    <td>{{$Establishment->total_number_female_rooms}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Número total de empleados en restaurante</td>
                                                    <td>{{$Establishment->total_number_male_restaurant}}</td>
                                                    <td>Número total de empleadas en restaurante</td>
                                                    <td>{{$Establishment->total_number_female_restaurant}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Número total de empleados en el bar</td>
                                                    <td>{{$Establishment->total_number_male_bars}}</td>
                                                    <td>Número total de empleadas en el bar</td>
                                                    <td>{{$Establishment->total_number_female_bars}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Número total de empleados en la cocina</td>
                                                    <td>{{$Establishment->total_number_male_cook}}</td>
                                                    <td>Número total de empleadas en la cocina</td>
                                                    <td>{{$Establishment->total_number_female_cook}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Número total de conserjes hombres</td>
                                                    <td>{{$Establishment->total_number_male_concierge}}</td>
                                                    <td>Número total de conserjes mujeres</td>
                                                    <td>{{$Establishment->total_number_female_concierge}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Número total de empleados en otras actividades</td>
                                                    <td>{{$Establishment->total_number_male_other}}</td>
                                                    <td>Número total de empleadas en otras actividades</td>
                                                    <td>{{$Establishment->total_number_female_other}}</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4" style="text-align: center;background: #E9F0F7;vertical-align: middle;" height="50"><strong>Informacion Turística</strong></td>
                                                </tr>
                                                <tr style="background-color: #BCDCF9">
                                                    <td colspan="4" style="text-align: center"><strong>Normativa</strong></td>
                                                </tr>
                                                <tr>
                                                    <td>Ambito de aplicación</td>
                                                    <td>{{$Establishment->tourist_activities->name}}</td>
                                                    <td>Actividad Turística</td>
                                                    <td>{{$Establishment->tourist_activities->name}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Clasificación</td>
                                                    <td>{{$Establishment->establishments_classifications->name}}</td>
                                                    <td>Categoría</td>
                                                    <td>{{$Establishment->establishments_categories->name}}</td>
                                                </tr>
                                                <tr style="background-color: #BCDCF9">
                                                    <td colspan="4" style="text-align: center"><strong>Capacidad del establecimiento</strong></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Tipo de Habitación</strong></td>
                                                    <td><strong>Numero de habitaciones</strong></td>
                                                    <td><strong>Numero de camas</strong></td>
                                                    <td><strong>Numero de plazas</strong></td>
                                                </tr>
                                                @foreach ($Establishment->rooms_hotels as $rh)
                                                    <tr>
                                                        <td>{{$rh->name}}</td>
                                                        <td>{{$rh->pivot->total}}</td>
                                                        <td>{{$rh->pivot->bed}}</td>
                                                        <td>{{$rh->pivot->plazas}}</td>
                                                    </tr>
                                                @endforeach
                                                <tr style="background-color: #BCDCF9">
                                                    <td colspan="4" style="text-align: center"><strong>Servicios complementarios</strong></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Servicio</strong></td>
                                                    <td><strong>Tipo de servicio</strong></td>
                                                    <td><strong>Cantidad de mesas</strong></td>
                                                    <td><strong>Cantidad de plazas</strong></td>
                                                </tr>
                                                @foreach ($Establishment->establishment_services as $th)
                                                <tr>
                                                    <td>{{$th->description}}</td>
                                                    @if ($th->pivot->services_type == 1)
                                                        <td>Alimentos y bebidas</td>
                                                    @else
                                                        <td>Otros</td>
                                                    @endif
                                                    <td>{{$th->pivot->services_total_beds}}</td>
                                                    <td>{{$th->pivot->services_total_plazas}}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>

                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">

                            </div>

                        </div>
                    </div>

                    </div>
            </div>
          </div>
        </div>
    </section>

@endsection
@push('scripts')
    <script>

    </script>
@endpush
