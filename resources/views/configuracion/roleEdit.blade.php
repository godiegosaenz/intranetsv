@extends('layouts.app')
@section('content')
    <x-header title="Editar de roles">
        <li class="breadcrumb-item"><a href="{{ route('roles.index') }}">Roles</a></li>
        <li class="breadcrumb-item active">Editar</li>
    </x-header>
    <x-content>
        <form action="{{ route('roles.update', $role) }}" method="post">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="name">*Nombres</label>
                        <input type="text" class="form-control @error('name')is-invalid @enderror" name="name" id="name" placeholder="Administrador" value="{{ old('name',$role->name) }}">
                        @error('name')
                        <span class="error invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6">
                    <h5>Permisos</h5>
                    @isset($permissions)
                        @foreach ($permissions as $idp => $namep)
                            <div class="form-check">
                                <input class="form-check-input" name="permisions[]" value="{{ $namep }}" type="checkbox" {{ $rolepermission->contains($idp) ? 'checked' : '' }} >
                                <label class="form-check-label">{{$namep}}</label>
                            </div>
                        @endforeach
                    @endisset
                </div>
                <div class="col-6">
                    <button class="btn btn-primary" type="submit"><i class="fa fa-plus-square"></i> Actualizar</button>
                </div>
            </div>
        </form>
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
    });
    </script>
@endpush

