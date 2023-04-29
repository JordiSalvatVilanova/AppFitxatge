<nav class="navbar navbar-expand-lg navbar-light" id="barraNavegacio">
    <div class="container">
        <a class="navbar-brand">
            <img src="{{ asset('img/logo.png') }}" alt="Logo">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"> 
                    <a class="nav-link paginaActual barra-baja" href="{{ route("inici") }}">Inici</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link lletraNav-transition" href="{{ route("calendari") }}">Calendari</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link lletraNav-transition" href="{{ route("fitxatge") }}">Fitxatge</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link estilNav">
                        {{ Auth::user()->name }}
                    </a>
                </li>

                <button href="{{ route('logout') }}" >Sortir</button>

            </ul>
        </div>
    </div>
</nav>