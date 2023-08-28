<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{ asset('assets/dashboard/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">Alexander Pierce</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-copy"></i>
            <p>
              Categories
              <i class="fas fa-angle-left right"></i>
              <span class="badge badge-info right">6</span>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('categories.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>All Categories</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('categories.create') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>create</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-chart-pie"></i>
            <p>
              All courses
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('courses.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>All Courses</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('courses.create') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Create</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="{{ route('order.index') }}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Orders</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('contact.index') }}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Complaints</p>
          </a>
        </li>
        <li class="nav-item">
            <form action="{{ route('logoutAdmin') }}" method="post">
                @csrf
                <button class="nav-link" type="submit" style="border: 0;
                background-color: transparent; outline:0;">
                    <i class="nav-icon far fa-circle text-danger"></i>
                    <p class="text">Logout</p>
                </button>
            </form>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>