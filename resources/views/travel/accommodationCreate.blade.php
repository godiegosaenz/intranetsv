@extends('layouts.app')
@section('content')
    <x-header title="Crear Alojamiento turistico">
        <li class="breadcrumb-item"><a href="{{ route('accommodations.index') }}">Alojamiento turistico</a></li>
        <li class="breadcrumb-item active">Crear</li>
    </x-header>
  <!-- Main content -->
  <section class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header p-2">
                  <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link active" href="#formulario" data-toggle="tab"> Formulario de alojamientos turisticos</a></li>
                    <li class="nav-item"><a class="nav-link" href="#uploadfile" data-toggle="tab"> Subir archivos</a></li>
                  </ul>
                </div><!-- /.card-header -->
                <div class="card-body">
                  <div class="tab-content">
                    <div class="active tab-pane" id="formulario">

                        <form action="{{ route('accommodations.store') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <br>
                                    <div class="form-group">
                                        <button class="btn btn-primary" type="submit"><i class="fa fa-plus-square"></i> Guardar</button>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Tipo</label>
                                        <select id="type" name="type"class="custom-select">
                                          <option value="1">Persona</option>
                                          <option value="2">Empresa</option>
                                          <option value="3">Institucion</option>
                                          <option value="4">Asociacion</option>
                                          <option value="5">Organizacion sin fines de lucro</option>
                                        </select>
                                      </div>
                                </div>
                                <div class="col-lg-12">
                                    <hr>
                                </div>
                                <div class="col-lg-6">

                                    <label for="cc_ruc"> Selecciona Persona / empresa</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-lg">Buscar</button>
                                        </div>
                                        <!-- /btn-group -->
                                        <input id="cc_ruc" type="text" class="form-control @error('people_entities_id')is-invalid @enderror" value="{{ old('country_id',$PersonEntityData->cc_ruc) }}">
                                        @error('people_entities_id')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="last_name">*Cedula/Ruc</label>
                                        <input type="text" class="form-control @error('last_name')is-invalid @enderror" name="last_name" id="last_name" placeholder="..." value="{{ old('last_name',$PersonEntityData->last_name) }}" required>
                                        @error('last_name')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="last_name">*Nombres/ Nombre comercial</label>
                                        <input type="text" class="form-control @error('last_name')is-invalid @enderror" name="last_name" id="last_name" placeholder="..." value="{{ old('last_name',$PersonEntityData->last_name) }}" required>
                                        @error('last_name')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputFile">Subir Nombramiento</label>
                                        <div class="input-group">
                                          <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="exampleInputFile">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                          </div>
                                          <div class="input-group-append">
                                            <span class="input-group-text" id="">Upload</span>
                                          </div>
                                        </div>
                                      </div>
                                    <label for="cc_ruc"> Selecciona Representante legal</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-lg">Buscar</button>
                                        </div>
                                        <!-- /btn-group -->
                                        <input id="cc_ruc" type="text" class="form-control @error('people_entities_id')is-invalid @enderror" value="{{ old('country_id',$PersonEntityData->cc_ruc) }}">
                                        @error('people_entities_id')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="last_name">*Cedula/RUC</label>
                                        <input type="text" class="form-control @error('last_name')is-invalid @enderror" name="last_name" id="last_name" placeholder="..." value="{{ old('last_name',$PersonEntityData->last_name) }}" required>
                                        @error('last_name')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="maternal_last_name">Nombres/ Razon Social</label>
                                        <input type="text" class="form-control @error('maternal_last_name')is-invalid @enderror" name="maternal_last_name" id="maternal_last_name" placeholder="Zambr..." value="{{ old('maternal_last_name',$PersonEntityData->maternal_last_name) }}" required>
                                        @error('maternal_last_name')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Subir Nombramiento:</label>

                                        <div class="input-group">
                                          <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                          </div>
                                          <input type="text" class="form-control" id="date_birth" name="date_birth" value="" required/>
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                    <div class="form-group">
                                        <label for="email">*Certificado de registro del establecimiento</label>
                                        <input type="email" class="form-control @error('email')is-invalid @enderror" name="email" id="email" placeholder="abcd....@gmail.com" value="{{ old('email',$PersonEntityData->email) }}" required>
                                        @error('email')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>*Estado</label>
                                        <select id="status" name="status" class="custom-select" required>
                                            <option value="">Seleccione estado</option>
                                            <option value="1">Activo</option>
                                            <option value="2">Inactivo</option>
                                        </select>
                                        @error('status')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                      </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="number_phone1">*Telefono</label>
                                        <input type="text" class="form-control @error('number_phone1')is-invalid @enderror" name="number_phone1" id="number_phone1" placeholder="0995....." value="{{ old('number_phone1',$PersonEntityData->number_phone1) }}" required>
                                        @error('number_phone1')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>*Pais</label>
                                        <select id="country_id" name="country_id" class="custom-select  @error('country_id') is-invalid @enderror" required>
                                            @isset($CountryData)
                                                <option value="">Seleccione pais</option>
                                                @foreach ($CountryData as $cd)
                                                    @if(Cookie::get('country_id'))
                                                        @if($cd->id == Cookie::get('country_id'))
                                                            <option value="{{ $cd->id }}" selected>{{ $cd->name }}</option>
                                                        @else
                                                            <option value="{{ $cd->id }}">{{ $cd->name }}</option>
                                                        @endif

                                                    @else
                                                        <option value="{{ $cd->id }}">{{ $cd->name }}</option>
                                                    @endif
                                                @endforeach
                                            @endisset
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>*Provincia</label>

                                        <select id="province_id" name="province_id" class="custom-select @error('province_id') is-invalid @enderror" required>
                                            <option value="">Seleccione provincia</option>
                                            @if(Cookie::get('province_id') !== null)

                                                @foreach ($ProvinceData as $p)
                                                    @if(Cookie::get('province_id'))
                                                        @if($p->id == Cookie::get('province_id'))
                                                            <option value="{{ $p->id }}" selected>{{ $p->name }}</option>
                                                        @else
                                                            <option value="{{ $p->id }}">{{ $p->name }}</option>
                                                        @endif

                                                    @else
                                                        <option value="{{ $p->id }}">{{ $p->name }}</option>
                                                    @endif
                                                @endforeach
                                            @endif
                                        </select>
                                        @error('province_id')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>*Canton</label>
                                        <select id="canton_id" name="canton_id" class="custom-select @error('canton_id') is-invalid @enderror" required>
                                            <option value="">Seleccione canton</option>
                                            @if(Cookie::get('canton_id') !== null)

                                                @foreach ($CantonData as $c)
                                                    @if(Cookie::get('canton_id'))
                                                        @if($c->id == Cookie::get('canton_id'))
                                                            <option value="{{ $c->id }}" selected>{{ $c->name }}</option>
                                                        @else
                                                            <option value="{{ $c->id }}">{{ $c->name }}</option>
                                                        @endif

                                                    @else
                                                        <option value="{{ $c->id }}">{{ $c->name }}</option>
                                                    @endif
                                                @endforeach
                                            @endif
                                        </select>
                                        @error('canton_id')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>*Parroquia</label>
                                        <select id="parish_id" name="parish_id" class="custom-select @error('parish_id') is-invalid @enderror" required>
                                            <option value="">Seleccione canton</option>
                                            @if(Cookie::get('parish_id') !== null)
                                                @foreach ($ParishData as $pa)
                                                    @if(Cookie::get('parish_id'))
                                                        @if($pa->id == Cookie::get('parish_id'))
                                                            <option value="{{ $pa->id }}" selected>{{ $pa->name }}</option>
                                                        @else
                                                            <option value="{{ $pa->id }}">{{ $pa->name }}</option>
                                                        @endif

                                                    @else
                                                        <option value="{{ $pa->id }}">{{ $pa->name }}</option>
                                                    @endif
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="address">*Direccion</label>
                                        <input type="text" class="form-control @error('address')is-invalid @enderror" name="address" id="address" placeholder="Calle ..." value="{{ old('address',$PersonEntityData->address) }}" required>
                                        @error('address')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                    <div class="tab-pane" id="uploadfile">
                    </div>
                  </div>
                  <!-- /.tab-content -->
                </div><!-- /.card-body -->
                <div id="loading" class="overlay dark" style="display: none">
                    <i class="fas fa-2x fa-sync-alt fa-spin"></i>
                </div>
            </div>
        </div>
    </div>
  </section>
@endsection
