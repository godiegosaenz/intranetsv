@extends('layouts.app')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1>403 Usuario no autorizado</h1>
        </div>
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">403 Usuario no autorizado</li>
        </ol>
        </div>
    </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="error-page">
    <h2 class="headline text-warning"> 403</h2>

    <div class="error-content">
        <h3><i class="fas fa-exclamation-triangle text-warning"></i> Lo sentimos.</h3>

        <p>
        No cuentas con los permisos para acceder a este página.
        Solicita los permisos al administrador de sistemas.
        </p>
    </div>
    <!-- /.error-content -->
    </div>
    <!-- /.error-page -->
</section>
<!-- /.content -->
@endsection
