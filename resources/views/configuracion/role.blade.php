@extends('layouts.app')
@section('content')
    <x-header title="Panel de roles">
        <li class="breadcrumb-item active">Roles</li>
     </x-header>
     <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row mb-3">
        <div class="col-sm-12">
            <a class="btn btn-primary float-sm-left" href="{{ route('roles.create')}}"><i class="fa fa-plus-square"></i> Crear Rol</a>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <div class="card card-default">
            <div class="card-header">
                <h4 class="card-title">Lista de Roles</h4>

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
                      <th>Nombre</th>
                      <th>Guardia</th>
                      <th>Creacion</th>
                      <th>Modificacion</th>
                      <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                        @isset($roles)
                            @foreach ($roles as $r)
                                <tr>
                                    <td>{{$r->name}}</td>
                                    <td>{{$r->guard_name}}</td>
                                    <td>{{$r->created_at}}</td>
                                    <td>{{$r->updated_at}}</td>
                                    <td></td>
                                </tr>
                            @endforeach
                        @endisset
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Nombre</th>
                        <th>Guardia</th>
                        <th>Creacion</th>
                        <th>Modificacion</th>
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
