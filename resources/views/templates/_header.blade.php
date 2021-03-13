<!-- ======= Header ======= -->
<header id="header" class="fixed-top d-flex align-items-center header-transparent">
   <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
      <div class="logo me-auto">
         <h1><a href="{{route('home')}}">Appets</a></h1>
      </div>

      {{-- Navbar con links Desktop  --}}
      <nav id="navbar" class="navbar order-last order-lg-0" >
         <ul>
            <li><a class="nav-link scrollto" href="{{route('home')}}/#restaurants">Ristoranti</a></li>
            <li><a class="nav-link scrollto" href="{{route('home')}}/#jobs">Lavora con Appets</a></li>
            @if(Auth::check())
            <li><a class="nav-link" href="{{route('dashboard')}}">Dashboard</a></li>
            <li><a class="nav-link scrollto" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
             {{ __('Logout') }}
            </a></li>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
            @else
            <li><a class="nav-link" href="{{route('accesso')}}">Area ristoranti</a></li>
            @endif
            <li><a class="nav-link" href="{{route('cart.index')}}">Carrello<i class="fas fa-shopping-cart"></i></a></li>
         </ul> 
      </nav>

      {{-- Navbar dropdown con links Mobile --}}
      <div class="dropdown hamburger-dropdown">
         <i class="bi bi-list mobile-nav-toggle" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"></i>
         <ul class="dropdown-menu hamburger-dropdown-menu" aria-labelledby="dropdownMenuButton1">
            <li><a class="nav-link scrollto" href="{{route('home')}}/#restaurants">Ristoranti</a></li>
            <li><a class="nav-link scrollto" href="{{route('home')}}/#jobs">Lavora con Appets</a></li>
            @if(Auth::check())
            <li><a class="nav-link" href="{{route('dashboard')}}">Dashboard</a></li>
            <li><a class="nav-link scrollto" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
             {{ __('Logout') }}
            </a></li>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
            @else
            <li><a class="nav-link" href="{{route('accesso')}}">Area ristoranti</a></li>
            @endif
            <li><a class="nav-link" href="{{route('cart.index')}}">Carrello<i class="fas fa-shopping-cart"></i></a></li>
         </ul>
       </div>
      <!-- .navbar -->
   </div>
</header>
