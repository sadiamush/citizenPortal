<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{asset('backend/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('backend/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>



      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          </li>
          <li class="nav-item ">
            <a href="{{url('user')}}" class="nav-link {{request()->routeIs('user*')? 'active' : ''}}">
              <i class="nav-icon fas fa-th"></i>
              <p>
                User
              </p>
            </a>
          </li>
          @if(Auth::user()->role == "Admin")
          <li class="nav-item">
            <a href="{{url('citizen')}}" class="nav-link {{request()->routeIs('citizen*')? 'active' : ''}}">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Citizen
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('network')}}" class="nav-link {{request()->routeIs('network*')? 'active' : ''}}">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Network
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('list')}}" class="nav-link {{request()->routeIs('list*')? 'active' : ''}}">
              <i class="nav-icon fas fa-th"></i>
              <p>
                List
              </p>
            </a>
          </li>
          @endif
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
