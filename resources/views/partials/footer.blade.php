<footer class="footer text-white pt-5 pb-4 bg-dark">
    <div class="container text-center text-md-start mt-5">
        <div class="row mt-3">
            <div class="col-md-4 col-lg-4 col-xl-4 mx-auto mb-4">
                <h6 class="text-uppercase fw-bold">Peusijuek Aceh</h6>
                <hr class="mb-4 mt-0 d-inline-block divider light-green">
                <p>
                    Melestarikan warisan budaya Aceh melalui alat adat dan kesenian tradisional.
                </p>
            </div>

            <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                <h6 class="text-uppercase fw-bold">Menu</h6>
                <hr class="mb-4 mt-0 d-inline-block divider light-green">
                <p><a href="{{ url('/') }}" class="text-white">Beranda</a></p>
                <p><a href="{{ url('/tentang/sejarah') }}" class="text-white">Tentang Peusijuek</a></p>
                <p><a href="{{ url('/produk') }}" class="text-white">Produk Adat</a></p>
                <p><a href="{{ url('/mitra-pengrajin') }}" class="text-white">Gabung Pengrajin</a></p>
            </div>

            <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-4">
                <h6 class="text-uppercase fw-bold">Kontak</h6>
                <hr class="mb-4 mt-0 d-inline-block divider light-green">
                <p><i class="fas fa-home me-3"></i> Aceh, Indonesia</p>
                <p><i class="fas fa-envelope me-3"></i> admin@peusijuek.com</p>
                <p><i class="fas fa-phone me-3"></i> +62 123 456 7890</p>
            </div>
        </div>
    </div>
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        © {{ date('Y') }} Hak Cipta oleh <strong>PeusijuekAceh.id</strong>
    </div>
</footer>