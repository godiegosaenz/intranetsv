<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('home')}}" class="brand-link">
      <img src="{{asset('img/logosv.png')}}" alt="GAD San Vicente Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">SGT</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('img/perfil-vacio.png')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            @auth
                <a href="#" class="d-block">{{ auth()->user()->name.' '.auth()->user()->lastname }}  </a>
            @endauth
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
                <a href="{{ route('home') }}" class="nav-link {{ (url()->current() == route('home')) ? 'active' : '' }}">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>Tablero</p>
                </a>
            </li>
            @can('menu de administracion')
            <li class="nav-item {{ (url()->current() == route('users.index') || url()->current() == route('peopleentities.index')) ? 'menu-open' : '' }}">
                @auth
                <a href="#" class="nav-link {{ (url()->current() == route('peopleentities.index') || url()->current() == route('users.index')) ? 'active' : '' }}">
                @endauth
                    <i class="nav-icon fas fa-users-cog"></i>
                    <p>
                        administracion
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                @can('ver personas')
                <li class="nav-item">
                    <a href="{{ route('peopleentities.index') }}" class="nav-link {{ (url()->current() == route('peopleentities.index')) ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Personas/empresas</p>
                    </a>
                </li>
                @endcan
                @can('ver usuarios')
                <li class="nav-item">
                    <a href="{{ route('users.index')}}" class="nav-link {{ (url()->current() == route('users.index')) ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Usuarios</p>
                    </a>
                </li>
                @endcan
                </ul>
            </li>
            @endcan
            @can('menu de configuraciones')
            <li class="nav-item {{ url()->current() == route('roles.index') ? 'menu-open' : '' }}">
                <a href="#" class="nav-link {{ (url()->current() == route('roles.index')) ? 'active' : '' }}">
                <i class="nav-icon fas fa-cogs"></i>
                <p>
                    Configuracion
                    <i class="fas fa-angle-left right"></i>
                    <span class="badge badge-info right">6</span>
                </p>
                </a>
                <ul class="nav nav-treeview">
                @can('ver roles')
                <li class="nav-item">
                    <a href="{{ route('roles.index')}}" class="nav-link {{ (url()->current() == route('roles.index')) ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Roles</p>
                    </a>
                </li>
                @endcan
                @can('ver permisos')
                <li class="nav-item">
                    <a href="pages/layout/boxed.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Permisos</p>
                    </a>
                </li>
                @endcan
                </ul>
            </li>
            @endcan
            @can('menu de cultura')
            <li class="nav-item {{ url()->current() == route('culturalmanagers.index') ? 'menu-open' : '' }} ">
              <a href="#" class="nav-link {{ (url()->current() == route('culturalmanagers.index')) ? 'active' : '' }}">
                <i class="nav-icon fas fa-book-open"></i>
                <p>
                  Modulo Cultura
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                @can('ver gestor cultural')
                <li class="nav-item">
                  <a href="{{ route('culturalmanagers.index') }}" class="nav-link {{ (url()->current() == route('culturalmanagers.index')) ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Gestores culturales</p>
                  </a>
                </li>
                @endcan
                @can('ver inventario patrimonial')
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>
                      Inventario Patrimonial
                      <i class="right fas fa-angle-left"></i>
                    </p>
                  </a>
                </li>
                @endcan
              </ul>
            </li>
            @endcan
            @can('menu de turismo')
            <li class="nav-item {{ url()->current() == route('establishments.index') ? 'menu-open' : '' }}">
              <a href="#" class="nav-link {{ (url()->current() == route('establishments.index')) ? 'active' : '' }}">
                <i class="nav-icon fas fa-globe"></i>
                <p>
                  Modulo Turismo
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                @can('ver establecimiento')
                  <li class="nav-item">
                      <a href="{{ route('establishments.index') }}" class="nav-link {{ (url()->current() == route('establishments.index')) ? 'active' : '' }}">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Establecimientos</p>
                        </a>
                  </li>
                @endcan
              </ul>
            </li>
            @endcan
            @can('menu de rentas')
            <li class="nav-item {{ url()->current() == route('emision.index') || url()->current() == route('luaf.index') ? 'menu-open' : '' }}">
              <a href="#" class="nav-link {{ (url()->current() == route('emision.index')) ? 'active' : '' }}">
                <i class="nav-icon fas fa-file-invoice-dollar"></i>
                <p>
                  Rentas
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                @can('emitir')
                <li class="nav-item">
                  <a href="{{ route('emision.index') }}" class="nav-link {{ (url()->current() == route('emision.index')) ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Emisión</p>
                  </a>
                </li>
                @endcan
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Rubros</p>
                  </a>
                </li>
                @can('ver tabla de luaf')
                <li class="nav-item">
                  <a href="{{ route('luaf.index')}}" class="nav-link {{ (url()->current() == route('luaf.index')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tabla Luaf</p>
                  </a>
                </li>
                @endcan
              </ul>
            </li>
            @endcan

            <li class="nav-item {{ url()->current() == route('liquidation.index') || url()->current() == route('pay.index') ? 'menu-open' : '' }}">
              <a href="#" class="nav-link {{ (url()->current() == route('emision.index')) ? 'active' : '' }}">
                <i class="fas fa-cash-register"></i>
                <p>
                  Recaudacion
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                @can('recaudar')
                <li class="nav-item">
                  <a href="{{ route('liquidation.index') }}" class="nav-link {{ (url()->current() == route('liquidation.index')) ? 'active' : '' }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Pago de Luaf</p>
                  </a>
                </li>
                @endcan
                <li class="nav-item">
                  <a href="{{ route('pay.index') }}" class="nav-link {{ (url()->current() == route('pay.index')) ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Comprobantes cobrados</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="fal fa-file-pdf"></i>
                    <p>Reportes diarios</p>
                  </a>
                </li>
              </ul>
            </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
