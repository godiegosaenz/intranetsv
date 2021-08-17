@extends('layouts.app')
@section('content')
<x-header title="Crear Personas / Empresas">
    <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Personas/Empresas</a></li>
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
                        <li class="nav-item"><a class="nav-link" href="#formulario" data-toggle="tab"> Formulario de usuarios</a></li>
                      </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                      <div class="tab-content">
                        <div class="active tab-pane" id="formulario">
                            <form action="{{ route('peopleentities.store') }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <button class="btn btn-primary" type="submit"><i class="fa fa-plus-square"></i> Guardar Persona/Empresa</button>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Tipo</label>
                                            <select class="custom-select">
                                              <option>Persona</option>
                                              <option>Empresa</option>
                                              <option>Institucion</option>
                                            </select>
                                          </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="dni">*Cédula/Ruc</label>
                                            <input type="number" class="form-control  @error('dni')is-invalid @enderror" name="dni" id="dni" placeholder="1312151425" value="{{ old('dni',$PersonEntityData->dni) }}">
                                            @error('dni')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="name">*Nombres</label>
                                            <input type="text" class="form-control @error('name')is-invalid @enderror" name="name" id="name" placeholder="Diego" value="{{ old('name',$PersonEntityData->name) }}">
                                            @error('name')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="lastName">*Apellido Paterno</label>
                                            <input type="text" class="form-control @error('lastname')is-invalid @enderror" name="lastname" id="lastName" placeholder="Rodriguez" value="{{ old('lastname',$PersonEntityData->lastname) }}">
                                            @error('lastname')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="lastName2">*Apellido Materno</label>
                                            <input type="text" class="form-control @error('lastname2')is-invalid @enderror" name="lastname2" id="lastname2" placeholder="Zambrano" value="{{ old('lastname',$PersonEntityData->lastname2) }}">
                                            @error('lastname2')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Fecha Nacimiento:</label>

                                            <div class="input-group">
                                              <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                              </div>
                                              <input type="text" class="form-control" id="birthday" name="birthday" value="" />
                                            </div>
                                            <!-- /.input group -->
                                        </div>
                                        <div class="form-group">
                                            <label for="email">*Correo Electronico</label>
                                            <input type="email" class="form-control @error('email')is-invalid @enderror" name="email" id="email" placeholder="abcd@gmail.com" value="{{ old('email',$PersonEntityData->email) }}">
                                            @error('email')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="lastName2">*Estado</label>
                                            <input type="text" class="form-control @error('lastname2')is-invalid @enderror" name="lastname2" id="lastname2" placeholder="Zambrano" value="{{ old('lastname',$PersonEntityData->lastname2) }}">
                                            @error('lastname2')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="lastName2">*Telefono</label>
                                            <input type="text" class="form-control @error('lastname2')is-invalid @enderror" name="lastname2" id="lastname2" placeholder="Zambrano" value="{{ old('lastname',$PersonEntityData->lastname2) }}">
                                            @error('lastname2')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="lastName2">*Direccion</label>
                                            <input type="text" class="form-control @error('lastname2')is-invalid @enderror" name="lastname2" id="lastname2" placeholder="Zambrano" value="{{ old('lastname',$PersonEntityData->lastname2) }}">
                                            @error('lastname2')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="lastName2">*Pais</label>
                                            <input type="text" class="form-control @error('lastname2')is-invalid @enderror" name="lastname2" id="lastname2" placeholder="Zambrano" value="{{ old('lastname',$PersonEntityData->lastname2) }}">
                                            @error('lastname2')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="lastName2">*Provincia</label>
                                            <input type="text" class="form-control @error('lastname2')is-invalid @enderror" name="lastname2" id="lastname2" placeholder="Zambrano" value="{{ old('lastname',$PersonEntityData->lastname2) }}">
                                            @error('lastname2')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="lastName2">*Canton</label>
                                            <input type="text" class="form-control @error('lastname2')is-invalid @enderror" name="lastname2" id="lastname2" placeholder="Zambrano" value="{{ old('lastname',$PersonEntityData->lastname2) }}">
                                            @error('lastname2')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                </div>
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
        $('input[name="birthday"]').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            minYear: 1901,
            maxYear: parseInt(moment().format('YYYY'),10)
        });
    });
    </script>
@endpush


