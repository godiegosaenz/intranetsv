@extends('layouts.app')
@section('content')
    <x-header title="Gestor cultural">
    <li class="breadcrumb-item"><a href="{{ route('culturalmanagers.index') }}">Gestor cultural</a></li>
    <li class="breadcrumb-item active">Mostrar</li>
  </x-header>
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-default">
            <div class="card-header">
              <h3 class="card-title">Datos Generales</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="row">
                  <div class="col-lg-6">
                        <strong><i class="fas fa-spell-check"></i> Nombres</strong>
                        <p class="text-muted">{{$CulturalManager->people_entities->name.' '.$CulturalManager->people_entities->last_name.' '.$CulturalManager->people_entities->maternal_last_name}}</p>
                        <hr>
                        <strong><i class="fas fa-drum mr-1"></i> Tipo de actividad</strong>
                        <p class="text-muted">{{$CulturalManager->type_activity->name}}</p>
                        <hr>
                        <strong><i class="fas fa-guitar"></i> Ambito de actividad</strong>
                        <p class="text-muted">{{$CulturalManager->scope_activity->name}}</p>
                        <hr>
                        <strong><i class="fas fa-check"></i> Estado</strong>
                        @if ($CulturalManager->status == 1)
                        <p class="text-muted">Activo</p>
                        @else
                        <p class="text-muted">Inactivo</p>
                        @endif
                        <hr>
                        <strong><i class="fas fa-calendar-alt"></i> Fecha de creación de registro</strong>
                        <p class="text-muted">{{$CulturalManager->created_at}}</p>
                        <hr>
                        <strong><i class="fas fa-calendar-alt"></i> Ultima actualizacion</strong>
                        <p class="text-muted">{{$CulturalManager->updated_at}}</p>
                  </div>
                  <div class="col-lg-6">
                      <strong><i class="fas fa-flag mr-1"></i> Pais</strong>
                      <p class="text-muted">{{$CulturalManager->countries->name}}</p>
                      <hr>
                      <strong><i class="fas fa-flag mr-1"></i> Provincia</strong>
                      <p class="text-muted">{{$CulturalManager->provinces->name}}</p>
                      <hr>
                      <strong><i class="fas fa-flag mr-1"></i> Canton</strong>
                      <p class="text-muted">{{$CulturalManager->cantons->name}}</p>
                      <hr>
                      <strong><i class="fas fa-flag mr-1"></i> Parroquia</strong>
                      <p class="text-muted">{{$CulturalManager->parishes->name}}</p>
                      <hr>
                      <strong><i class="fas fa-map"></i> Direccion</strong>
                      <p class="text-muted">{{$CulturalManager->people_entities->address}}</p>

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
