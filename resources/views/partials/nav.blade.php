<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand fw-bold" href="#">Blog</a>

        <button class="navbar-toggler" type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNav"
            aria-controls="navbarNav"
            aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('inici')}}">Inici</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('posts.index')}}">Posts</a>
                </li>
            @auth
                <li class="nav-item">
                    <a class="nav-link" href="{{route('posts.create')}}">Crear Post</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}">Logout</a>
                </li>
            @endauth
                
            @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{route('login')}}">Login</a>
                </li> 
            @endguest
                 
                
            </ul>
        </div>
    </div>
</nav>
<div class="bg-light py-2">
    <div class="container text-end text-muted small">
        <?= fechaActual("d/m/Y") ?>
    </div>
</div>
