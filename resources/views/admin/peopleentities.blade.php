@extends('layouts.app')
@section('content')
    <x-header title="Panel de Personas y Empresas">
        <li class="breadcrumb-item active">Personas y Empresas</li>
    </x-header>
     <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row mb-3">
        <div class="col-sm-12">
            <a class="btn btn-primary float-sm-left" href="{{ route('peopleentities.create')}}"><i class="fa fa-plus-square"></i> Registrar</a>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
            <!-- Custom Tabs -->
            <div class="card">
                <div class="card-header d-flex p-0">
                  <h3 class="card-title p-3">Lista de Personas/empresas</h3>
                  <ul class="nav nav-pills ml-auto p-2">
                    <li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">Tipo de persona natural</a></li>
                    <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">Tipo de persona Juridica</a></li>
                  </ul>
                </div><!-- /.card-header -->
                <div class="card-body">
                  <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                        <table id="natural" class="table table-sm table-bordered table-hover">
                            <thead>
                            <tr>
                              <th>Cedula/Ruc</th>
                              <th>Nombres</th>
                              <th>Apellidos</th>
                              <th>Estado</th>
                              <th>Correo</th>
                              <th>Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                            <tfoot>
                            <tr>
                              <th>Cedula/Ruc</th>
                              <th>Nombres</th>
                              <th>Apellidos</th>
                              <th>Estado</th>
                              <th>Correo</th>
                              <th>Acciones</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="tab_2">
                        <div class="table-responsive">
                            <table id="juridica" class="table table-sm table-bordered table-hover" width="100%" cellspacing="">
                                <thead>
                                <tr>
                                  <th>Cedula/Ruc</th>
                                  <th>Nombre comercial</th>
                                  <th>Razon Social 1</th>
                                  <th>Estado</th>
                                  <th>Correo</th>
                                  <th>Acciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Cedula/Ruc</th>
                                    <th>Nombre comercial</th>
                                    <th>Razon Social 1</th>
                                    <th>Estado</th>
                                    <th>Correo</th>
                                    <th>Acciones</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>

                  </div>
                  <!-- /.tab-content -->
                </div><!-- /.card-body -->
            </div>
              <!-- ./card -->
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
        $('#natural').DataTable({
            "lengthMenu": [ 5, 10],
            "language" : {
                "url": '{{ url("/js/spanish.json") }}',
            },
            "order": [], //Initial no order
            "processing" : true,
            "serverSide": true,
            "ajax": {
                "url" : "{{ route('peopleentities.datatables') }}",
                "type": "post",
                "data": function (d){
                    d._token = $("input[name=_token]").val();
                    d.type = 1;
                }
            },
            "columns": [
                {data: 'cc_ruc'},
                {data: 'name'},
                {data: 'last_name'},
                {data: 'status'},
                {data: 'email'},
                {data: 'action', name: 'action', orderable: false, searchable: false},

            ]
        });
        $('#juridica').DataTable({
            "lengthMenu": [ 5, 10],
            "language" : {
                "url": '{{ url("/js/spanish.json") }}',
            },
            "autoWidth": false,
            "order": [], //Initial no order
            "processing" : true,
            "serverSide": true,
            "ajax": {
                "url" : "{{ route('peopleentities.datatables') }}",
                "type": "post",
                "data": function (d){
                    d._token = $("input[name=_token]").val();
                    d.type = 2;
                }
            },
            "columns": [
                {data: 'cc_ruc'},
                {data: 'tradename'},
                {data: 'bussines_name'},
                {data: 'status'},
                {data: 'email'},
                {data: 'action', width : '300px', name: 'action', orderable: false, searchable: false},

            ]
        });

    });

    </script>
@endpush
