@extends('layouts.app')
@section('content')
    <x-header title="Perfil">
    <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Usuarios</a></li>
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
                <img class="profile-user-img img-fluid img-circle"
                     src="/img/perfil-vacio.png"
                     alt="User profile picture">
              </div>

              <h3 class="profile-username text-center">{{$user->name.' '.$user->lastname}}</h3>

              <p class="text-muted text-center">Administrador</p>

              <ul class="list-group list-group-unbordered mb-3">
                <li class="list-group-item">
                   <b>Cédula</b> <a class="float-right">{{$user->dni}}</a>
                </li>
                <li class="list-group-item">
                  <b>Correo</b> <a class="float-right">{{$user->email}}</a>
                </li>
                <li class="list-group-item">
                  <b>Estado</b> <a class="float-right">{{$user->status}}</a>
                </li>
                <li class="list-group-item">
                  <b>Creación</b> <a class="float-right">{{$user->created_at}}</a>
                </li>
                <li class="list-group-item">
                    <b>modificaion</b> <a class="float-right">{{$user->updated_at}}</a>
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
          <div class="card">
            <div class="card-header p-2">
              <ul class="nav nav-pills">
                <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Roles</a></li>
                <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Permisos adicionales</a></li>
                <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Configuraciones</a></li>
              </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
              <div class="tab-content">
                <div class="active tab-pane" id="activity">
                  <div class="post">
                    <h4>Administrador</h4>
                  </div>


                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="timeline">

                </div>
                <!-- /.tab-pane -->

                <div class="tab-pane" id="settings">

                </div>
                <!-- /.tab-pane -->
              </div>
              <!-- /.tab-content -->
            </div><!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
@endsection
