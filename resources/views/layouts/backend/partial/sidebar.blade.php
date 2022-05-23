<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link">
    <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
         style="opacity: .8">
    <span class="brand-text font-weight-light">AdminLTE 3</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">Alexander Pierce</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        
        @if (Request::is('admin*'))

        <li class="nav-item has-treeview active">
          <a href="{{route('admin.dashboard')}}" class="nav-link">
            <i class="nav-icon fas fa-square"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>

        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-edit"></i>
            <p>
              Post
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item" style="width: 100%;">
              <a href="{{route('admin.post.index')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Post List</p>
              </a>
            </li>

            <li class="nav-item" style="width: 100%;">
              <a href="{{route('admin.post.create')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add New</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-edit"></i>
            <p>
              Category
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            
            <li class="nav-item" style="width: 100%;">
              <a href="{{route('admin.category.create')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add New</p>
              </a>
            </li>

            <li class="nav-item" style="width: 100%;">
              <a href="{{route('admin.category.index')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Category List</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-edit"></i>
            <p>
              Tag
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            
            <li class="nav-item" style="width: 100%;">
              <a href="{{route('admin.tag.create')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add New</p>
              </a>
            </li>

            <li class="nav-item" style="width: 100%;">
              <a href="{{route('admin.tag.index')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Tag List</p>
              </a>
            </li>
          </ul>
        </li>
            
        @endif

        @if (Request::is('author*'))
        
        

        @endif

      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>