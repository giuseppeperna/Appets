<!-- ======= Header ======= -->
<header id="header" class="fixed-top d-flex align-items-center header-transparent">
   <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
      <div class="logo me-auto">
         <h1><a href="{{route('home')}}">Appets</a></h1>
      </div>
      <nav id="navbar" class="navbar order-last order-lg-0" :class="{'navbar-mobile': showMenu}">
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
         <i class="bi bi-list mobile-nav-toggle" @click="showMenuMobile()" :class="{'bi-list': !showMenu, 'bi-toggle': showMenu}"></i>
      </nav>
      <!-- .navbar -->
   </div>
</header>
