<nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top px-4 py-2 shadow-sm">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">Peusijuek<span>Aceh</span></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link active" href="/">Beranda</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Tentang</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ url('/tentang/sejarah') }}">Sejarah Peusijuek</a></li>
                        <li><a class="dropdown-item" href="{{ url('/tentang/makna-dan-tujuan') }}">Makna & Tujuan Budaya</a></li>
                        <li><a class="dropdown-item" href="{{ url('/tentang/tata-cara-pelaksanaan') }}">Tata Cara Pelaksanaan</a></li>
                    </ul>
                </li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/produk') }}">Produk Adat</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/pengerajin') }}">Pengerajin Lokal</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/artikel') }}">Artikel Budaya</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/kontak') }}">Kontak</a></li>
            </ul>
        </div>
    </div>
</nav>