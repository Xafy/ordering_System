<header class="p-3 text-bg-dark bg-dark">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
          <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          @if (Auth::user() && Auth::user()->role_id === 1)
              <li><a href="{{route('users.all')}}" class="nav-link px-2 text-secondary">users</a></li>
              <li><a href="{{route('users.providers')}}" class="nav-link px-2 text-white">service providers</a></li>
              <li><a href="{{route('orders.all')}}" class="nav-link px-2 text-white">all orders</a></li>
          @endif
          
          @if ( Auth::user() && Auth::user()->role_id === 2)
              <li><a href="{{route('services.create')}}" class="nav-link px-2 text-secondary">Create Service</a></li>
              <li><a href="{{route('services.index')}}" class="nav-link px-2 text-secondary">services</a></li>
              <li><a href="{{route('orders.index')}}" class="nav-link px-2 text-white">orders</a></li>
          @endif

          {{-- @if (Auth::user()->role_id === 3)
              <li><a href="{{route('books.index')}}" class="nav-link px-2 text-secondary">users</a></li>
              <li><a href="{{route('notes.create')}}" class="nav-link px-2 text-white">services</a></li>
              <li><a href="{{route('books.index')}}" class="nav-link px-2 text-white">orders</a></li>
          @endif --}}
        </ul>

        <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
          <input type="search" class="form-control form-control-dark text-bg-dark" placeholder="Search..." aria-label="Search">
        </form>

        <div class="text-end">
          @guest
          <a href="{{route('users.login')}}" class="btn btn-outline-light me-2">Login</a>
          <a href="{{route('users.register')}}" class="btn btn-warning">Register</a>
          @endguest
          @auth
          <a href="#" class="link-light px-2">{{Auth::user()->name}}</a>
          <a href="{{route('users.logout')}}" class="btn btn-warning">Logout</a>
          @endauth
        </div>
      </div>
    </div>
  </header>