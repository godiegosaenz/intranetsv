@extends('layouts.app')
@section('content')
    <x-header title="Panel de establecimientos turisticos">
        <li class="breadcrumb-item active">Establecimientos turisticos</li>
    </x-header>
     <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row mb-3">
        <div class="col-sm-12">
            <a class="btn btn-primary float-sm-left" href="{{ route('establishments.create')}}"><i class="fa fa-plus-square"></i> Registrar</a>
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
                <table id="establishment-table" class="table table-sm table-bordered table-hover">
                    <thead>
                    <tr>
                      <th>Nombre</th>
                      <th>estado</th>
                      <th>Tipo de actividad</th>
                      <th>Clasificacion</th>
                      <th>Categoria</th>
                      <th>Inicio de actividad</th>
                      <th>Numero de registro</th>
                      <th>Requerimientos</th>
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
@push('scripts')
    <script>
    $(function () {
        let establishmenttable = $('#establishment-table').DataTable({
            "lengthMenu": [ 5, 10],
            "language" : {
                "url": '{{ url("/js/spanish.json") }}',
            },
            "scrollX": true,
            "autoWidth": false,
            "order": [], //Initial no order
            "processing" : true,
            "serverSide": true,
            "ajax": {
                "url" : "{{ route('establishments.datatables') }}",
                "type": "post",
                "data": function (d){
                    d._token = $("input[name=_token]").val();
                }
            },
            "columns": [
                {data: 'name'},
                {data: 'status'},
                {data: 'tourist_activity'},
                {data: 'classification'},
                {data: 'category'},
                {data: 'start_date'},
                {data: 'registry_number'},
                {data: 'has_requeriment'},


                {data: 'action', name: 'action', orderable: false, searchable: false},

            ]
        });
    });

    </script>
@endpush

