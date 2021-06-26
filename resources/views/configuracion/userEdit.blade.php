@extends('layouts.app')
@section('content')
  <x-header title="Editar usuario">
    <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Usuarios</a></li>
    <li class="breadcrumb-item active">Editar</li>
  </x-header>
  <!-- Main content -->
  <x-content>
    <x-slot name="CardHeader">
        <ul class="nav nav-pills">
                <li class="nav-item"><a class="nav-link @if(Cookie::get('tabusuario') == 1) {{'active'}} @endif" href="#formulario" data-toggle="tab"> Formulario de usuarios</a></li>
                <li class="nav-item"><a class="nav-link @if(Cookie::get('tabusuario') == 2) {{'active'}} @endif" href="#rolesypermisos" data-toggle="tab"> Roles y permiso</a></li>
                <li class="nav-item"><a class="nav-link @if(Cookie::get('tabusuario') == 3) {{'active'}} @endif" href="#permissions" data-toggle="tab">Permisos especiales</a></li>
        </ul>
    </x-slot>
    <div class="tab-content">
        @if (Cookie::get('tabusuario') == 1)
            <div class="active tab-pane" id="formulario">
        @else
            <div class="tab-pane" id="formulario">
        @endif
            <form action="{{ route('users.update', $user) }}" method="post">
                @csrf
                @method('PUT')
                @include('configuracion.partials._formusuario')
            </form>
        </div>
        <!-- /.tab-pane -->
        @if(Cookie::get('tabusuario') == 2)
            <div class="active tab-pane" id="rolesypermisos">
        @else
            <div class="tab-pane" id="rolesypermisos">
        @endif
            <form action="{{ route('usersroles.store',$user) }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit"><i class="fa fa-plus-square"></i> Asignar Rol</button>
                        </div>
                        <div class="form-group">
                            <label for="selRoles">Roles</label>
                            <select class="form-control @if($errors->erolesusers->has('role'))is-invalid @endif" id="role" name="role" onchange="updateTablesPermission(this.value)">
                                @isset($roles)
                                    <option value="">Seleccione un rol</option>
                                    @foreach ($roles as $id => $rol)
                                        @if($roluser->contains($rol))
                                            <option value="{{$rol}}" {{ old('role') == $rol ? 'selected' : 'selected' }}>{{$rol}}</option>
                                        @else
                                            <option value="{{$rol}}" {{ old('role') == $rol ? 'selected' : '' }}>{{$rol}}</option>
                                        @endif

                                    @endforeach
                                @endisset
                            </select>
                            @if($errors->erolesusers->has('role'))
                            <span class="error invalid-feedback">{{ $errors->erolesusers->first('role') }}</span>
                            @endif
                        </div>

                        <hr>
                        <label for="">Permisos de rol seleccionado</label>
                        <table id="permissions-table" class="table table-sm table-bordered">
                            <thead>
                              <tr>
                                <th>id</th>
                                <th>Permisos</th>
                              </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-lg-6">

                    </div>
                </div>
            </form>
        </div>
        <!-- /.tab-pane -->
        @if(Cookie::get('tabusuario') == 3)
        <div class="active tab-pane" id="permissions">
        @else
        <div class="tab-pane" id="permissions">
        @endif
        <form action="{{route('userpermissions.store',$user)}}" method="post">
            @csrf
            <div class="form-group">
                <button class="btn btn-primary" name="btnAsignarPermisos" type="submit"><i class="fa fa-plus-square"></i> Asignar Permisos</button>
                <button class="btn btn-danger" name="btnEliminarPermisos" type="submit"><i class="fa fa-plus-square"></i> Borrar Permisos especiales</button>
            </div>
            <label for="">Selecione los permisos</label>
            @isset($Permission)
                @foreach ($Permission as $id => $p)
                <div class="form-check">
                        @if($PermissionRole->contains($p->name))
                        <input class="form-check-input" name="permisions[]" value="{{ $p->name }}" type="checkbox" checked disabled>
                        <label class="form-check-label">{{$p->name}}</label>
                        @else
                            @if($PermissionUser->contains($p->name))
                            <input class="form-check-input" name="permisions[]" value="{{ $p->name }}" type="checkbox" checked>
                            <label class="form-check-label">{{$p->name}}</label>
                            @else
                            <input class="form-check-input" name="permisions[]" value="{{ $p->name }}" type="checkbox">
                            <label class="form-check-label">{{$p->name}}</label>
                            @endif

                        @endif
                </div>
                @endforeach
            @endisset
        </form>
        </div>
        <!-- /.tab-pane -->
    </div>
      <!-- /.tab-content -->
  </x-content>
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
