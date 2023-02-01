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
                        <table id="establishment-table" class="table table-sm table-bordered table-hover" cellpacing="0">
                            <thead>
                            <tr>
                                <th>Acciones</th>
                                <th>Nombre</th>
                                <th>estado</th>
                                <th>Tipo de actividad</th>
                                <th>Clasificacion</th>
                                <th>Categoria</th>
                                <th>Tipo de Local</th>
                                <th>País </th>
                                <th>Provincia </th>
                                <th>Canton </th>
                                <th>Parroquia </th>
                            </tr>
                            </thead>
                            <tbody>

                            </tbody>

                        </table>

                    </div>
                    <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                        <table id="establishment-table-cerrado" class="table table-sm table-bordered table-hover" cellpacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Acciones</th>
                            <th>Nombre</th>
                            <th>estado</th>
                            <th>País </th>
                            <th>Provincia </th>
                            <th>Canton </th>
                            <th>Parroquia </th>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>

                        </table>

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

            "responsive": true,
            "autoWidth": false,
            "processing" : true,
            "serverSide": true,
            "ajax": {
                "url" : "{{ route('establishments.datatables') }}",
                "type": "post",
                "data": function (d){
                    d._token = $("input[name=_token]").val();
                }
            },
            "columnDefs": [
                {data: 'action','targets': 0, "visible": true, 'width': '200px'},
                {data: 'name','width': '1000px', 'targets': 1},
                {data: 'status','targets': 2},
                {data: 'tourist_activity','width': '500px', 'targets': 3},
                {data: 'classification','width': '120px', 'targets': 4},
                {data: 'category','width': '120px', 'targets': 5},
                {data: 'LocalName','width': '100px', 'targets': 6},
                {data: 'country','width': '100px', 'targets': 7},
                {data: 'province','width': '100px', 'targets': 8},
                {data: 'canton','width': '100px', 'targets': 9},
                {data: 'parish','width': '100px', 'targets': 10},

            ]
        });
        let establishmenttablecerrado = $('#establishment-table-cerrado').DataTable({
            "lengthMenu": [ 5, 10],
            "language" : {
                "url": '{{ url("/js/spanish.json") }}',
            },
            "responsive": true,
            //"scroller": true,
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
                {data: 'action', 'width': '150px', 'targets': 0 , name: 'action', orderable: false, searchable: false},
                {data: 'name', 'width': '150px', 'targets': 1},
                {data: 'status', 'targets': 2},
                {data: 'country', 'width': '100px', 'targets': 3},
                {data: 'province', 'width': '100px', 'targets': 4},
                {data: 'canton', 'width': '100px', 'targets': 5},
                {data: 'parish', 'width': '200px', 'targets': 6},

            ]
        });
        $('a[data-toggle="pill"]').on('shown.bs.tab', function(e){
            $($.fn.dataTable.tables(true)).DataTable()
                .columns.adjust()
                .responsive.recalc();
        });
    });
    </script>
@endpush

