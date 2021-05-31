@extends('layouts.app')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Crear Usuario</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Inicio</a></li>
            <li class="breadcrumb-item"><a href="#">Usuarios</a></li>
            <li class="breadcrumb-item active">Crear</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
  <!-- /.content-header -->
  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-default">
                    <div class="card-header">
                        <h4 class="card-title">Formulario   </h4>

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
                        <form action="{{ route('store.users') }}" method="post">
                            @csrf
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="dni">Cédula</label>
                                        <input type="number" class="form-control  @error('dni')is-invalid @enderror" name="dni" id="dni" placeholder="ejemplo: 1312151425">
                                        @error('dni')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Nombres</label>
                                        <input type="text" class="form-control @error('name')is-invalid @enderror" name="name" id="name" placeholder="Ejemplo: Diego">
                                        @error('name')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="lastName">Apellido Paterno</label>
                                        <input type="text" class="form-control @error('lastname')is-invalid @enderror" name="lastname" id="lastName" placeholder="Ejemplo: Rodriguez">
                                        @error('lastname')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="lastName2">Apellido Materno</label>
                                        <input type="text" class="form-control @error('lastname2')is-invalid @enderror" name="lastname2" id="lastname2" placeholder="Ejemplo: Zambrano">
                                        @error('lastname2')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="email">Correo Electronico</label>
                                        <input type="email" class="form-control @error('email')is-invalid @enderror" name="email" id="email" placeholder="Ejemplo: abcd@gmail.com">
                                        @error('email')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Contraseña</label>
                                        <input type="password" class="form-control @error('password')is-invalid @enderror" name="password" id="password" placeholder="">
                                        @error('password')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group mt-4">
                                        <label>Estado</label>
                                        <div class="custom-control custom-switch">
                                          <input type="checkbox" class="custom-control-input" id="status" name="status">
                                          <label class="custom-control-label" for="status">Activo</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <button class="btn btn-success" type="submit"><i class="fa fa-plus-square"></i> Crear Usuario</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
@endsection
