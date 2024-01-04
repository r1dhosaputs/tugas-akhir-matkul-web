<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand fw-bold" href="#">Perpus STMIK</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" aria-current="page"
                        href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('buku') ? 'active' : '' }}" aria-current="page"
                        href="/buku">List
                        Buku</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('anggota') ? 'active' : '' }}" href="/anggota">List Anggota</a>
                </li>
                <li class="nav-item">
                    <a href="/petugas" class="nav-link {{ Request::is('petugas') ? 'active' : '' }}">List Petugas</a>
                </li>

            </ul>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a href="/login" class="btn btn-light btn-sm fw-medium">Login</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
