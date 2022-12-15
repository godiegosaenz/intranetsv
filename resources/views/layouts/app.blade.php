<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Sistema de gestion de turismo</title>
  <link rel="stylesheet" href="{{asset(mix('css/app.css'))}}">

  <!-- jQuery -->
   <script src="{{asset(mix('js/app.js'))}}"></script>
</head>
<body class="hold-transition sidebar-mini layout-navbar-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{asset('img/logosv.png')}}" alt="SanVicentelogo" height="60" width="60">
  </div>

  @include('partials.nav')

  @include('partials.aside')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @yield('content')
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2019-2023 <a href="https://sanvicente.gob.ec">Gobierno Autónmo Descentralizado Municipal de San Vicente</a>.</strong>
    Todos los derechos reservados.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
@yield('modals')
@stack('scripts')
</body>
</html>
