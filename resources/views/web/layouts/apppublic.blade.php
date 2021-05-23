<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Corazones Org</title>
  <link rel="stylesheet" href="{{asset('css/app.css')}}">
  <!-- jQuery -->
   <script src="{{asset('js/app.js')}}"></script>
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
      <a href="../../index3.html" class="navbar-brand">
        <img src="/img/logotipo/corazones-01.svg" alt="Corazones Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Corazones</span>
      </a>

      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="#" class="nav-link">Funcación</a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">Qué hacemos</a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">Cómo Participar</a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">Proyectos</a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">Donar ahora</a>
          </li>
          <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Quieres ayudar</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
              <li><a href="#" class="dropdown-item">Some action </a></li>
              <li><a href="#" class="dropdown-item">Some other action</a></li>

              <li class="dropdown-divider"></li>

              <!-- Level two dropdown-->
              <li class="dropdown-submenu dropdown-hover">
                <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">Hover for action</a>
                <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
                  <li>
                    <a tabindex="-1" href="#" class="dropdown-item">level 2</a>
                  </li>

                  <!-- Level three dropdown-->
                  <li class="dropdown-submenu">
                    <a id="dropdownSubMenu3" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">level 2</a>
                    <ul aria-labelledby="dropdownSubMenu3" class="dropdown-menu border-0 shadow">
                      <li><a href="#" class="dropdown-item">3rd level</a></li>
                      <li><a href="#" class="dropdown-item">3rd level</a></li>
                    </ul>
                  </li>
                  <!-- End Level three -->

                  <li><a href="#" class="dropdown-item">level 2</a></li>
                  <li><a href="#" class="dropdown-item">level 2</a></li>
                </ul>
              </li>
              <!-- End Level two -->
            </ul>
          </li>
        </ul>

      </div>

      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">

        <!-- Language Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="flag-icon flag-icon-us"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right p-0">
                <a href="#" class="dropdown-item active">
                <i class="flag-icon flag-icon-us mr-2"></i> English
                </a>
                <a href="#" class="dropdown-item">
                <i class="flag-icon flag-icon-de mr-2"></i> German
                </a>
                <a href="#" class="dropdown-item">
                <i class="flag-icon flag-icon-fr mr-2"></i> French
                </a>
                <a href="#" class="dropdown-item">
                <i class="flag-icon flag-icon-es mr-2"></i> Spanish
                </a>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
            <i class="fas fa-th-large"></i>
          </a>
        </li>
      </ul>
    </div>
  </nav>
  <!-- /.navbar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Slider) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="/img/slider/sliderwoman2.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="/img/slider/sliderman.jpg" class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" x  href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- /.Content Header (End Slider) -->

    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="row">
           <!-- col-md-6 -->
          <div class="col-lg-6">
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row no-gutters">
                  <div class="col-md-4">
                    <img src="..." alt="...">
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <h5 class="card-title">Card title</h5>
                      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                  </div>
                </div>
            </div>
          </div>
          <!-- /.col-md-6 -->
          <!-- /.col-md-6 -->
          <div class="col-lg-6">
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row no-gutters">
                  <div class="col-md-4">
                    <img src="..." alt="...">
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <h5 class="card-title">Card title</h5>
                      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                  </div>
                </div>
            </div>
          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
        <div class="card card-success">
            <div class="card-body">
              <div class="row">
                <div class="col-md-12 col-lg-6 col-xl-4">
                  <div class="card mb-2 bg-gradient-dark">
                    <img class="card-img-top" src="img/cards/cardvoluntario2.jpg" alt="Dist Photo 1">
                    <div class="card-img-overlay d-flex flex-column justify-content-end">
                      <h5 class="card-title text-primary text-white">Card Title</h5>
                      <p class="card-text text-white pb-2 pt-1">Lorem ipsum dolor sit amet, consectetur adipisicing elit sed do eiusmod tempor.</p>
                      <a href="#" class="text-white">Last update 2 mins ago</a>
                    </div>
                  </div>
                </div>
                <div class="col-md-12 col-lg-6 col-xl-4">
                  <div class="card mb-2">
                    <img class="card-img-top" src="/img/cards/cardpadrino.jpg" alt="Dist Photo 2">
                    <div class="card-img-overlay d-flex flex-column justify-content-center">
                      <h5 class="card-title text-white mt-5 pt-2">Card Title</h5>
                      <p class="card-text pb-2 pt-1 text-white">
                        Lorem ipsum dolor sit amet, <br>
                        consectetur adipisicing elit <br>
                        sed do eiusmod tempor.
                      </p>
                      <a href="#" class="text-white">Last update 15 hours ago</a>
                    </div>
                  </div>
                </div>
                <div class="col-md-12 col-lg-6 col-xl-4">
                  <div class="card mb-2">
                    <img class="card-img-top" src="/img/cards/cardvdonacion.jpg" alt="Dist Photo 3">
                    <div class="card-img-overlay">
                      <h5 class="card-title text-primary">Card Title</h5>
                      <p class="card-text pb-1 pt-1 text-white">
                        Lorem ipsum dolor <br>
                        sit amet, consectetur <br>
                        adipisicing elit sed <br>
                        do eiusmod tempor. </p>
                      <a href="#" class="text-primary">Last update 3 days ago</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">

            </div>
        </div>
    </div>
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->
</body>
</html>
