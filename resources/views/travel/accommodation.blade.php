@extends('layouts.app')
@section('content')
    <x-header title="Panel Alojamiento">
        <li class="breadcrumb-item active">Alojamiento</li>
    </x-header>
     <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row mb-3">
        <div class="col-sm-12">
            <a class="btn btn-primary float-sm-left" href="{{ route('accommodations.create')}}"><i class="fa fa-plus-square"></i> Crear Gestor cultural</a>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <div class="card card-default">
            @csrf
            <div class="card-header">
                <h4 class="card-title">Lista de Alojamientos turisticos</h4>

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
                <table id="cultural-table" class="table table-sm table-bordered table-hover">
                    <thead>
                    <tr>
                      <th>Nombres</th>
                      <th>Actividad</th>
                      <th>Ambito</th>
                      <th>Estado</th>
                      <th>Telefono</th>
                      <th>Pais</th>
                      <th>Provincia</th>
                      <th>Cantxon</th>
                      <th>Parroquia</th>
                      <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>

                    </tbody>

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
