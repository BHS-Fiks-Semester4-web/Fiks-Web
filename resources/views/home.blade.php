<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        .home_content_right{
            margin-left: 250px; 
        }
        .home_content_left{
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
            width: 300%;
        }
        .slides img {
            width: auto;
            height: 100%;
            display: none; /* Initially hide all images */
        }
        .dots {
            text-align: center;
            padding: 10px;
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
                    <img src="{{ asset('image/foto1.png') }}" alt="Image 1">
                    <img src="{{ asset('image/foto4.png') }}" alt="Image 2">
                    <img src="{{ asset('image/service.png') }}" alt="Image 3">
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
    showSlides();

    function showSlides() {
        let slides = document.querySelectorAll('.slides img');
        let dots = document.querySelectorAll('.dot');
        for (let i = 0; i < slides.length; i++) {
            slides[i].style.display = "none"; // Hide all images initially
        }
        slideIndex++;
        if (slideIndex > slides.length) {
            slideIndex = 1;
        }
        for (let i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex - 1].style.display = "block"; // Show the current image
        dots[slideIndex - 1].className += " active";
        setTimeout(showSlides, 3000); // Change image every 3 seconds
    }

    function currentSlide(n) {
        showSlides(slideIndex = n);
    }
</script>

</body>
</html>
