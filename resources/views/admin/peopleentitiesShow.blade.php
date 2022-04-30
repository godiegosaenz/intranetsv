@extends('layouts.app')
@section('content')
    <x-header title="Perfil">
    <li class="breadcrumb-item"><a href="{{ route('peopleentities.index') }}">Personas/empresas</a></li>
    <li class="breadcrumb-item active">Mostrar</li>
  </x-header>
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="card card-primary card-outline">
            <div class="card-body box-profile">
              <div class="text-center">
                <img class="profile-PersonEntity-img img-fluid img-circle"
                     src="/img/perfil-vacio.png"
                     alt="PersonEntity profile picture">
              </div>

              <h3 class="profile-PersonEntityname text-center">{{$PersonEntity->name}}</h3>

              <p class="text-muted text-center">{{$PersonEntity->status}}</p>

              <ul class="list-group list-group-unbordered mb-3">
                <li class="list-group-item">
                  <b>Creación</b> <a class="float-right">{{$PersonEntity->created_at}}</a>
                </li>
                <li class="list-group-item">
                    <b>modificaion</b> <a class="float-right">{{$PersonEntity->updated_at}}</a>
                </li>
              </ul>

              <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

          <!-- /.card -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Datos Generales</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="row">
                  <div class="col-lg-6">
                        @if($PersonEntity->type_document == 1)
                        <strong><i class="fas fa-map-marker-alt mr-1"></i> Cedula</strong>
                        @else
                        <strong><i class="fas fa-map-marker-alt mr-1"></i> Ruc</strong>
                        @endif

                        <p class="text-muted">{{$PersonEntity->cc_ruc}}</p>

                        <hr>
                        @if($PersonEntity->type == 1)
                        <strong><i class="fas fa-book mr-1"></i> Nombres</strong>
                        <p class="text-muted">
                            {{$PersonEntity->name}}
                        </p>
                        <hr>
                        <strong><i class="fas fa-map-marker-alt mr-1"></i> Apellidos</strong>

                        <p class="text-muted">{{$PersonEntity->last_name.' '.$PersonEntity->maternal_last_name}}</p>

                        @else
                        <strong><i class="fas fa-book mr-1"></i> Nombre comercial</strong>
                        <p class="text-muted">
                            {{$PersonEntity->tradename}}
                        </p>
                        <hr>
                        <strong><i class="fas fa-map-marker-alt mr-1"></i> Razon Social</strong>

                        <p class="text-muted">{{$PersonEntity->bussines_name}}</p>

                        @endif

                        <hr>
                        @if($PersonEntity->type == 1)
                        <strong><i class="fas fa-calendar mr-1"></i> Fecha de nacimiento</strong>
                        @else
                        <strong><i class="fas fa-calendar mr-1"></i> Fecha de inicio de actividades</strong>
                        @endif
                        <p class="text-muted">{{$PersonEntity->date_birth}}</p>
                        <hr>
                        <strong><i class="fas fa-at mr-1"></i> Correo electronico</strong>

                        <p class="text-muted">{{$PersonEntity->email}}</p>
                        <hr>
                        <strong><i class="far fa-file-alt mr-1"></i> Estado</strong>
                        @if($PersonEntity->status == 1)
                          <p class="text-muted">Activo</p>
                        @else
                          <p class="text-muted">Inactivo</p>
                        @endif
                  </div>
                  <div class="col-lg-6">
                    <strong><i class="fas fa-users mr-1"></i> Tipo de persona</strong>
                    @if($PersonEntity->type_document == 1)
                    <p class="text-muted">Persona Natural</p>
                    @else
                    <p class="text-muted">Persona Juridica</p>
                    @endif
                    <hr>
                    @if($PersonEntity->is_required_accounts == 1)
                    <strong><i class="fas fa-book mr-1"></i> Obligado a llevar contabilidad</strong>
                    <p class="text-muted">
                        SI
                    </p>
                    @else
                    <strong><i class="fas fa-calculator mr-1"></i> Obligado a llevar contabilidad</strong>
                    <p class="text-muted">
                        NO
                    </p>
                    @endif

                    <hr>
                    <strong><i class="fa fa-wheelchair"></i> Discapacidad</strong>
                    @if($PersonEntity->has_disability == 1)
                    <p class="text-muted">SI</p>
                    @else
                    <p class="text-muted">NO  </p>
                    @endif
                    <hr>
                    <strong><i class="fa fa-user mr-1"></i> Tiene tercera edad</strong>
                    @if($PersonEntity->old_age == 1)
                    <p class="text-muted">SI</p>
                    @else
                    <p class="text-muted">NO  </p>
                    @endif
                    <hr>
                    <strong><i class="fa fa-phone"></i> Telefono celular</strong>
                    <p class="text-muted">{{$PersonEntity->number_phone1}}</p>
                    <hr>
                    <strong><i class="far fa-map mr-1"></i> Direccion</strong>
                    <p class="text-muted">{{$PersonEntity->address}}</p>

              </div>
                </div>

            </div>
            <!-- /.card-body -->
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
@endsection
