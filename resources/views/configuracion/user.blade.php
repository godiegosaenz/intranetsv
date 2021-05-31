@extends('layouts.app')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Usuarios</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Inicio</a></li>
            <li class="breadcrumb-item active">Usuarios</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
  <!-- /.content-header -->
  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-12">
            <a class="btn btn-primary float-sm-right" href="{{ route('create.users')}}"><i class="fa fa-plus-square"></i> Crear Usurio</a>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <div class="card card-default">
            <div class="card-header">
                <h4 class="card-title">Lista de usuarios</h4>

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
                <table id="users-table" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                      <th>Nombres</th>
                      <th>Correo Electronico</th>
                      <th>Creacion</th>
                      <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>

                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Creacion</th>
                        <th>Acciones</th>
                    </tr>
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
@push('scripts')
    <script>
    $(function () {
        $('#users-table').DataTable({
            "lengthMenu": [ 5, 10],
            "language" : {
                "url": '{{ url("/js/spanish.json") }}',
            },
            "autoWidth": false,
            "order": [], //Initial no order
            "processing" : true,
            "serverSide": true,
            "ajax": {
                "url" : "{{ route('datatables.users') }}",
                "type": "post",
                "data": function (d){
                    d._token = $("input[name=_token]").val();
                }
            },
            "columns": [
                {data: 'name'},
                {data: 'email'},
                {data: 'created_at'},
                {data: 'action', name: 'action', orderable: false, searchable: false},

            ]
        });

    });
    </script>
@endpush
