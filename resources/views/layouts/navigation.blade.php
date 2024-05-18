<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
  <div class="container-fluid">
    <a class="navbar-brand app-brand-text demo fw-bolder text-capitalize text-primary" href="{{ url('/') }}">
      TsenaBe
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <!-- Left Side Of Navbar -->
      <ul class="navbar-nav me-auto align-items-center">
        <li class="nav-item">
          <a class="nav-link active pb-0" aria-current="page" href="{{ route('home.index') }}">Nos produits</a>
        </li>
      </ul>

      <!-- Right Side Of Navbar -->
      <ul class="navbar-nav ms-auto align-items-center">
        <!-- Authentication Links -->
        <li class="nav-item me-2">
          <nav-bar-basket></nav-bar-basket>
        </li>
        @guest
        @if (Route::has('login'))
        <li class="nav-item">
          <a class="nav-link pb-0" href="{{ route('login') }}">Se connecter</a>
        </li>
        @endif

        @if (Route::has('register'))
        <li class="nav-item">
          <a class="nav-link pb-0" href="{{ route('register') }}">S'inscrire</a>
        </li>
        @endif
        @else
        <li class="nav-item dropdown">
          <a id="navbarDropdown" class="nav-link pb-0 dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false" v-pre>
            {{ Auth::user()->name }}
          </a>

          <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
            @if (Auth::user()->role->id == 1)
              <a href="/admin/home" class="dropdown-item">Accéder à l'espace administrateur.</a>
            @endif
            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
              Déconnexion
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
            </form>
          </div>
        </li>
        @endguest
      </ul>
    </div>
  </div>
</nav>