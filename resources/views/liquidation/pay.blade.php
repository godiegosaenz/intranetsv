@extends('layouts.app')
@section('content')
  <x-header title="Lista de comprobantes">
    <li class="breadcrumb-item active">Lista de comprobantes</li>
  </x-header>
  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row mb-3">

      </div>
      <div class="row">
        <div class="col-lg-12">
          <div class="card card-default">
            <div class="card-header">
                <h4 class="card-title">Lista de comprobantes pagados</h4>

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
                <table id="users-table" class="table table-sm table-bordered table-hover">
                    <thead>
                    <tr>
                      <th>Detalle</th>
                      <th>Imprimir</th>
                      <th>Comprobante</th>
                      <th># liquidacion</th>
                      <th>Año</th>
                      <th>Establecimiento</th>
                      <th>Propietario</th>
                      <th>Valor</th>
                      <th>Fecha</th>
                      <th>Cajero</th>
                      <th>Estado</th>
                    </tr>
                    </thead>
                    <tbody>

                    </tbody>
                    <tfoot>

                    </tfoot>
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
