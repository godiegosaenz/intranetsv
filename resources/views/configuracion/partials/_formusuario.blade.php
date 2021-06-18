<div class="row">
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
    <div class="col-6">
        <button class="btn btn-primary" type="submit"><i class="fa fa-plus-square"></i> Guardar</button>
    </div>
</div>
