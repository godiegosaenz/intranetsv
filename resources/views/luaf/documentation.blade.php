@extends('layouts.app')
@section('content')
    <x-header title="Documentacion de tabla de porcentaje de LUAF">
        <li class="breadcrumb-item active">Documentacion de tabla de porcentaje de LUAF</li>
    </x-header>
     <!-- Main content -->
  <div class="content">
    <div class="container-fluid">

      <div class="row">
        <div class="col-lg-12">
          <div class="card card-default">
            @csrf

            <div class="card-body">

            </div>
            <div id="loading" class="overlay dark" style="display: none">
                <i class="fas fa-2x fa-sync-alt fa-spin"></i>
            </div>
          </div>
        </div>
      </div>

    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
@endsection
