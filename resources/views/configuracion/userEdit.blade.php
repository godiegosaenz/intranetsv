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
                <div class="row">
                    <div class="col-lg-6">
                        <br>
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit"><i class="fa fa-plus-square"></i> Guardar usuario</button>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <label for="cc_ruc"> Selecciona Persona / empresa</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-lg">Buscar</button>
                            </div>
                            <!-- /btn-group -->
                            <input id="cc_ruc" type="text" class="form-control @error('people_entities_id')is-invalid @enderror" value="{{ old('cc_ruc',$PersonEntityData->cc_ruc) }}">
                            @error('people_entities_id')
                            <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <hr>
                    </div>
                    <div class="col-lg-6">

                        <div class="form-group">
                            <label for="name2">Nombres/Nombre Comercial</label>
                            <input type="text" class="form-control" id="name2" value="{{ old('name2',$PersonEntityData->name) }}" disabled>

                        </div>
                        <div class="form-group">
                            <label for="last_name">Apellido Paterno/Razon Social</label>
                            <input type="text" class="form-control" id="last_name" value="{{ old('last_name',$PersonEntityData->last_name) }}" disabled>

                        </div>


                        <div class="form-group">
                            <label for="email">Correo Electronico</label>
                            <input type="email" class="form-control" id="email" value="{{ old('email2',$PersonEntityData->email) }}" disabled>

                        </div>
                        <div class="form-group">
                            <label for="status2">Estado</label>
                            <input type="text" class="form-control" id="status2" value="{{ old('status2',$PersonEntityData->status) }}" disabled>

                        </div>
                        <div class="form-group">
                            <label for="number_phone1">Telefono</label>
                            <input type="number" class="form-control" id="number_phone1" value="{{ old('number_phone1',$PersonEntityData->number_phone1) }}" disabled>

                        </div>

                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="country_id">Pais</label>
                            <input type="text" class="form-control" id="country_id" value="{{ isset($PersonEntityData->countries->name) ? $PersonEntityData->countries->name : '' }}" disabled>

                        </div>
                        <div class="form-group">
                            <label for="province_id">Provincia</label>
                            <input type="text" class="form-control" id="province_id" value="{{ isset($PersonEntityData->provinces->name) ? $PersonEntityData->provinces->name : ''}}" disabled>

                        </div>
                        <div class="form-group">
                            <label for="canton_id">Canton</label>
                            <input type="text" class="form-control" id="canton_id" value="{{ isset($PersonEntityData->provinces->name) ? $PersonEntityData->cantons->name : '' }}" disabled>

                        </div>
                        <div class="form-group">
                            <label for="parish_id">Parroquia</label>
                            <input type="text" class="form-control" id="parish_id" value="{{ isset($PersonEntityData->provinces->name) ? $PersonEntityData->parishes->name : '' }}" disabled>

                        </div>
                        <div class="form-group">
                            <label for="address">Direccion</label>
                            <input type="email" class="form-control" id="address" value="{{ old('address',$PersonEntityData->address) }}" disabled>

                        </div>

                    </div>
                    <div class="col-lg-12">
                        <hr>
                    </div>
                    <div class="col-lg-6">

                        <div class="form-group">
                            <label for="name">*Nombre de usuario</label>
                            <input type="text" class="form-control @error('name')is-invalid @enderror" name="name" id="name" placeholder="..." value="{{ old('name',$user->name) }}">
                            @error('name')
                            <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name">*Contraseña</label>
                            <input type="password" class="form-control @error('password')is-invalid @enderror" name="password" id="password" placeholder="..." value="{{ old('password',$user->password) }}">
                            @error('password')
                            <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">*Repetir Contraseña</label>
                            <input type="password" class="form-control @error('password_confirmation')is-invalid @enderror" name="password_confirmation" id="password_confirmation" placeholder="..." value="{{ old('password_confirmation',$user->password) }}">
                            @error('password_confirmation')
                            <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="email">*Correo Electronico</label>
                            <input type="email" class="form-control @error('email')is-invalid @enderror" name="email" id="email" placeholder="..." value="{{ old('email',$user->email) }}">
                            @error('email')
                            <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>*Estado</label>
                            <select id="status" name="status" class="custom-select @error('status') is-invalid @enderror">
                                    <option value="">Seleccione Tipo</option>
                                    @isset($user->status)
                                        @if ($user->status == 'Activo')
                                            <option value="1" selected>Activo</option>
                                            <option value="2">Inactivo</option>
                                        @else
                                            <option value="1">Activo</option>
                                            <option value="2" selected>Inactivo</option>
                                        @endif
                                    @endisset

                            </select>
                            @error('status')
                                <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="hidden" class="form-control" id="people_entities_id" name="people_entities_id" value="{{ old('people_entities_id',$PersonEntityData->id) }}" />
                        </div>

                    </div>
                </div>
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
