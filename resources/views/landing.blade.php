@extends('layouts.app')

@section('title', 'Kopi Ulee Kareng')

@section('content')
    <header class="navbar">
        <div class="container nav-inner">
            <a class="brand" href="#beranda">Kopi Ulee Kareng</a>
            <nav>
                <a href="#tentang">Tentang</a>
                <a href="#keunggulan">Keunggulan</a>
                <a href="#product">Product</a>
                <a href="#kontak">Kontak</a>
                <a class="btn btn-small" href="{{ route('product.index') }}">
                    Kelola Product
                </a>
            </nav>
        </div>
    </header>

    <main>
        <section id="beranda" class="hero">
            <div class="container hero-grid">
                <div>
                    <span class="eyebrow">Cita rasa khas Aceh</span>
                    <h1>Hangatnya budaya dalam secangkir kopi.</h1>
                    <p>
                        Kenali Kopi Ulee Kareng melalui pilihan products
                        yang diracik untuk pecinta kopi Nusantara.
                    </p> <a class="btn" href="#product">Lihat Product</a>
                </div>
                <div class="hero-card">
                    <p>Aroma kuat</p>
                    <p>Rasa autentik</p>
                    <p>Warisan budaya Aceh</p>
                </div>
            </div>
        </section>

        <section id="tentang" class="section">
            <div class="container narrow">
                <span class="eyebrow">Tentang</span>
                <h2>Kopi dari ruang temu masyarakat Aceh</h2>
                <p>
                    Ulee Kareng dikenal sebagai salah satu kawasan kopi
                    di Banda Aceh. Landing page ini memperkenalkan products
                    secara informatif dan sederhana.
                </p>
            </div>
        </section>

        <section id="keunggulan" class="section section-soft">
            <div class="container">
                <span class="eyebrow">Keunggulan</span>
                <div class="features">
                    <article>
                        <h3>Aroma</h3>
                        <p>Karakter wangi yang kuat.</p>
                    </article>
                    <article>
                        <h3>Rasa</h3>
                        <p>Cita rasa pekat dan khas.</p>
                    </article>
                    <article>
                        <h3>Budaya</h3>
                        <p>Bagian dari tradisi berkumpul.</p>
                    </article>
                </div>
            </div>
        </section>

        <section id="product" class="section">
            <div class="container">
                <span class="eyebrow">Product</span>
                <h2>Pilihan Kopi Ulee Kareng</h2>
                <div class="product-grid">
                    @forelse ($products as $product)
                                <article class="product-card">
                                    <img src="{{ asset('storage/' . ($product->gambar
                        ?: 'kopi-default.png')) }}" alt="{{ $product->nama_product }}">
                                    <div class="product-body">
                                        <h3>{{ $product->nama_product }}</h3>
                                        <p>{{ $product->deskripsi }}</p>
                                        <strong>
                                            Rp{{ number_format($product->harga, '0', ',', '.') }}
                                        </strong>
                                    </div>
                                </article>
                    @empty
                        <div class="empty-state">
                            Belum ada products. Silakan kelola data products.
                        </div>
                    @endforelse
                </div>
            </div>
        </section>

        <section id="kontak" class="section contact">
            <div class="container">
                <span class="eyebrow">Kontak</span>
                <h2>Kunjungi Ulee Kareng, Banda Aceh</h2>
                <p>Telepon: 08xx-xxxx-xxxx • Instagram: @kopiuleekareng</p>
            </div>
        </section>
    </main>
    <footer class="footer">
        <div class="container">
            <p>&copy; {{ date('Y') }} Kopi Ulee Kareng.</p>
        </div>
    </footer>
@endsection