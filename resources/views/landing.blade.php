<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/landing.css') }}">
    
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
</head>
<body>
    <header>
        <div class="container">
            <div class="logo">
        <a href="#home"><img src="/image/logo1x2.png" alt="Logo Akhwat Computer Jember"></a>
        </div>
        <div class="nav">
            <ul>
                <li><a href="#home">Home</a></li>
                <li><a href="#product">Produk</a></li>
                <li><a href="#contact">Kontak</a></li>
            </ul>
        </div>
        <div class="search">
        <form action="{{ route('search.index') }}" method="GET" class="search_form_nav">
                <div class="search_input_container">
                    <input type="text" name="query" placeholder="Telusuri...">
                    <button type="submit" class="btn_search_img_nav">
                        <img src="/image/search.png">
                    </button>
                </div>

            </form>
        </div>
        </div>
        
    </header>
    <section id="home">
        <div class="row_home">
            <div class="home_content_left">
                <h1>AKHWAT COMPUTER</h1>
                <p>Menyediakan berbagai model laptop, Aksesoris dan Jasa service terpercaya.</p>
                <a href="{{ route('allproduct') }}" class="btn_home">Lihat semua produk</a>
            </div>
            <div class="home_content_right">
                <div class="slider">
                    <div class="slides">
                         <div class="slide"><img src="{{ asset('image/foto1.png') }}" alt="Image 1"></div>
                         <div class="slide"><img src="{{ asset('image/foto4.png') }}" alt="Image 2"></div>
                         <div class="slide"><img src="{{ asset('image/service.png') }}" alt="Image 3"></div>
                    </div>
                </div>
                <div class="dots-container">
                    <div class="dots">
                            <span class="dot" onclick="currentSlide(1)"></span>
                            <span class="dot" onclick="currentSlide(2)"></span>
                            <span class="dot" onclick="currentSlide(3)"></span>
                    </div>
                </div>
            </div>
        </div>
    </section>
<section id="Discount">
    <h5>Diskon Barang</h5>
    <div class="containerr">
        @foreach($items->chunk(5) as $chunkIndex => $chunk)
            <div class="card-item{{ $chunkIndex == 0 ? ' active' : '' }}">
                @foreach($chunk as $item)
                    <div class="card">
                        <img src="{{ 'data:image/jpeg;base64,' . base64_encode($item->foto_barang) }}" class="card-img" alt="{{ $item->nama_barang }}">
                        <span>Diskon</span>
                        <h1 >{{ $item->nama_barang }}</h1>
                        <div class="card-kategori">{{ $item->jenisBarang->nama_jenis_barang }}</div>
                        <div class="card-isi">
                            <span class="isi">Rp{{ number_format($item->harga_sebelum_diskon_barang, 0, ',', '.') }}</span>
                            <div class="card-hargaa">Rp{{ number_format($item->harga_setelah_diskon_barang, 0, ',', '.') }}</div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden"></span>
            </button>
    </div>


    
</section>

    <section id="product">
        <div class="main">
            <div class="intro"><h1>Temukan Produk Kebutuhan Anda</h1></div>
            <div data-aos="fade-up" data-aos-duration="3000" class="products">
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
            </div>
           
        </div>
    </section>
    <section id="contact">
        <div class="row_contact">
            <div class="contact_title">
                <h1>Kontak</h1>
            </div>
            <div class="contact_content">
                <div class="contact_content_left">
                        <div class="address left">
                             <img src="{{ asset('image/location.png') }}" alt="">
                            <a href="https://www.google.com/maps?q=-8.1586185,113.7153305" target="blank">Jl. Mastrip, Dusun Krajan Timur, Desa Sumbersari, Kecamatan Sumbersari, Kabupaten Jember, Provinsi Jawa Timur</a>
                        </div>
                        <div class="whatsapp left">
                            <img src="{{ asset('image/whatsapp.png') }}" alt="">
                            <a href="https://web.whatsapp.com/send?phone=6281230489704" target="blank">+6281230489704</a>
                        </div>
                        <div class="email left">
                            <img src="{{ asset('image/mail.png') }}" alt="">
                            <a href="https://mail.google.com/mail/u/0/?view=cm&tf=1&fs=1&to=akhwatkomputer@gmail.com" target="blank">akhwatkomputer@gmail.com</a>
                        </div>
                    </div>
                <div class="contact_content_right">
                    <div class="instagram right">
                        <img src="{{ asset('image/instagram.png') }}" alt="">
                        <a href="https://www.instagram.com/akhwat.computer/" target="blank">akhwat.computer</a>
                    </div>
                    <div class="facebook right">
                        <img src="{{ asset('image/facebook.png') }}" alt="">
                         <a href="https://www.facebook.com/akhwat.comp.7" target="blank">Akhwat Comp Mastrip Jember</a>
                    </div>
                    <div class="tiktok right">
                    <img src="{{ asset('image/tiktok.png') }}" alt="">
                    <a href="https://www.tiktok.com/@akhwatcompmastripjem" target="blank">akhwatcompmastripjem</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

<script>
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
      anchor.addEventListener('click', function (e) {
        e.preventDefault();
        document.querySelector(this.getAttribute('href')).scrollIntoView({
          behavior: 'smooth'
        });
      });
    });

     let slideIndex = 0;
    let slides = document.querySelector('.slides');
    let dots = document.querySelectorAll('.dot');
    let totalSlides = dots.length;

    function showSlides() {
        for (let i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slideIndex++;
        if (slideIndex > totalSlides) {
            slideIndex = 1;
        }
        let offset = (slideIndex - 1) * -100;
        slides.style.transform = 'translateX(' + offset + '%)';
        dots[slideIndex - 1].className += " active";
        setTimeout(showSlides, 3000); // Change image every 3 seconds
    }

    function currentSlide(n) {
        slideIndex = n;
        let offset = (n - 1) * -100;
        slides.style.transform = 'translateX(' + offset + '%)';
        for (let i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        dots[n - 1].className += " active";
    }

    showSlides();
</script>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
 
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
 <script>
    document.addEventListener('DOMContentLoaded', (event) => {
        let currentChunkIndex = 0;
        const cardItems = document.querySelectorAll('.card-item');
        const totalChunks = cardItems.length;

        function showChunk(index) {
            cardItems.forEach((item, i) => {
                if (i === index) {
                    item.classList.add('active');
                } else {
                    item.classList.remove('active');
                }
            });
        }

        document.querySelector('.carousel-control-prev').addEventListener('click', () => {
            currentChunkIndex = (currentChunkIndex > 0) ? currentChunkIndex - 1 : totalChunks - 1;
            showChunk(currentChunkIndex);
        });

        document.querySelector('.carousel-control-next').addEventListener('click', () => {
            currentChunkIndex = (currentChunkIndex < totalChunks - 1) ? currentChunkIndex + 1 : 0;
            showChunk(currentChunkIndex);
        });

        showChunk(currentChunkIndex); // Show the initial chunk
    });
</script>

</html>