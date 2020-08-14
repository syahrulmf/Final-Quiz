<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link">
        <img src="{{ url('backend/dist/img/AdminLTELogo.png') }}"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        @auth
        <div class="image">
            <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}" class="img-circle elevation-2" alt="User Image">
        </div>
        @endauth

        <div class="info">
            @guest
                <a href="#"><span class="d-block">Anda Belum Login</span></a>
            @endguest
            @auth
                <a href="#" class="d-block"> {{ Auth::user()->name }} </a>
            @endauth
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ url('/') }}" class="nav-link">
              <i class="nav-icon fas fa-comments"></i>
              <p>
                Forum
              </p>
            </a>
          </li>

          @auth
            <li class="nav-item">
                <a href="{{ url('/pertanyaan') }}" class="nav-link">
                    <i class="nav-icon fas fa-database"></i>
                    <p>
                        Kelola Pertanyaan
                    </p>
                </a>
            </li>
          @endauth

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
