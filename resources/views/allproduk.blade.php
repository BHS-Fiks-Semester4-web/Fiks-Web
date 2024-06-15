<!DOCTYPE html>
<html>
<head>
    
    <title>Hasil Pencarian</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h1 {
            text-align: center;
        }
        .containerr {
            margin-top: 0px;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
        }
        .card {
            border: 1px solid #ddd;
            border-radius: 4px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            width: 200px;
            overflow: hidden;
            text-align: center;
            padding: 10px;
            background-color: #fff;
            display: grid;
            grid-template-rows: 150px 1fr;
            gap: 10px;
        }
        .card img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .card input {
            width: 100%;
            padding: 5px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
    </style>
</head>

<body>
@include('navbar2')
    <h1>Semua Produk</h1>
        <div class="containerr">
            @foreach($barangs as $result)
                <div class="card">
                    <img src="{{ 'data:image/jpeg;base64,' . base64_encode($result->foto_barang) }}" alt="{{ $result->nama_barang }}">
                    <input type="text" value="Nama Barang: {{ $result->nama_barang }}" readonly>
                    <input type="text" value="Stok Barang: {{ $result->stok_barang }}" readonly>
                    <input type="text" value="Harga: Rp {{ $result->harga_sebelum_diskon_barang }}" readonly>
                </div>
            @endforeach
        </div>
   
</body>
</html>
