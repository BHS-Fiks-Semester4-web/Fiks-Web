<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <link rel="shortcut icon" href="{{ asset('image/logo.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* .home_content_right {
            margin-left: 250px;
        }
        .home_content_left {
            margin-left: 80px;
        } */
        .slider {
            position: relative;
            max-width: 100%;
            margin: auto;
            overflow: hidden;
            display: flex;
            align-items: center;
        }
        .slides {
            display: flex;
            transition: transform 0.5s ease-in-out;
            width: 300%; /* Assuming there are 3 slides */
        }
        .slide {
            min-width: 100%;
            box-sizing: border-box;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .slide img {
            width: 100%;
            height: auto;
        }
        .dots {
            text-align: center;
            padding: 10px;
            margin-top: 0px;
        }
        .dot {
            cursor: pointer;
            height: 15px;
            width: 15px;
            margin: 0 2px;
            background-color: #bbb;
            border-radius: 50%;
            display: inline-block;
            transition: background-color 0.6s ease;
        }
        .active, .dot:hover {
            background-color: #717171;
        }
        .dots-container {
            text-align: center;
            padding: 10px 0;
            position: absolute;
            bottom: 15px;
            width: 100%;
        }

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
</head>
<body>

@include('navbar')

@include('home') <!-- Memuat konten halaman home -->
@include('discount') <!-- Memuat konten halaman diskon -->
@include('product') <!-- Memuat konten halaman produk -->
@include('contact') <!-- Memuat konten halaman kontak -->

<button onclick="scrollToTop()" id="scrollToTopBtn" title="Go to top">
    <img src="{{ asset('image/up.png') }}" class="img_scroll_to_top">
</button>

<script src="{{ asset('js/script.js') }}"></script>
<script>
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
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
</body>
</html>
