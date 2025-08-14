<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm border-bottom">
    <div class="container">
        <!-- Logo -->
        <a class="navbar-brand fw-bold text-primary" href="{{ url('/home') }}">
            {{ config('app.name', 'Laravel') }}
        </a>

        <!-- Toggle for mobile -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar Content -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side -->
            <ul class="navbar-nav me-auto">
                <li class="nav-item dropdown">
                    <a class="btn btn-dark dropdown-toggle me-2" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                        Drive
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark">
                        <li><a class="dropdown-item" href="{{ route('drive.add') }}">Add file</a></li>
                        <li><a class="dropdown-item" href="{{ route('drive.showDrive') }}">List Files</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="btn btn-dark me-2" href="/about">About</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-dark me-2" href="/contact">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-dark" href="/blog">Blog</a>
                </li>
            </ul>

            <!-- Right Side -->
            <ul class="navbar-nav ms-auto">
                <!-- Authentication -->
            @auth
                <span class="navbar-brand fw-bold text-primary">{{ Auth::user()->name }}</span>
                <form method="post" action="/logout">
                    @csrf
                    <button type="submit" class="btn btn-dark me-2">Logout</button>
                </form>
            @else
                 <li class="nav-item me-2">
                    <a href="/login" class="btn btn-outline-primary px-3">
                        Login
                    </a>
                    
                </li>
                <li class="nav-item">
                    <a href="/signup" class="btn btn-primary px-3">
                        Sign Up
                    </a>
                </li>
            @endauth
            </ul>
        </div>
    </div>
</nav>
