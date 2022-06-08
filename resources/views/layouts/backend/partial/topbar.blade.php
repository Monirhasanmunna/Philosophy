<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="{{route('home')}}" target="blank" class="nav-link">Home</a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="#" class="nav-link">Contact</a>
    </li>
  </ul>

  <!-- SEARCH FORM -->
  <form class="form-inline ml-3">
    <div class="input-group input-group-sm">
      <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
      <div class="input-group-append">
        <button class="btn btn-navbar" type="submit">
          <i class="fas fa-search"></i>
        </button>
      </div>
    </div>
  </form>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <!-- Messages Dropdown Menu -->
    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="far fa-comments"></i>
        <span class="badge badge-danger navbar-badge">3</span>
      </a>
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

        @foreach ($comments as $comment)

          <a href="#" class="dropdown-item">
          <!-- Message Start -->
          <div class="media">
            <img src="{{asset('storage/image/user.png')}}" alt="" class="img-size-50 img-circle mr-3">
            <div class="media-body">
              <h3 class="dropdown-item-title">
                {{$comment->name}}
              </h3>
              <p class="text-sm">{{Str::limit($comment->text,'20','...')}}</p>
              <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
            </div>
          </div>
          <!-- Message End -->
        </a>
        <div class="dropdown-divider"></div>
        @endforeach
      </div>
    </li>
    <!-- Notifications Dropdown Menu -->
    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown">
        <img style="width:35px;" src="{{asset('storage/image/user.png')}}" alt="" srcset="">
      </a>
      @if (Request::is('admin*'))
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <span class="dropdown-item dropdown-header">
          <img class="img-thumbnail" style="width:80px;height:80px;border-radius:50%;" src="{{asset('storage/user/'.Auth::user()->image)}}" alt="" srcset="">
        </span>
        
        <h5 class="text-center">{{Auth::user()->username}}</h5>
        <a href="{{route('admin.user.info')}}" class="btn btn-primary pull-right"> 
          <i class="fas fa-setting"></i>User Update</a>
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button style="border: none;" class="btn btn-danger" href="{{route('logout')}}" onclick="event.preventDefault();this.closest('form').submit();">Log Out</button>
        </form>
        </form>
      </div>
      @endif

      @if (Request::is('author*'))
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <span class="dropdown-item dropdown-header">
          <img class="img-thumbnail" style="width:80px;height:80px;border-radius:50%;" src="{{asset('storage/user/'.Auth::user()->image)}}" alt="" srcset="">
        </span>
        <h5 class="text-center">{{Auth::user()->username}}</h5>
        <a href="{{route('author.user.info')}}" class="btn btn-primary pull-right"> 
          <i class="fas fa-setting"></i>User Update</a>
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button style="border: none;" class="btn btn-danger" href="{{route('logout')}}" onclick="event.preventDefault();this.closest('form').submit();">Log Out</button>
        </form>
      </div>
      @endif
    </li>
  </ul>
</nav>
<!-- /.navbar -->