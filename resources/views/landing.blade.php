<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Akwhat Computer</title>
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
                <li><a href="#service">Jasa</a></li>
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
                    <div class="dots-container">
                    <div class="dots">
                            <span class="dot" onclick="currentSlide(1)"></span>
                            <span class="dot" onclick="currentSlide(2)"></span>
                            <span class="dot" onclick="currentSlide(3)"></span>
                    </div>
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
                    <div class="card"data-id="{{ $item->id }}">
                        <img src="{{ 'data:image/jpeg;base64,' . base64_encode($item->foto_barang) }}" class="card-img" alt="{{ $item->nama_barang }}">
                        <div class="discount-label">Diskon</div>
                        <h1>{{ $item->nama_barang }}</h1>
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
            <div class="intro" id="kategori-id"><h1>Temukan Produk Kebutuhan Anda</h1></div>
            <div data-aos="fade-up" data-aos-duration="3000" class="products">
                <div class="product-card" id="laptop" onclick="fetchProducts(1)">
                    <div class="icon">💻</div>
                    <h2>Laptop</h2>
                    <p>Menjual laptop dari berbagai macam model, merek, dan jenis yang berbeda, termasuk ultrabook, gaming laptop, dan laptop bisnis, dengan spesifikasi dan harga yang beragam sesuai kebutuhan Anda</p>
                </div>
                <div class="product-card" id="computer" onclick="fetchProducts(2)">
                    <div class="icon">🖥️</div>
                    <h2>Computer</h2>
                    <p>Menjual komputer beserta komponen dari berbagai macam model, merek, dan jenis yang berbeda, termasuk desktop, workstation, dan komputer all-in-one, dengan berbagai konfigurasi untuk memenuhi kebutuhan pekerjaan dan hiburan Anda</p>
                </div>
                <div class="product-card" id="cctv" onclick="fetchProducts(3)">
                    <div class="icon">📹</div>
                    <h2>CCTV</h2>
                    <p>Menjual CCTV dan sistem pengawasan dari berbagai macam model, merek, dan jenis yang berbeda, termasuk kamera indoor, outdoor, dan sistem DVR/NVR, untuk keamanan rumah dan bisnis Anda</p>
                </div>
                <div class="product-card" id="lainnya" onclick="fetchProducts(4)">
                    <div class="icon">🔌</div>
                    <h2>Perangkat Lainnya</h2>
                    <p>Menjual berbagai perangkat teknologi lainnya dari berbagai macam model, merek, dan jenis yang berbeda, termasuk printer, scanner, router, dan aksesori komputer untuk melengkapi kebutuhan teknologi Anda</p>
                </div>
            </div>
        </div>
    </section>
    <section id="service">
        <div class="main">
            <div class="intro" id="kategori-id"><h1>Menyediakan Juga Jasa Service</h1></div>
            <div data-aos="zoom-in" data-aos-duration="300" class="products">
                <div class="product-card">
                    <div class="icon">💻</div>
                    <h2>Service Laptop</h2>
                    <p>Menawarkan jasa perbaikan dan pemeliharaan laptop dari berbagai macam model, merek, dan jenis yang berbeda. Termasuk perbaikan hardware, instalasi software, peningkatan performa, dan layanan pembersihan.</p>
                </div>
                <div class="product-card">
                    <div class="icon">🖥️</div>
                    <h2>Service Computer</h2>
                    <p>Menawarkan jasa perbaikan dan pemeliharaan komputer beserta komponen dari berbagai macam model, merek, dan jenis yang berbeda. Termasuk perbaikan hardware, instalasi software, peningkatan komponen, dan perawatan rutin.</p>
                </div>
                <div class="product-card" >
                    <div class="icon">📹</div>
                    <h2>Service CCTV</h2>
                    <p>Menawarkan jasa instalasi, perbaikan, dan pemeliharaan CCTV dari berbagai macam model, merek, dan jenis yang berbeda. Termasuk pemasangan kamera, konfigurasi sistem pengawasan, dan perbaikan perangkat rekaman.</p>
                </div>
                <div class="product-card">
                    <div class="icon">🔌</div>
                    <h2>Service Lainnya</h2>
                    <p>Menawarkan jasa perbaikan dan pemeliharaan untuk berbagai perangkat teknologi lainnya dari berbagai macam model, merek, dan jenis yang berbeda. Termasuk service printer, scanner, router, dan berbagai aksesori teknologi.</p>
                </div>
            </div>
        </div>
    </section>
    <div id="popup" class="popup">
        <div class="popup-content">
            <span class="closee" onclick="closePopupp()">&times;</span>
            <h2 id="popup-title">Produk</h2>
            <div id="popup-description"></div>
        </div>
    </div>
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
    <div id="productDetailModal" class="modal">
        <div class="modal-content">
            <div class="atas">
                <p id="modalNamaBarang"></p>
                <span class="close">&times;</span>
            </div>
            <div class="tengah">
                  <img id="modalImg" src="data:image/jpeg;base64," alt="Gambar Produk" />
                    
                  <p id="modalDeskripsi"></p>
            </div>
            <div class="harga">
                <p id="modalHarga"></p>
                <p id="modalHargaa"></p>
            </div>
            
        </div>
    </div>
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
<script>
        // document.addEventListener('DOMContentLoaded', (event) => {
            const modal = document.getElementById("productDetailModal");
            const modalImg = document.getElementById("modalImg");
            const modalNamaBarang = document.getElementById("modalNamaBarang");
            const modalDeskripsi = document.getElementById("modalDeskripsi");
            const modalHarga = document.getElementById("modalHarga");
            const modalHargaa = document.getElementById("modalHargaa");
            const closeModal = document.getElementsByClassName("close")[0];
            function formatRupiah(number) {
             return new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(number);
                }

            document.querySelectorAll('.card').forEach(button => {
                button.addEventListener('click', function (event) {
                    event.preventDefault();
                    const card = this.closest('.card');
                    const productId = card.getAttribute('data-id');

                    fetch(`/product-detaildisc/${productId}`)
                        .then(response => response.json())
                        .then(data => {
                            
                            modalImg.src = "data:image/jpeg;base64," + data.foto_barang; // data.foto_barang berisi string base64 dari gambar

                            modalNamaBarang.innerHTML = `${data.nama_barang}`;
                            modalDeskripsi.innerHTML = `<h1>Spesifikasi:</h1></b> <br> ${data.deskripsi_barang}`;
                            modalHarga.innerHTML = `Harga:  ${formatRupiah(data.harga_sebelum_diskon_barang)}`;
                            modalHargaa.innerHTML = `Harga:  ${formatRupiah(data.harga_setelah_diskon_barang)}`;
                            modal.style.display = "flex";
                        })
                        .catch(error => {
                            console.error('Error fetching product details:', error);
                        });
                });
            });

            closeModal.onclick = function () {
                modal.style.display = "none";
            }

            window.onclick = function (event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }
        // });
    </script>
     <script>
        async function fetchProducts(id_jenis_barang) {
            try {
                const response = await fetch(`/products/${id_jenis_barang}`);
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                const products = await response.json();
                showPopup(products);
            } catch (error) {
                console.error('Error fetching products:', error);
            }
        }
        function formatRupiah(number) {
             return new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(number);
                }

        function showPopup(products) {
            const popup = document.getElementById('popup');
            const description = document.getElementById('popup-description');

            description.innerHTML = '';
            products.forEach(product => {
                const productElement = document.createElement('div');
                productElement.classList.add('product-element');
                productElement.innerHTML = `
                    <img class="item" src="data:image/jpeg;base64,${product.foto_barang}" />
                    <h3 class="item" maxlength="10">${product.nama_barang}</h3>
                    <h4 class="item">${formatRupiah(product.harga_setelah_diskon_barang)}</h4>
                    `;
                description.appendChild(productElement);
            });

            popup.style.display = 'block';
        }

        function closePopupp() {
            const popup = document.getElementById('popup');
            popup.style.display = 'none';
        }
    </script>

</html>