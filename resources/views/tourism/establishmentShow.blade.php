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
                    <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">Home</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false">Profile</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-four-messages-tab" data-toggle="pill" href="#custom-tabs-four-messages" role="tab" aria-controls="custom-tabs-four-messages" aria-selected="false">Messages</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-four-settings-tab" data-toggle="pill" href="#custom-tabs-four-settings" role="tab" aria-controls="custom-tabs-four-settings" aria-selected="false">Settings</a>
                    </li>
                    </ul>
                    </div>
                    <div class="card-body">
                    <div class="tab-content" id="custom-tabs-four-tabContent">
                    <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                        <div class="row">
                            <div class="col-lg-3"></div>
                            <div class="col-lg-6 text-center">
                                <h4>Datos de Ruc</h4>
                            </div>
                            <div class="col-lg-3"></div>

                        </div>
                        <hr/>
                        <div class="row">
                            <div class="col-lg-2 col-md-1"></div>
                            <div class="col-lg-1 col-lg-2"><i class="fa fa-user"></i> Nombres :</div>
                            <div class="col-lg-3 col-lg-3">{{$Establishment->name}}</div>
                            <div class="col-lg-1 col-lg-2"><i class="fa fa-user"></i> Apellido :</div>
                            <div class="col-lg-3 col-lg-3">Bermudez Saenz</div>
                            <div class="col-lg-2 col-lg-1"></div>
                        </div>
                        <hr/>
                        <div class="row">
                            <div class="col-lg-2 col-lg-1"></div>
                            <div class="col-lg-1 col-lg-2"><i class="fa fa-envelope"></i> Correo :</div>
                            <div class="col-lg-3 col-lg-3">dbermudez1349@hotmail.com</div>
                            <div class="col-lg-1 col-lg-2"><i class="fa fa-check"></i> Estado : </div>
                            <div class="col-lg-3 col-lg-3">Activo</div>
                            <div class="col-lg-2 col-lg-1"></div>
                        </div>
                        <hr/>
                        <div class="row">
                            <div class="col-lg-2 col-lg-1"></div>
                            <div class="col-lg-1 col-lg-2"><i class="fa fa-phone"></i> Telefono :</div>
                            <div class="col-lg-3 col-lg-3">0939120904</div>
                            <div class="col-lg-1 col-lg-2"><i class="fa fa-hourglass"></i> Edad :</div>
                            <div class="col-lg-3 col-lg-3">30 a;os</div>
                            <div class="col-lg-2 col-lg-1"></div>
                        </div>
                        <hr/>
                        <div class="row">
                            <div class="col-lg-2 col-lg-1"></div>
                            <div class="col-lg-1 col-lg-2"><i class="fa fa-flag"></i> Pais :</div>
                            <div class="col-lg-3 col-lg-3">Ecuador</div>
                            <div class="col-lg-1 col-lg-2"><i class="fa fa-flag"></i> Provincia :</div>
                            <div class="col-lg-3 col-lg-3">Manabi</div>
                            <div class="col-lg-2 col-lg-1"></div>
                        </div>
                        <hr/>
                        <div class="row">
                            <div class="col-lg-2 col-lg-1"></div>
                            <div class="col-lg-1 col-lg-2"><i class="fa fa-flag"></i> Canton :</div>
                            <div class="col-lg-3 col-lg-3">Sucre</div>
                            <div class="col-lg-1 col-lg-2"><i class="fa fa-flag"></i> Parroquia :</div>
                            <div class="col-lg-3 col-lg-3">Leonidas Plaza</div>
                            <div class="col-lg-2 col-lg-1"></div>
                        </div>
                        <hr/>
                        <div class="row">
                            <div class="col-lg-3"></div>
                            <div class="col-lg-6 text-center">
                                <h4>Datos de Establecimiento</h4>
                            </div>
                            <div class="col-lg-3"></div>

                        </div>
                        <hr/>
                        <div class="row">
                            <div class="col-lg-2 col-md-1"></div>
                            <div class="col-lg-1 col-lg-2"><i class="fa fa-user"></i> Nombre :</div>
                            <div class="col-lg-3 col-lg-3">{{$Establishment->name}}</div>
                            <div class="col-lg-1 col-lg-2"><i class="fa fa-user"></i> Tipo de organizacion :</div>
                            <div class="col-lg-3 col-lg-3">{{$Establishment->organization_type}}</div>
                            <div class="col-lg-2 col-lg-1"></div>
                        </div>
                        <hr/>
                        <div class="row">
                            <div class="col-lg-2 col-lg-1"></div>
                            <div class="col-lg-1 col-lg-2"><i class="fa fa-envelope"></i> Numero de registro :</div>
                            <div class="col-lg-3 col-lg-3">{{$Establishment->registry_number}}</div>
                            <div class="col-lg-1 col-lg-2"><i class="fa fa-check"></i> Registro catastral : </div>
                            <div class="col-lg-3 col-lg-3">{{$Establishment->cadastral_registry}}</div>
                            <div class="col-lg-2 col-lg-1"></div>
                        </div>
                        <hr/>
                        <div class="row">
                            <div class="col-lg-2 col-lg-1"></div>
                            <div class="col-lg-1 col-lg-2"><i class="fa fa-phone"></i> Pagina web :</div>
                            <div class="col-lg-3 col-lg-3">{{$Establishment->web_page}}</div>
                            <div class="col-lg-1 col-lg-2"><i class="fa fa-hourglass"></i> Telefono :</div>
                            <div class="col-lg-3 col-lg-3">{{$Establishment->phone}}</div>
                            <div class="col-lg-2 col-lg-1"></div>
                        </div>
                        <hr/>
                        <div class="row">
                            <div class="col-lg-2 col-lg-1"></div>
                            <div class="col-lg-1 col-lg-2"><i class="fa fa-flag"></i> Actividad turistica :</div>
                            <div class="col-lg-3 col-lg-3">{{$Establishment->tourist_activities->name}}</div>
                            <div class="col-lg-1 col-lg-2"><i class="fa fa-flag"></i> Clasificacion :</div>
                            <div class="col-lg-3 col-lg-3">{{$Establishment->establishments_classifications->name}}</div>
                            <div class="col-lg-2 col-lg-1"></div>
                        </div>
                        <hr/>
                        <div class="row">
                            <div class="col-lg-2 col-lg-1"></div>
                            <div class="col-lg-1 col-lg-2"><i class="fa fa-flag"></i> Categoria :</div>
                            <div class="col-lg-3 col-lg-3">Sucre</div>
                            <div class="col-lg-1 col-lg-2"><i class="fa fa-flag"></i> Lugar de funcionamiento :</div>
                            <div class="col-lg-3 col-lg-3">Leonidas Plaza</div>
                            <div class="col-lg-2 col-lg-1"></div>
                        </div>
                        <hr/>
                        <div class="row">
                            <div class="col-lg-2 col-lg-1"></div>
                            <div class="col-lg-1 col-lg-2"><i class="fa fa-flag"></i> Fecha de inicio :</div>
                            <div class="col-lg-3 col-lg-3">Sucre</div>
                            <div class="col-lg-1 col-lg-2"><i class="fa fa-flag"></i> Correo :</div>
                            <div class="col-lg-3 col-lg-3">Leonidas Plaza</div>
                            <div class="col-lg-2 col-lg-1"></div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
                    Mauris tincidunt mi at erat gravida, eget tristique urna bibendum. Mauris pharetra purus ut ligula tempor, et vulputate metus facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Maecenas sollicitudin, nisi a luctus interdum, nisl ligula placerat mi, quis posuere purus ligula eu lectus. Donec nunc tellus, elementum sit amet ultricies at, posuere nec nunc. Nunc euismod pellentesque diam.
                    </div>
                    <div class="tab-pane fade" id="custom-tabs-four-messages" role="tabpanel" aria-labelledby="custom-tabs-four-messages-tab">
                    Morbi turpis dolor, vulputate vitae felis non, tincidunt congue mauris. Phasellus volutpat augue id mi placerat mollis. Vivamus faucibus eu massa eget condimentum. Fusce nec hendrerit sem, ac tristique nulla. Integer vestibulum orci odio. Cras nec augue ipsum. Suspendisse ut velit condimentum, mattis urna a, malesuada nunc. Curabitur eleifend facilisis velit finibus tristique. Nam vulputate, eros non luctus efficitur, ipsum odio volutpat massa, sit amet sollicitudin est libero sed ipsum. Nulla lacinia, ex vitae gravida fermentum, lectus ipsum gravida arcu, id fermentum metus arcu vel metus. Curabitur eget sem eu risus tincidunt eleifend ac ornare magna.
                    </div>
                    <div class="tab-pane fade" id="custom-tabs-four-settings" role="tabpanel" aria-labelledby="custom-tabs-four-settings-tab">
                    Pellentesque vestibulum commodo nibh nec blandit. Maecenas neque magna, iaculis tempus turpis ac, ornare sodales tellus. Mauris eget blandit dolor. Quisque tincidunt venenatis vulputate. Morbi euismod molestie tristique. Vestibulum consectetur dolor a vestibulum pharetra. Donec interdum placerat urna nec pharetra. Etiam eget dapibus orci, eget aliquet urna. Nunc at consequat diam. Nunc et felis ut nisl commodo dignissim. In hac habitasse platea dictumst. Praesent imperdiet accumsan ex sit amet facilisis.
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
