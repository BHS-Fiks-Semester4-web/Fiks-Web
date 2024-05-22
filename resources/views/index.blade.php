<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <link rel="shortcut icon" href="{{ asset('image/logo.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
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

</body>
</html>
