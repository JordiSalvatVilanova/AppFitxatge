<nav class="navbar navbar-expand-lg navbar-light" id="barraNavegacio">
    <div class="container">
        <a class="navbar-brand">
            <img src="{{ asset('img/logo.png') }}" alt="Logo">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link paginaActual barra-baja" href="{{ route('fitxadmin') }}">Fitxatge</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link lletraNav-transition" href="{{ route('afegir') }}">Afegir</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link lletraNav-transition" href="{{ route('graficos') }}">Graficos</a>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link lletraNav-transition" href="{{ route('reports') }}">Reports</a>
                </li> --}}
                <li class="nav-item">
                    @auth
                    <li class="nav-item">
                        <a class="nav-link estilNav">
                            {{ Auth::user()->name }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a class="nav-link lletraNav-transition" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Sortir') }}
                            </a>
                        </form>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Log in') }}</a>
                    </li>
                @endauth

            </ul>
        </div>
    </div>
</nav>
