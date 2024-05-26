<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <style>
        .home_content_right {
            margin-left: 250px;
        }
        .home_content_left {
            margin-left: 80px;
        }
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
    </style>
</head>
<body>

@include('navbar')

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
<div style="height: 1000px;"></div>

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

</body>
</html>
