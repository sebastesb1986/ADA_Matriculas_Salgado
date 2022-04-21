@auth
  <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-glasses"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Optometry V 1.0</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }} ">
        <a class="nav-link" href=" {{ route('dashboard')  }}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Enfermedad
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item {{ request()->routeIs('admin.diseases.index') || request()->routeIs('admin.typeDiseases.index') ? 'active' : '' }} " >
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-book-medical"></i>
          <span>Enfermedades</span>
        </a>
        <div id="collapseTwo" class="collapse {{ request()->routeIs('admin.diseases.index') || request()->routeIs('admin.typeDiseases.index') ? 'show' : '' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Opciones:</h6>
            <a class="collapse-item {{ request()->routeIs('admin.diseases.index') ? 'active' : '' }}" href="{{ route('admin.diseases.index') }}">Ver Enfermedades</a>
            <a class="collapse-item {{ request()->routeIs('admin.typeDiseases.index') ? 'active' : '' }}" href="{{ route('admin.typeDiseases.index') }}">Lista tipos enfermedad</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item {{ request()->routeIs('admin.treatments.index') || request()->routeIs('admin.drugs.index') ? 'active' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-capsules"></i>
          <span>Tratamientos</span>
        </a>
        <div id="collapseUtilities" class="collapse {{ request()->routeIs('admin.treatments.index') || request()->routeIs('admin.drugs.index') ? 'show' : '' }}" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Opciones:</h6>
            <a class="collapse-item {{ request()->routeIs('admin.treatments.index') ? 'active' : '' }}" href="{{ route('admin.treatments.index') }}">Ver tratamientos</a>
            <a class="collapse-item {{ request()->routeIs('admin.drugs.index') ? 'active' : '' }}" href="{{ route('admin.drugs.index') }}">Lista medicamentos</a>
          </div>
        </div>
      </li>

      @if(auth()->user()->admin === 1)
      <!-- Divider -->
      <hr class="sidebar-divider">

      
      <!-- Heading -->
      <div class="sidebar-heading">
        Administración
      </div>

      
      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item {{ request()->routeIs('admin.users.index') ? 'active' : '' }}"">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-gamepad"></i>
          <span>Usuarios</span>
        </a>
        <div id="collapsePages" class="collapse {{ request()->routeIs('admin.users.index') ? 'show' : '' }}" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Administrar usuarios:</h6>
            <a class="collapse-item {{ request()->routeIs('admin.users.index') ? 'active' : '' }}" href="{{ route('admin.users.index') }}">Lista de usuarios</a>
          </div>
        </div>
      </li>
      @endif

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
  @endauth
  