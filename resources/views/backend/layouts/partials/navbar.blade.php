<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-primary navbar-dark">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
  </ul>
  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <!-- Notifications Dropdown Menu -->
    <li class="nav-item dropdown mr-3">
      <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="fa-regular fa-bell"></i>
      </a>
    </li>
    <!-- Settings Dropdown Menu -->
    @if( Auth::guard('admin')->check())
      <li class="nav-item dropdown mr-3">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fa-regular fa-user"></i>
        </a>
        <div class="dropdown-menu dropdown-menu dropdown-menu-right">
          <a class="dropdown-item" href="{{ route('admin.settings') }}"><i class="fa fa-cog mr-2"></i>Ajustes</a>
          <a class="dropdown-item" href="{{ route('admin.profile') }}"><i class="fa fa-user mr-2"></i>Perfil</a>
          <a class="dropdown-item" href="{{ route('admin.logout_handler') }}" onclick="event.preventDefault();document.getElementById('adminLogoutForm').submit()"><i
              class="fa fa-sign-out mr-2"></i>Cerrar Sesión</a>
          <form action="<?= route('admin.logout_handler') ?>" id="adminLogoutForm" method="POST">@csrf</form>
        </div>
      </li>
    @endif
  </ul>
</nav>
<!-- /.navbar -->
