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
            <a class="btn btn-primary float-sm-left" href="{{ route('peopleentities.create')}}"><i class="fa fa-plus-square"></i> Crear Persona/empresa</a>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <div class="card card-default">
            @csrf
            <div class="card-header">
                <h4 class="card-title">Lista de personas/empresas</h4>

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
                <table id="entities-table" class="table table-sm table-bordered table-hover">
                    <thead>
                    <tr>
                      <th>Cedula/Ruc</th>
                      <th>Nombres</th>
                      <th>Apellido 1</th>
                      <th>Apellido 2</th>
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
                      <th>Apellido 1</th>
                      <th>Apellido 2</th>
                      <th>Estado</th>
                      <th>Correo</th>
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
        $('#entities-table').DataTable({
            "lengthMenu": [ 5, 10],
            "language" : {
                "url": '{{ url("/js/spanish.json") }}',
            },
            "scrollX": true,
            "order": [], //Initial no order
            "processing" : true,
            "serverSide": true,
            "ajax": {
                "url" : "{{ route('peopleentities.datatables') }}",
                "type": "post",
                "data": function (d){
                    d._token = $("input[name=_token]").val();
                }
            },
            "columns": [
                {data: 'cc_ruc', width: "100px"},
                {data: 'name', width: "150"},
                {data: 'last_name', width: "150"},
                {data: 'maternal_last_name',width: "150"},
                {data: 'status',width: "100"},
                {data: 'email', width: "200px"},
                {data: 'action', width: "250px", name: 'action', orderable: false, searchable: false},

            ]
        });
    });

    </script>
@endpush
