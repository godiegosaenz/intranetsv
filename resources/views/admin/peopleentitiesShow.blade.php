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
                        <strong><i class="fas fa-map-marker-alt mr-1"></i> Cedula</strong>
                        <p class="text-muted">{{$PersonEntity->cc_ruc}}</p>

                        <hr>

                        <strong><i class="fas fa-book mr-1"></i> Nombres</strong>
                        <p class="text-muted">
                            {{$PersonEntity->name}}
                        </p>

                        <hr>

                        <strong><i class="fas fa-map-marker-alt mr-1"></i> Apellidos</strong>

                        <p class="text-muted">{{$PersonEntity->last_name.' '.$PersonEntity->maternal_last_name}}</p>

                        <hr>

                        <strong><i class="fas fa-pencil-alt mr-1"></i> Fecha de nacimiento</strong>

                        <p class="text-muted">{{$PersonEntity->date_birth}}</p>

                        <hr>

                        <strong><i class="far fa-file-alt mr-1"></i> Edad</strong>

                        <p class="text-muted">29</p>
                  </div>
                  <div class="col-lg-6">
                    <strong><i class="fas fa-book mr-1"></i> Pais</strong>

                        <p class="text-muted">
                            {{$PersonEntity->countries->name}}
                        </p>

                        <hr>

                        <strong><i class="fas fa-map-marker-alt mr-1"></i> Provincias</strong>

                        <p class="text-muted">{{$PersonEntity->provinces->name}}</p>

                        <hr>

                        <strong><i class="fas fa-pencil-alt mr-1"></i> Cantones</strong>

                        <p class="text-muted">{{$PersonEntity->cantons->name}}</p>

                        <hr>

                        <strong><i class="far fa-file-alt mr-1"></i> Parroquia</strong>

                        <p class="text-muted">{{$PersonEntity->parishes->name}}</p>
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
