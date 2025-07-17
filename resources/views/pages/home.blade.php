@extends('layouts.app')
@section('title', 'Beranda - Peusijuek Aceh')

@section('content')
<!-- Hero Section -->
<section id="hero" class="hero section light-background">
    <div class="container">
        <div class="row gy-4 justify-content-center justify-content-lg-between align-items-center">
            <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
                <h1 data-aos="fade-up">Melestarikan Budaya Aceh</h1>
                <p data-aos="fade-up" data-aos-delay="100">
                    Edukasi budaya Aceh, rangkaian peusijuek, dan koleksi alat adat khas Aceh. 
                    Dukung pengrajin lokal dan lestarikan seni Aceh untuk generasi mendatang.
                </p>
                <div class="d-flex flex-wrap gap-3" data-aos="fade-up" data-aos-delay="200">
                    <a href="/produk" class="btn-get-started">Lihat Produk Adat</a>
                    <a href="/tentang/sejarah" class="btn-watch-video d-flex align-items-center">
                        <i class="bi bi-book-half"></i>
                        <span>Pelajari Peusijuek</span>
                    </a>
                    <a href="/mitra-pengrajin" class="btn-watch-video d-flex align-items-center">
                        <i class="bi bi-person-rolodex"></i>
                        <span>Gabung Sebagai Pengrajin</span>
                    </a>
                </div>
            </div>
            <div class="col-lg-6 order-1 order-lg-2 text-center" data-aos="zoom-out">
                <img src="{{ asset('assets/images/peusijuek-hero.jpg') }}" class="img-fluid animated" alt="Peusijuek - Budaya Aceh">
            </div>
        </div>
    </div>
</section>

<!-- About Section -->
<section id="about" class="about section">
    <div class="container section-title" data-aos="fade-up">
        <h2>Tentang Kami</h2>
        <p><span>Belajar Lebih</span> <span class="description-title">Tentang Budaya Aceh</span></p>
    </div>

    <div class="container" data-aos="fade-up">
        <div class="row gy-4">
            <div class="col-lg-7" data-aos="fade-up" data-aos-delay="100">
                <img src="{{ asset('assets/images/about.jpg') }}" class="img-fluid mb-4" alt="">
                <div class="book-a-table">
                    <h3>Jelajahi Produk Adat</h3>
                    <p>+62 1234 5678 90</p>
                </div>
            </div>
            <div class="col-lg-5" data-aos="fade-up" data-aos-delay="250">
                <div class="content ps-0 ps-lg-5">
                    <p class="fst-italic">
                        Budaya Aceh adalah warisan kekayaan spiritual dan seni yang telah dilestarikan selama berabad-abad. 
                        Salah satu simbol penting dari budaya Aceh adalah *peusijuek*, sebuah rangkaian simbolis yang digunakan dalam acara-adat seperti perkawinan dan kenduri.
                    </p>
                    <ul>
                        <li><i class="bi bi-check-circle-fill"></i> <span>*Peusijuek* merupakan representasi nilai-nilai spiritual Aceh.</span></li>
                        <li><i class="bi bi-check-circle-fill"></i> <span>Dibuat secara manual oleh para pengerajin lokal yang ahli dalam seni tradisional Aceh.</span></li>
                        <li><i class="bi bi-check-circle-fill"></i> <span>Kami melestarikan budaya Aceh melalui pendidikan, penjualan produk adat, dan dukungan kepada pengerajin lokal.</span></li>
                    </ul>
                    <p>
                        Dengan membeli produk adat Aceh, Anda tidak hanya mendukung warisan budaya Aceh, tetapi juga membantu meningkatkan ekonomi masyarakat setempat.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection