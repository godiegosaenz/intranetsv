@extends('layouts.app')
@section('content')
<x-header title="Crear usuario">
    <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Usuarios</a></li>
    <li class="breadcrumb-item active">Crear</li>
  </x-header>
  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header p-2">
                      <ul class="nav nav-pills">
                        <li class="nav-item"><a class="nav-link active" href="#formulario" data-toggle="tab"> Formulario de usuarios</a></li>
                      </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                      <div class="tab-content">
                        <div class="active tab-pane" id="formulario">
                            <form action="{{ route('users.store') }}" method="post">
                                @csrf
                                @include('configuracion.partials._formusuario')
                            </form>
                        </div>
                      </div>
                      <!-- /.tab-content -->
                    </div><!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
  </div>
@endsection
@push('scripts')
    <script>
    $(function () {
        var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });
        @if (session('status'))
            toastr.success('{{session('status')}}');
        @endisset
        tableRolPermission = $('#permissions-table').DataTable({
            "lengthMenu": [ 5, 10],
            "language" : {
                "url": '{{ url("/js/spanish.json") }}',
            },
            "autoWidth": false,
            "order": [], //Initial no order
            "processing" : true,
            "serverSide": true,
            "ajax": {
                "url" : "{{ route('roles.datatable') }}",
                "type": "post",
                "data": function (d){
                    d.role = $( "#role" ).val();
                    d._token = $("input[name=_token]").val();
                }
            },
            "columns": [
                {data: 'id'},
                {data: 'name'},
            ],
            "bLengthChange" : false,
            "searching": false,
            "info": false
        });
    });
    function updateTablesPermission(value){
        tableRolPermission.ajax.reload();
    }
    </script>
@endpush


