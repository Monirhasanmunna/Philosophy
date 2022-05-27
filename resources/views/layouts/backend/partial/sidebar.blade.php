<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a target="blank" href="{{route('home')}}" class="brand-link">
    <img src="{{asset('storage/user/'.Auth::user()->image)}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
         style="opacity: .8">
    <span class="brand-text font-weight-light"><img class="img-fluid" style="width: 130px;" src="{{asset('storage/logo/'.$logo->logo)}}" alt="" srcset=""></span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{asset('storage/user/'.Auth::user()->image)}}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="{{route('admin.user.info')}}" class="d-block">{{Auth::user()->username}}</a>
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
            <i class="fas fa-paper-plane"></i>
            <p>
              Post
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item" style="width: 100%;">
              <a href="{{route('admin.post.index')}}" class="nav-link">
                <i class="fas fa-list"></i>
                <p>Post List</p>
              </a>
            </li>

            <li class="nav-item" style="width: 100%;">
              <a href="{{route('admin.post.create')}}" class="nav-link">
                <i class="fas fa-circle-plus"></i>
                <p>Add New</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="fas fa-indent"></i>
            <p>
              Category
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            
            <li class="nav-item" style="width: 100%;">
              <a href="{{route('admin.category.create')}}" class="nav-link">
                <i class="fas fa-circle-plus"></i>
                <p>Add New</p>
              </a>
            </li>

            <li class="nav-item" style="width: 100%;">
              <a href="{{route('admin.category.index')}}" class="nav-link">
                <i class="fas fa-list"></i>
                <p>Category List</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="fas fa-tags"></i>
            <p>
              Tag
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            
            <li class="nav-item" style="width: 100%;">
              <a href="{{route('admin.tag.create')}}" class="nav-link">
                <i class="fas fa-circle-plus"></i>
                <p>Add New</p>
              </a>
            </li>

            <li class="nav-item" style="width: 100%;">
              <a href="{{route('admin.tag.index')}}" class="nav-link">
                <i class="fas fa-list"></i>
                <p>Tag List</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="fas fa-gear"></i>
            <p>
              Settings
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">

            <li class="nav-item" style="width: 100%;">
              <a href="{{route('admin.settings')}}" class="nav-link">
                <i class="fas fa-book-open"></i>
                <p>Web Templete</p>
              </a>
            </li>

            </li>
          </ul>
        </li>
        

        @endif

        @if (Request::is('author*'))
        
        <li class="nav-item has-treeview active">
          <a href="{{route('author.dashboard')}}" class="nav-link">
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
              <a href="{{route('author.post.index')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Post List</p>
              </a>
            </li>

            <li class="nav-item" style="width: 100%;">
              <a href="{{route('author.post.create')}}" class="nav-link">
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
              <a href="{{route('author.category.create')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add New</p>
              </a>
            </li>

            <li class="nav-item" style="width: 100%;">
              <a href="{{route('author.category.index')}}" class="nav-link">
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
              <a href="{{route('author.tag.create')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add New</p>
              </a>
            </li>

            <li class="nav-item" style="width: 100%;">
              <a href="{{route('author.tag.index')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Tag List</p>
              </a>
            </li>
          </ul>
        </li>

        @endif

      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>