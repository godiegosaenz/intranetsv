@extends('layouts.app')
@section('content')
    <x-header title="Panel de Gestores Culturales">
        <li class="breadcrumb-item active">Gestores Culturales</li>
    </x-header>
     <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row mb-3">
        <div class="col-sm-12">
            <a class="btn btn-primary float-sm-left" href="{{ route('culturalmanagers.create')}}"><i class="fa fa-plus-square"></i> Crear Gestor cultural</a>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <div class="card card-default">
            @csrf
            <div class="card-header">
                <h4 class="card-title">Lista de Gestores Culturales</h4>

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
                <table id="cultural-table" class="table table-sm table-bordered table-hover">
                    <thead>
                    <tr>
                      <th>Nombres</th>
                      <th>Actividad</th>
                      <th>Ambito</th>
                      <th>Estado</th>
                      <th>Telefono</th>
                      <th>Pais</th>
                      <th>Provincia</th>
                      <th>Cantxon</th>
                      <th>Parroquia</th>
                      <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                        @isset($CulturalManager)
                            @foreach ($CulturalManager as $cm)
                                <tr>
                                    <td>{{$cm->name}}</td>
                                    <td>{{$cm->type_activity->name}}</td>
                                    <td>{{$cm->Scope_activity->name}}</td>
                                    <td>{{$cm->status}}</td>
                                    <td>{{$cm->people_entities->number_phone1}}</td>
                                    <td>{{$cm->people_entities->countries->name}}</td>
                                    <td>{{$cm->people_entities->provinces->name}}</td>
                                    <td>{{$cm->people_entities->cantons->name}}</td>
                                    <td>{{$cm->people_entities->parishes->name}}</td>
                                    <td>
                                        <a href="{{route('culturalmanagers.show',['CulturalManager' => $cm])}}" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>
                                        <a href="{{route('culturalmanagers.edit',['CulturalManager' => $cm])}}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                                        <a onclick="" class="btn btn-danger btn-sm"><i class="fa fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        @endisset
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
        var table = $('#cultural-table').DataTable({
            "lengthMenu": [ 5, 10],
            "language" : {
                "url": '{{ url("/js/spanish.json") }}',
            },
            "order": [], //Initial no order
            "scrollX": true,
            "columnDefs": [
                { "width": "200px", "targets": 0 },
                { "width": "200px", "targets": 1 },
                { "width": "200px", "targets": 2 },
                { "width": "50px", "targets": 3 },
                { "width": "50px", "targets": 4 },
                { "width": "100px", "targets": 5 },
                { "width": "100px", "targets": 6 },
                { "width": "150px", "targets": 7 },
                { "width": "200px", "targets": 8 },
                { "width": "120px", "targets": 9 },
            ],
        });
    });

    </script>
@endpush
