<nav class="navbar navbar-expand-lg navbar-dark bg-dark" rounded>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbar">

      <ul class="navbar-nav mr-auto">
        
        <li class="nav-item {{ $current == "home" ? 'active' : '' }}">
          <a class="nav-link" href="{{ route('home') }}">Home</a>
        </li>

        <li class="nav-item {{ $current == "categorias" ? 'active' : '' }}">
          <a class="nav-link" href="{{ route('categorias') }}">Categorias</a>
        </li>
        
        <li class="nav-item {{ $current == "produtos" ? 'active' : '' }}">
           <a class="nav-link" href="{{ route('produtos') }}">Produtos</a>
        </li>

      </ul>      
    </div>
  </nav>