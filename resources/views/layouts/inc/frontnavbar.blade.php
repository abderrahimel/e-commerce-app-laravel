<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand" href="{{ url('/') }}">E-Shop</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav ms-auto mx-6">
          @auth
              
              <li class="nav-item">
                <a class="nav-link active"  href="/">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('category') }}">Category</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('cart') }}">Cart</a>
              </li>
              {{--  --}}
              <li class="nav-item mx-3">
                <div class="dropdown">
                  <button class="dropdown-toggle border-0 bg-light" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="material-icons">person</i>
                  </button>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" href="#">Settings</a></li>
                    <li><a class="dropdown-item" href="{{ url('my-orders') }}">My Orders</a></li>
                    <li><a class="dropdown-item" href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();"
                      >{{ __('Logout') }}</a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                          @csrf
                      </form></li>
                  </ul>
                </div>
              </li>
          @else
              <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">Login</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">Register</a>
              </li>
          @endauth
          
        </ul>
      </div>
    </div>
  </nav>