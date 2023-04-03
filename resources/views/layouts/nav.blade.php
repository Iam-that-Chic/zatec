<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <a href="#" class="navbar-brand">ZATEC</a>
        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse2">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse2">
            <div class="navbar-nav">
                <a href="{{ url('/') }}" class="nav-item nav-link {{ request()->routeIs('home') ? 'active' : '' }}">Dashboard</a>     
                <div class="nav-item dropdown">
                  <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Favorites</a>
                  <div class="dropdown-menu">
                      <a href="{{ route('favartists') }}" class="dropdown-item {{ request()->routeIs('favartists') ? 'active' : '' }}">Artists</a>
                      <a href="{{ route('favalbums') }}" class="dropdown-item {{ request()->routeIs('favalbums') ? 'active' : '' }}">Albums</a>
                  </div>
                </div>
                <a href="{{ url('/') }}" class="nav-item nav-link {{ request()->routeIs('search') ? 'active' : '' }}" >Search</a>
            </div>
            @if (Auth::check())
                   <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="route('logout')" class="nav-item nav-link btn-danger"
                        onclick="event.preventDefault();
                                this.closest('form').submit();">
                                <span>Log Out</span>
                   </a>
                </form>  
                @endif
        </div>

    </div>        
  </nav>