<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk</title>
    <link rel="stylesheet" href="{{ asset('css/produk.css') }}">
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
}

.product-card:hover {
    transform: scale(1.05);
}

.product-card .icon {
    font-size: 50px;
    margin-bottom: 10px;
}

</style>
<div class="content" id="product">
<main>
        <section class="intro">
            <h1>Temukan Produk Kebutuhan Anda</h1>
        </section>
        <section class="products">
            <div class="product-card">
                <div class="icon">🖥️</div>
                <h2>Laptop</h2>
                <p>Tersedia Laptop dengan berbagai macam Merek, Tipe dan Spesifikasi yang sesuai dengan kebutuhan anda</p>
            </div>
            <div class="product-card">
                <div class="icon">💻</div>
                <h2>Aksesori</h2>
                <p>Menjual berbagai aksesoris dan komponen seperti keyboard,mouse dan lain lain</p>
            </div>
            <div class="product-card">
                <div class="icon">📹</div>
                <h2>Jasa Service</h2>
                <p>Menyediakan Jasa Service Laptop dan Komputer dengan cepat dan terpercaya</p>
            </div>
           
        </section>
    </main>
</div>
<div style="height: 1000px;"></div>
</body>
</html>
