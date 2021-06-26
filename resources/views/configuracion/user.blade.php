@extends('layouts.app')
@section('content')
  <x-header title="Panel de usuarios">
    <li class="breadcrumb-item active">Usuarios</li>
  </x-header>
  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row mb-3">
        <div class="col-sm-12">
            <a class="btn btn-primary float-sm-left" href="{{ route('users.create')}}"><i class="fa fa-plus-square"></i> Crear Usurio</a>
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
                <table id="users-table" class="table table-sm table-bordered table-hover">
                    <thead>
                    <tr>
                      <th>Nombres</th>
                      <th>Apellido P.</th>
                      <th>Apellido M.</th>
                      <th>Correo Electronico</th>
                      <th>Estado</th>
                      <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>

                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Nombres</th>
                        <th>Apellido P.</th>
                        <th>Apellido M.</th>
                        <th>Correo Electronico</th>
                        <th>Estado</th>
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
@section('modals')
<div class="modal fade" id="modal-delete">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Esta seguro de eliminar el registro</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
            <form id="formDeleteUser" action="" method="POST">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-primary">Aceptar</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
            </form>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
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
                "url" : "{{ route('users.datatables') }}",
                "type": "post",
                "data": function (d){
                    d._token = $("input[name=_token]").val();
                }
            },
            "columns": [
                {data: 'name'},
                {data: 'lastname'},
                {data: 'lastname2'},
                {data: 'email'},
                {data: 'status'},
                {data: 'action', name: 'action', orderable: false, searchable: false},

            ]
        });
        @if (session('status'))
            toastr.success('{{session('status')}}');
        @endisset
    });
    function deleteMessage(id) {
        $("#modal-delete").modal("show");
        var urlDelete = "/users/"+id;
        $("#formDeleteUser").attr("action",urlDelete);
    }
    </script>
@endpush
