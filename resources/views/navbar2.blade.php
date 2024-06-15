<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Document</title>
</head>
<body>
    <style>
            
    </style>
<nav class="navbar">
    <div class="container">
        <div class="logo">
            <a href="#home"><img src="/image/logo1x2.png" alt="Logo Akhwat Computer Jember"></a>
        </div>
        <ul class="menu">
            <li><a href="{{ route('home') }}" style="font-weight: bold">Home</a></li>
            <li><a href="{{ route('allproduct') }}">Produk</a></li>
            
            <li><a href="{{ route('contact') }}">Kontak</a></li>
        </ul>
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
</nav>

</body>
</html>
