<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>

    <button class="navbar-toggle" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggle-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{route('homepage')}}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('article.index')}}">Tutti gli articoli</a>
        </li>

        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{route('careers')}}">Lavora con noi</a>
        </li>
        
       
        <li class="nav-item">
          <a class="nav-link disabled" aria-disabled="true">Disabled</a>
        </li>
      </ul>
      @auth 


  <li class="nav-item">
      <li>  <a class="nav-link" href="{{route('article.create')}}">Inserisci un articolo</a></li>
       </li>
      @if (Auth::user()->is_admin)
              <li><a class="dropdown-item" href="{{route('admin.dashbord')}}">Dashbord Admin</a></li>
              @endif 
      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="{{route('article.index')}}">Tutti gli articoli</a>
      </li>

      

    

     <li class="nav-item dropdown">
      <a class="nav-link dropdown-toogle" href="#" role="button" data-bs-toogle="dropdown" aria-expanded="false">
      Ciao {{ Auth::user()->name}}
      </a>
      <ul class="dropdown-menu">
        <li>
          <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.queryselector('#form-logout').submit();">Logout</a>
        </li>
        <form action="{{route('logout')}}" method="POST" id="form-logout" class="d-none">
          @csrf 
        </form>

      </ul>

     </li>
     @endauth
     @guest 
     <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Benvenuto ospite
          </a>
          <ul class="dropdown-menu">
          
            <li><a class="dropdown-item" href="{{route('login')}}">Accedi</a></li>
            <li><a class="dropdown-item" href="{{route('register')}}">Registrati</a></li>
         
          </ul>
        </li>
       
     
       @endguest










      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
