@extends('layouts.app')
@section('content')
    <x-header title="Crear de roles">
        <li class="breadcrumb-item"><a href="{{ route('roles.index') }}">Roles</a></li>
        <li class="breadcrumb-item active">Crear</li>
    </x-header>
    <x-content>
        <form action="{{ route('roles.store') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="name">*Nombres</label>
                        <input type="text" class="form-control @error('name')is-invalid @enderror" name="name" id="name" placeholder="Administrador" value="{{ old('name',$roles->name) }}">
                        @error('name')
                        <span class="error invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6">
                    <h5>Permisos</h5>
                    @isset($permissions)
                        @foreach ($permissions as $p)
                            <div class="form-check">
                                <input class="form-check-input" name="permisions[]" value="{{ $p->name }}" type="checkbox">
                                <label class="form-check-label">{{$p->name}}</label>
                            </div>
                        @endforeach
                    @endisset
                </div>
                <div class="col-6">
                    <button class="btn btn-primary" type="submit"><i class="fa fa-plus-square"></i> Guardar</button>
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
