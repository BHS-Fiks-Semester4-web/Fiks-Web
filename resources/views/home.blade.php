<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

@include('navbar')


<div class="content" id="home">
    <div class="row_home">
        <div class="home_content_left">
            <h1>AKHWAT COMPUTER</h1>
            <p>Jelajahi berbagai model laptop, komputer, printer, dan perangkat lainnya untuk menemukan yang terbaik untuk Anda.</p>
            <a href="#" class="btn_home">Lihat semua produk</a>
        </div>
        <div class="home_content_right">
            <img src="{{ asset('image/imageonhome.png') }}" alt="">
        </div>
    </div>
</div>
<div style="height: 1000px;"></div>
</body>
</html>
