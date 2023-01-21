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
            <div class="card card-secondary card-tabs">
                <div class="card-header p-0 pt-1">
                  <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Establecimientos abiertos</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Establecimientos cerrados e incompletos</a>
                    </li>
                  </ul>
                </div>
                <div class="card-body">
                  <div class="tab-content" id="custom-tabs-one-tabContent">
                    <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                        @csrf
                        <div class="table-responsive">
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
                    <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                        <div class="table-responsive">
                            <table id="establishment-table-cerrado" class="table table-sm table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>estado</th>
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
                <!-- /.card -->
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
            "scroller": true,
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
        let establishmenttablecerrado = $('#establishment-table-cerrado').DataTable({
            "lengthMenu": [ 5, 10],
            "language" : {
                "url": '{{ url("/js/spanish.json") }}',
            },
            "scrollX": true,
            "deferRender": true,
            "scroller": true,
            "autoWidth": true,
            "order": [], //Initial no order
            "processing" : true,
            "serverSide": true,
            "ajax": {
                "url" : "{{ route('establishments.datatablescerrados') }}",
                "type": "post",
                "data": function (d){
                    d._token = $("input[name=_token]").val();
                }
            },
            "columns": [
                {data: 'name', 'width': '150px', 'targets': 0},
                {data: 'status'},
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
        $('a[data-toggle="pill"]').on('shown.bs.tab', function(e){
            establishmenttablecerrado.scroller.measure();
        });
    });
    </script>
@endpush

