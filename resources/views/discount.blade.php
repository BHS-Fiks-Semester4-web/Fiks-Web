<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Discount Page</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .slider-container {
            position: relative;
            max-width: 100%;
            margin: auto;
            overflow: hidden;
        }
        .slides {
            display: flex;
            transition: transform 0.5s ease-in-out;
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
        .arrow {
            cursor: pointer;
            position: absolute;
            top: 50%;
            width: 30px;
            height: 30px;
            margin-top: -15px;
            border-radius: 50%;
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            text-align: center;
            line-height: 30px;
            font-size: 18px;
            z-index: 10;
        }
        .prev {
            left: 10px;
        }
        .next {
            right: 10px;
        }
        .dots-container {
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
        .product-card {
            width: 300px;
            padding: 15px;
            border: 1px solid #ddd;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin: 10px;
            text-align: center;
        }
        .product-card img {
            max-width: 100%;
            height: auto;
        }
        .discount-label {
            background-color: red;
            color: white;
            padding: 5px;
            position: absolute;
            top: 10px;
            left: 10px;
        }
        .product-price {
            color: #000;
            font-weight: bold;
        }
        .old-price {
            color: #888;
            text-decoration: line-through;
        }
        .btn-detail {
            display: inline-block;
            padding: 10px 20px;
            background-color: black;
            color: white;
            text-decoration: none;
            margin-top: 10px;
        }
    </style>
</head>
<body>

<div class="slider-container">
    <div class="slides">
        <div class="slide">
            <div class="product-card">
                <div class="discount-label">Discount</div>
                <img src="{{ asset('image/foto1.png') }}" alt="Product 1">
                <h3>LAPTOP SECOND DELL LATITUDE 5420</h3>
                <p>LAPTOP SECOND</p>
                <p class="product-price">RP. 5.800.000 <span class="old-price">RP. 6.100.000</span></p>
                <a href="#" class="btn-detail">LIHAT DETAIL ➔</a>
            </div>
        </div>
        <div class="slide">
            <div class="product-card">
                <div class="discount-label">Discount</div>
                <img src="{{ asset('image/foto4.png') }}" alt="Product 2">
                <h3>LAPTOP SECOND LENOVO A485</h3>
                <p>LAPTOP SECOND</p>
                <p class="product-price">RP. 4.250.000 <span class="old-price">RP. 4.800.000</span></p>
                <a href="#" class="btn-detail">LIHAT DETAIL ➔</a>
            </div>
        </div>
        <div class="slide">
            <div class="product-card">
                <div class="discount-label">Discount</div>
                <img src="{{ asset('image/service.png') }}" alt="Product 3">
                <h3>PROJECTOR EPSON EB-E500</h3>
                <p>PROJECTOR</p>
                <p class="product-price">RP. 5.700.000 <span class="old-price">RP. 5.950.000</span></p>
                <a href="#" class="btn-detail">LIHAT DETAIL ➔</a>
            </div>
        </div>
    </div>
    <div class="arrow prev" onclick="changeSlide(-1)">&#10094;</div>
    <div class="arrow next" onclick="changeSlide(1)">&#10095;</div>
</div>
<div class="dots-container">
    <span class="dot" onclick="currentSlide(1)"></span>
    <span class="dot" onclick="currentSlide(2)"></span>
    <span class="dot" onclick="currentSlide(3)"></span>
</div>

<script>
    let slideIndex = 0;
    const slides = document.querySelector('.slides');
    const dots = document.querySelectorAll('.dot');
    const totalSlides = dots.length;

    function showSlides(n) {
        slideIndex += n;
        if (slideIndex >= totalSlides) {
            slideIndex = 0;
        } else if (slideIndex < 0) {
            slideIndex = totalSlides - 1;
        }
        updateSlides();
    }

    function currentSlide(n) {
        slideIndex = n - 1;
        updateSlides();
    }

    function updateSlides() {
        const offset = slideIndex * -100;
        slides.style.transform = 'translateX(' + offset + '%)';
        dots.forEach(dot => dot.classList.remove('active'));
        dots[slideIndex].classList.add('active');
    }

    document.querySelector('.prev').addEventListener('click', () => showSlides(-1));
    document.querySelector('.next').addEventListener('click', () => showSlides(1));

    // Initialize
    updateSlides();
</script>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init();
</script>

</body>
</html> -->
