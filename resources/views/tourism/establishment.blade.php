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
                        <th>Tipo de establecimiento</th>
                        <th>Tipo de Local</th>
                        <th>País </th>
                        <th>Provincia </th>
                        <th>Canton </th>
                        <th>Parroquia </th>
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
            "autoWidth": true,
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
                {data: 'name', 'width': '150px', 'targets': 0},
                {data: 'status'},
                {data: 'tourist_activity', 'width': '120px', 'targets': 2},
                {data: 'classification' , 'width': '120px', 'targets': 3},
                {data: 'category', 'width': '120px', 'targets': 4},
                {data: 'start_date', 'width': '100px', 'targets': 5},
                {data: 'EstablishmentTypeName'},
                {data: 'LocalName'},
                {data: 'country', 'width': '100px', 'targets': 8},
                {data: 'province', 'width': '100px', 'targets': 9},
                {data: 'canton', 'width': '100px', 'targets': 10},
                {data: 'parish', 'width': '200px', 'targets': 11},
                {data: 'action', 'width': '150px', 'targets': 12 , name: 'action', orderable: false, searchable: false},

            ]
        });
    });

    </script>
@endpush

