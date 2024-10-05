<nav class="navbar navbar-expand-lg bg-body-tertiary shadow shadow-md">
    <div class="container-fluid list-inline">
        <a class="navbar-brand text-decoration-underline fst-italic" href="{{route('homepage')}}">The Aulab Post</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('article.index') }}">Tutti gli articoli</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('careers') }}">Lavora con noi</a>
                </li>

            </ul>
            @auth


                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('article.create') }}">Inserisci un articolo</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ route('article.index') }}">Tutti gli
                            articoli</a>
                    </li>


                    <li class="dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Ciao {{ Auth::user()->name }}
                        </a>

                        <ul class="dropdown-menu">
                            @if (Auth::user()->is_admin)
                                <li><a class="dropdown-item" href="{{ route('admin.dashboard') }}">Dashboard Admin</a></li>
                            @endif

                            @if (Auth::user()->is_revisor)
                                <li><a class="dropdown-item" href="{{ route('revisor.dashboard') }}">Dashboard Revisor</a>
                                </li>
                            @endif

                            @if (Auth::user()->is_writer)
                                <li><a class="dropdown-item" href="{{ route('writer.dashboard') }}">Dashboard Writer</a>
                                </li>
                            @endif
                            <li>
                                <form action="{{ route('logout') }}" method="POST" id="form-logout">
                                    @csrf
                                    
                                    <a class="dropdown-item" href="#"
                                        onclick="event.preventDefault(); document.querySelector('#form-logout').submit();">Logout</a>
                                </form>
                            </li>
                        </ul>
                    </li>
                @endauth
                @guest
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Benvenuto ospite
                        </a>
                        <ul class="dropdown-menu">

                            <li><a class="dropdown-item" href="{{ route('login') }}">Accedi</a></li>
                            <li><a class="dropdown-item" href="{{ route('register') }}">Registrati</a></li>

                        </ul>
                    </li>


                @endguest










                <form action="{{ route('article.search') }}" method="GET" class="d-flex ms-2" role="search">
                    <input class="form-control me-2" type="search" name="query"
                        placeholder="Cerca tra gli articoli..." aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Cerca</button>
                </form>
            </ul>

        </div>
    </div>
</nav>
