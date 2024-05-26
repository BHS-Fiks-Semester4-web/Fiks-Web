<!DOCTYPE html>
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
    main {
    text-align: center;
    padding: 50px 20px;
}

.intro h1 {
    margin-bottom: 30px;
}

.products {
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    gap: 20px;
}

.product-card {
    background-color: #8F003C;
    color: white;
    padding: 20px;
    border-radius: 10px;
    width: 200px;
    text-align: center;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    transition: transform 0.2s;
    cursor: pointer;
}

.product-card:hover {
    transform: scale(1.05);
}

.product-card .icon {
    font-size: 50px;
    margin-bottom: 10px;
}

.popup {
    display: none;
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: white;
    padding: 20px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    z-index: 1000;
}

.popup-content {
    text-align: left;
}

.popup-content img {
    max-width: 50px;
    height: auto;
    margin-bottom: 20px;
}

.close {
    position: absolute;
    top: 10px;
    right: 10px;
    font-size: 20px;
    cursor: pointer;
}
</style>
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

<div style="height: 1000px;"></div>
<div id="popup" class="popup">
    <div class="popup-content">
        <span class="close" onclick="hidePopup()">&times;</span>
        <img id="popup-image" src="" alt="Product Image">
        <h2 id="popup-title"></h2>
        <p id="popup-description"></p>
        <p id="popup-price"></p>
    </div>
</div>

<script>
    // Menambahkan class 'loaded' pada elemen body setelah halaman dimuat
    window.addEventListener('load', function() {
        document.body.classList.add('loaded');
    });

    function showPopup(productName) {
        var title, description, price, imageUrl;

        // Mendapatkan informasi produk berdasarkan nama produk
        if (productName === 'laptop') {
            title = 'Laptop';
            description = 'Deskripsi produk Laptop. Lorem ipsum dolor sit amet, consectetur adipiscing elit.';
            price = '$500.00';
            imageUrl = 'image/foto1.png'; // Ganti dengan URL gambar yang sesuai
        } else if (productName === 'aksesori') {
            title = 'Aksesori';
            description = 'Deskripsi produk Aksesori. Menjual berbagai aksesoris dan komponen seperti keyboard, mouse, dan lain-lain.';
            price = '$50.00';
            imageUrl = 'path/to/aksesori-image.jpg'; // Ganti dengan URL gambar yang sesuai
        } else if (productName === 'service') {
            title = 'Jasa Service';
            description = 'Deskripsi produk Jasa Service. Menyediakan Jasa Service Laptop dan Komputer dengan cepat dan terpercaya.';
            price = '$30.00';
            imageUrl = 'path/to/service-image.jpg'; // Ganti dengan URL gambar yang sesuai
        }

        // Menampilkan popup dengan informasi produk
        document.getElementById('popup-title').innerHTML = title;
        document.getElementById('popup-description').innerHTML = description;
        document.getElementById('popup-price').innerHTML = price;
        document.getElementById('popup-image').src = imageUrl;
        document.getElementById('popup').style.display = 'block';
    }

    function hidePopup() {
        document.getElementById('popup').style.display = 'none';
    }
</script>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init();
</script>
</body>
</html>
