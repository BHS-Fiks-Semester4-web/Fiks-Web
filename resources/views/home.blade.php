<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    
</head>
<body>

@include('navbar') -->

<div class="content" id="home">
    <div class="row_home">
        <div class="home_content_left">
            <h1>AKHWAT COMPUTER</h1>
            <p>Menyediakan berbagai model laptop, Aksesoris dan Jasa service terpercaya.</p>
            <a href="#" class="btn_home">Lihat semua produk</a>
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
</div>

<!-- 


</body>
</html> -->
