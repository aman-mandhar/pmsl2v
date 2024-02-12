<nav class="navbar">
  <div class="nav-logo">
    <a href="{{ url('/') }}">
      <img src="{{ asset('assets/user/images/logo.png') }}" alt="Logo">
    </a>
  </div>

  <div class="nav-search">
    <select class="select-search">
      <option>All</option>
      <option value="Packet">Daily Need</option>
      <!-- Other options -->
    </select>
    <input type="text" placeholder="Search" class="search-input">
    <div class="search-icon">
      <span class="material-symbols-outlined">search</span>
    </div>
  </div>

  <div class="banner">
    <ul class="links">
      <li>
        @guest
          @if (Route::has('login'))
            <a href="{{ route('login') }}">Login</a>
          @endif
        @else
          <a href="#">{{ Auth::user()->city }}</a>
        @endguest
      </li>
    </ul>
  </div>

  <div class="banner">
    <div>
      @guest
        @if (Route::has('register'))
          <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
        @endif
      @else
        <p>Hello, {{ Auth::user()->name }}</p>
      @endguest
    </div>
  </div>

  <div class="banner">
    <div>
      <a class="dropdown-item" href="{{ route('logout') }}"
         onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        {{ __('Logout') }}
      </a>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
      </form>
    </div> 
  </div>

  <div class="banner">
    <a href="#"><p>Orders</p></a>
  </div>

  <div class="banner">
    <a href="#">
      <i class="fa fa-shopping-cart"></i>
    </a>
    <p>Cart</p>
  </div>
</nav>

<div class="banner">
  <div class="banner-content">
    <div class="panel">
      <span class="material-symbols-outlined">menu</span>
      <a href="#">All</a>
    </div>

    <ul class="links">
      <li><a href="#">Today's Deals</a></li>
      <!-- Other list items -->
    </ul>

    <div class="deals">
      <a href="#">Recycle Units</a>
    </div>
  </div>
</div>
