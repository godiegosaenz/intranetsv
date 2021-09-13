<div class="row">
    <div class="col-lg-6">
        <br>
        <div class="form-group">
            <button class="btn btn-primary" type="submit"><i class="fa fa-plus-square"></i> Guardar gestor cultural</button>
        </div>
    </div>
    <div class="col-lg-6">
        <label for="cc_ruc"> Selecciona Persona / empresa</label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-lg">Buscar</button>
            </div>
            <!-- /btn-group -->
            <input id="cc_ruc" type="text" class="form-control @error('people_entities_id')is-invalid @enderror" value="">
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
            <label for="name">*Nombres</label>
            <input type="text" class="form-control @error('name')is-invalid @enderror" name="name" id="name" placeholder="Diego" value="{{ old('name',$user->name) }}">
            @error('name')
            <span class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="lastName">*Apellido Paterno</label>
            <input type="text" class="form-control @error('lastname')is-invalid @enderror" name="lastname" id="lastName" placeholder="Rodriguez" value="{{ old('lastname',$user->lastname) }}">
            @error('lastname')
            <span class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="lastName2">*Apellido Materno</label>
            <input type="text" class="form-control @error('lastname2')is-invalid @enderror" name="lastname2" id="lastname2" placeholder="Zambrano" value="{{ old('lastname',$user->lastname2) }}">
            @error('lastname2')
            <span class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            <label for="dni">*Cédula</label>
            <input type="number" class="form-control  @error('dni')is-invalid @enderror" name="dni" id="dni" placeholder="1312151425" value="{{ old('dni',$user->dni) }}">
            @error('dni')
            <span class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="email">*Correo Electronico</label>
            <input type="email" class="form-control @error('email')is-invalid @enderror" name="email" id="email" placeholder="abcd@gmail.com" value="{{ old('email',$user->email) }}">
            @error('email')
            <span class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group mt-4">
            <label>Estado</label>
            <div class="custom-control custom-switch">
              <input type="checkbox" class="custom-control-input" id="status" name="status" @if($user->status=='Activo') ? {{'checked'}} : @endif>
              <label class="custom-control-label" for="status">{{$user->status}}</label>
            </div>
        </div>
    </div>
    <div class="col-lg-6">

        <div class="form-group">
            <label for="name">Nombres/Nombre Comercial</label>
            <input type="text" class="form-control" id="name2" value="{{ old('name',$PersonEntity->name) }}" disabled>

        </div>
        <div class="form-group">
            <label for="last_name">Apellido Paterno/Razon Social</label>
            <input type="text" class="form-control" id="last_name" value="{{ old('last_name',$PersonEntity->last_name) }}" disabled>

        </div>


        <div class="form-group">
            <label for="email">Correo Electronico</label>
            <input type="email" class="form-control" id="email" value="{{ old('email',$PersonEntity->email) }}" disabled>

        </div>
        <div class="form-group">
            <label for="status2">Estado</label>
            <input type="text" class="form-control" id="status2" value="{{ old('status',$PersonEntity->status) }}" disabled>

        </div>
        <div class="form-group">
            <label for="number_phone1">Telefono</label>
            <input type="number" class="form-control" id="number_phone1" value="{{ old('number_phone1',$PersonEntity->number_phone1) }}" disabled>

        </div>

    </div>
    <div class="col-lg-6">
        <div class="form-group">
            <label for="country_id">Pais</label>
            <input type="text" class="form-control" id="country_id" value="{{ isset($PersonEntity->countries->name) ? $PersonEntity->countries->name : '' }}" disabled>

        </div>
        <div class="form-group">
            <label for="province_id">Provincia</label>
            <input type="text" class="form-control" id="province_id" value="{{ isset($PersonEntity->provinces->name) ? $PersonEntity->provinces->name : ''}}" disabled>

        </div>
        <div class="form-group">
            <label for="canton_id">Canton</label>
            <input type="text" class="form-control" id="canton_id" value="{{ isset($PersonEntity->provinces->name) ? $PersonEntity->cantons->name : '' }}" disabled>

        </div>
        <div class="form-group">
            <label for="parish_id">Parroquia</label>
            <input type="text" class="form-control" id="parish_id" value="{{ isset($PersonEntity->provinces->name) ? $PersonEntity->parishes->name : '' }}" disabled>

        </div>
        <div class="form-group">
            <label for="address">Direccion</label>
            <input type="email" class="form-control" id="address" value="{{ old('address',$PersonEntity->address) }}" disabled>

        </div>
    </div>
</div>
