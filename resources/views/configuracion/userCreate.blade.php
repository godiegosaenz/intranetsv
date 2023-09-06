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

                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="status2">Estado</label>
                                            <input type="text" class="form-control" id="status2" value="{{ old('status2',$PersonEntityData->status) }}" disabled>

                                        </div>
                                        <div class="form-group">
                                            <label for="number_phone1">Telefono</label>
                                            <input type="number" class="form-control" id="number_phone1" value="{{ old('number_phone1',$PersonEntityData->number_phone1) }}" disabled>

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
                                            <input type="password" class="form-control @error('password_confirmation')is-invalid @enderror" name="password_confirmation" id="password_confirmation" placeholder="..." value="{{ old('password',$user->name) }}">
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
                                                    <option value="1">Activo</option>
                                                    <option value="2">Inactivo</option>
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
                      </div>
                      <!-- /.tab-content -->
                    </div><!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
  </div>
  <div class="modal fade" id="modal-lg">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Seleccione Persona/empresa</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="card">
                @csrf
                <table id="entities-table" class="table table-sm table-bordered table-hover">
                    <thead>
                    <tr>
                      <th>Cedula/Ruc</th>
                      <th>Nombres</th>
                      <th>Apellidos</th>
                      <th>Estado</th>
                      <th>Correo</th>
                      <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                    <tfoot>
                    <tr>
                      <th>Cedula/Ruc</th>
                      <th>Nombres</th>
                      <th>Apellidos</th>
                      <th>Estado</th>
                      <th>Correo</th>
                      <th>Acciones</th>
                    </tr>
                    </tfoot>
                </table>
                <div id="loading" class="overlay dark" style="display: none">
                        <i class="fas fa-2x fa-sync-alt fa-spin"></i>
                    </div>
            </div>

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
        let cc_ruc = document.getElementById('cc_ruc');
        let name2 = document.getElementById('name2');
        let last_name = document.getElementById('last_name');
        let email = document.getElementById('email');
        let status = document.getElementById('status2');
        let address = document.getElementById('address');
        let number_phone1 = document.getElementById('number_phone1');
        let people_entities_id = document.getElementById('people_entities_id');


        let token = "{{csrf_token()}}";

        function selectedPersonEntity(id){
            axios.post('{{route("peopleentities.get")}}', {id:id,_token: token}).then(function(res) {
                if(res.status==200) {
                    cc_ruc.value = res.data.cc_ruc;
                    name2.value = res.data.name;
                    email.value = res.data.email;
                    number_phone1.value = res.data.number_phone1;
                    last_name.value = res.data.last_name+' '+res.data.maternal_last_name;
                    status.value = res.data.status;
                    address.value = res.data.address;
                    people_entities_id.value = res.data.id;
                    $('#modal-lg').modal('hide');
                    loading.style.display = 'none';
                }
            }).catch(function(err) {
                    console.log(err);
            }).then(function() {
                    loading.style.display = 'none';
            });
        }
        $(function () {
        var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });
        @if ($errors->any())
            toastr.error('Revise los campos que son obligatorios');
        @endif
        @error('people_entities_id')
            toastr.error('{{$message}}');
        @enderror
        @if (session('status'))
            toastr.success('{{session('status')}}');
        @endisset


        $('#entities-table').DataTable({
            "lengthMenu": [ 5, 10],
            "language" : {
                "url": '{{ url("/js/spanish.json") }}',
            },
            "autoWidth": false,
            "order": [], //Initial no order
            "processing" : true,
            "serverSide": true,
            "ajax": {
                "url" : "{{ route('peopleentities.datatablesPersonUser') }}",
                "type": "post",
                "data": function (d){
                    d._token = $("input[name=_token]").val();
                }
            },
            "columns": [
                {data: 'cc_ruc'},
                {data: 'name'},
                {data: 'last_name'},
                {data: 'status'},
                {data: 'email'},
                {data: 'action', name: 'action', orderable: false, searchable: false},

            ]
        });
    });

    </script>
@endpush


