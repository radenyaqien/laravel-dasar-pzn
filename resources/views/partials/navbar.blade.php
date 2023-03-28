<nav class="navbar navbar-expand-lg navbar-dark bg-danger">
    <div class="container">
        <a class="navbar-brand" href="#">Radenyaqien</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">

                    <a class="nav-link @if ($active == 'home') active @endif" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if ($active == 'about') active @endif" href="/about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if ($active == 'posts') active @endif" href="/blog">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if ($active == 'categories') active @endif"
                        href="/categories">Categories</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">

                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Welcome back, {{ auth()->user()->name }}
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/dashboard">Dashboard</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            <li>
                                <form action="/logout" method="POST">

                                @csrf
                                <button class="dropdown-item" type="submit">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link @if ($active == 'login') active @endif" href="/login"><i
                                class="bi bi-box-arrow-in-right"></i> Login</a>
                    </li>
                @endauth

            </ul>
        </div>
    </div>
</nav>
