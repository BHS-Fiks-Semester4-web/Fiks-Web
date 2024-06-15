<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk</title>
    <link rel="stylesheet" href="{{ asset('css/produk.css') }}">
    
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <style>
        /* Animasi fade-in saat halaman dimuat */
        body {
            opacity: 0;
            transition: opacity 0.5s ease;
        }
        
        body.loaded {
            opacity: 1;
        }
    </style>
</head>
<body>

@include('navbar')
<style>

</style> -->
<div class="content" id="product">
<main>
    <section class="intro">
        <h1>Temukan Produk Kebutuhan Anda</h1>
    </section>
    <section data-aos="fade-up" data-aos-duration="3000" class="products">
        <div class="product-card" id="laptop" onclick="showPopup('laptop')">
            <div class="icon">🖥️</div>
            <h2>Laptop</h2>
            <p>Tersedia Laptop dengan berbagai macam Merek, Tipe dan Spesifikasi yang sesuai dengan kebutuhan anda</p>
        </div>
        <div class="product-card" id="aksesori" onclick="showPopup('aksesori')">
            <div class="icon">💻</div>
            <h2>Aksesori</h2>
            <p>Menjual berbagai aksesoris dan komponen seperti keyboard, mouse dan lain-lain</p>
        </div>
        <div class="product-card" id="service" onclick="showPopup('service')">
            <div class="icon">📹</div>
            <h2>Jasa Service</h2>
            <p>Menyediakan Jasa Service Laptop dan Komputer dengan cepat dan terpercaya</p>
        </div>
    </section>
</main>
</div>
<!-- 
<div style="height: 1000px;"></div> -->
<div id="popup" class="popup">
    <div class="popup-content">
        <span class="close" onclick="hidePopup()">&times;</span>
        <img id="popup-image" src="" alt="Product Image">
        <h2 id="popup-title"></h2>
        <p id="popup-description"></p>
        <p id="popup-price"></p>
        @foreach($itemss->chunk(4) as $chunkIndex => $chunk)
                    <div class="carousel-item {{ $chunkIndex == 0 ? 'active' : '' }}">
                        <div class="row">
                            @foreach($chunk as $item)
                                <div class="col-md-3 col-12">
                                    <div class="card h-100" style="position: relative;">
                                        <img src="{{ 'data:image/jpeg;base64,' . base64_encode($item->foto_barang) }}" class="card-img-top" alt="{{ $item->nama_barang }}">
                                        <span class="badge bg-danger" style="position: absolute; top: 10px; left: 10px; transition: all 0.3s ease-in-out;">Diskon</span>
                                        <div class="card-body">
                                            <h5 class="card-title" style="text-transform: uppercase;">{{ $item->nama_barang }}</h5>
                                            <p class="card-text text-muted">{{ $item->jenisBarang->nama_jenis_barang }}</p>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <p class="card-text">
                                                    <span style="color: red; text-decoration: line-through;">Rp.{{ $item->harga_sebelum_diskon_barang }}</span>
                                                    <span class="card-text" style="font-weight: bold;">Rp.{{ $item->harga_setelah_diskon_barang }}</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>                   
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
    </div>
</div>