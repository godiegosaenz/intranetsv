@extends('layouts.app')
@section('content')
    <x-header title="Perfil">
    <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Usuarios</a></li>
    <li class="breadcrumb-item active">Mostrar</li>
  </x-header>
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="card card-primary card-outline">
            <div class="card-body box-profile">
              <div class="text-center">
                <img class="profile-user-img img-fluid img-circle"
                     src="/img/perfil-vacio.png"
                     alt="User profile picture">
              </div>

              <h3 class="profile-username text-center">{{$user->name.' '.$user->lastname}}</h3>

              <p class="text-muted text-center">Administrador</p>

              <ul class="list-group list-group-unbordered mb-3">
                <li class="list-group-item">
                   <b>Cédula</b> <a class="float-right">{{$user->dni}}</a>
                </li>
                <li class="list-group-item">
                  <b>Correo</b> <a class="float-right">{{$user->email}}</a>
                </li>
                <li class="list-group-item">
                  <b>Estado</b> <a class="float-right">{{$user->status}}</a>
                </li>
                <li class="list-group-item">
                  <b>Creación</b> <a class="float-right">{{$user->created_at}}</a>
                </li>
                <li class="list-group-item">
                    <b>modificaion</b> <a class="float-right">{{$user->updated_at}}</a>
                </li>
              </ul>

              <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

          <!-- /.card -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="card">
            <div class="card-header p-2">
              <ul class="nav nav-pills">
                <li class="nav-item"><a class="nav-link active" href="#roles" data-toggle="tab">Roles</a></li>
                <li class="nav-item"><a class="nav-link" href="#permissions" data-toggle="tab">Permisos adicionales</a></li>
                <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Configuraciones</a></li>
              </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
              <div class="tab-content">
                <div class="active tab-pane" id="roles">
                    <form action="{{ route('usersroles.store',$user) }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">

                                <div class="form-group">
                                    <label for="selRoles">Roles</label>
                                    <select class="form-control @if($errors->erolesusers->has('role'))is-invalid @endif" id="role" name="role" onchange="updateTablesPermission(this.value)">
                                        @isset($roluser)
                                            @foreach ($roluser as $id => $rol)
                                                <option value="{{$rol}}" {{ old('role') == $rol ? 'selected' : 'selected' }}>{{$rol}}</option>
                                            @endforeach
                                        @endisset
                                    </select>
                                </div>
                                <hr>
                                <table id="permissions-table" class="table table-sm table-bordered">
                                    <thead>
                                      <tr>
                                        <th>Permisos por roles</th>
                                        <th>Estado</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        @isset($permission)
                                            @foreach ($permission as $id => $p)
                                                @if($PermissionRole->contains($p->name))
                                                    <tr>
                                                        <td>{{$p->name}}</td>
                                                        <td style="text-align: center"><i class="far fa-check-square"></i></td>
                                                    </tr>
                                                @else
                                                    <tr>
                                                        <td>{{$p->name}}</td>
                                                        <td style="text-align: center"><i class="far fa-square"></i></td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        @endisset
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-lg-6">

                            </div>
                        </div>
                    </form>


                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="permissions">
                  <div class="row">
                    <div class="col-lg-6">
                      <table id="permissionspecial" class="table table-sm table-bordered">
                        <thead>
                          <tr>
                            <th>Permisos Especiales</th>
                            <th>Activos</th>
                          </tr>
                        </thead>
                        <tbody>
                            @isset($permission)
                                @foreach ($permission as $id => $p)
                                    @if($PermissionUser->contains($p->name))
                                        <tr>
                                            <td>{{$p->name}}</td>
                                            <td style="text-align: center"><i class="far fa-check-square"></i></td>
                                        </tr>
                                    @else
                                        <tr>
                                            <td>{{$p->name}}</td>
                                            <td style="text-align: center"><i class="far fa-square"></i></td>
                                        </tr>
                                    @endif
                                @endforeach
                            @endisset
                        </tbody>
                      </table>
                    </div>

                  </div>

                </div>
                <!-- /.tab-pane -->

                <div class="tab-pane" id="settings">

                </div>
                <!-- /.tab-pane -->
              </div>
              <!-- /.tab-content -->
            </div><!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
@endsection
