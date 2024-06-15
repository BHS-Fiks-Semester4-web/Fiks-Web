<!-- @extends('main')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barang Diskon</title>
     Bootstrap CSS -->
    
    <!-- <style>
        .container-fluid {
            max-width: 900px; /* Atur ukuran maksimal container */
            margin: auto; /* Tengah halaman */
            padding: 0 15px; /* Tambahkan padding agar tidak terlalu rapat */
        }
        .card-title {
            font-size: 1rem; /* Atur ukuran font judul */
        }
        .card-text {
            font-size: 0.875rem; /* Atur ukuran font teks */
        }
    </style>
</head>
<body> -->
<div class="discount" id="Discount">
        <h5 class="m-0 pb-2">Barang Diskon</h5>
        <div id="carouselExample" class="carousel slide mt-2" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach($items->chunk(4) as $chunkIndex => $chunk)
                    <div class="carousel-item {{ $chunkIndex == 0 ? 'active' : '' }}">
                        <div class="row">
                            @foreach($chunk as $item)
                                <div class="col-md-3 col-12">
                                    <div class="card h-100" style="position: relative;">
                                        <img src="{{ 'data:image/jpeg;base64,' . base64_encode($item->foto_barang) }}" class="card-img-top h-100 w-100" alt="{{ $item->nama_barang }}">
                                        <span class="badge bg-danger" style="position: absolute; top: 10px; left: 10px; transition: all 0.3s ease-in-out;">Diskon</span>
                                        <div class="card-body">
                                            <h5 class="card-title" style="text-transform: uppercase;">{{ $item->nama_barang }}</h5>
                                            <p class="card-text text-muted">{{ $item->jenisBarang->nama_jenis_barang }}</p>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <p class="card-text">
                                                    <span style="color: red; text-decoration: line-through;">Rp.{{ $item->harga_sebelum_diskon_barang }}</span>
                                                    <span class="card-text" style="font-weight: bold;">Rp.{{ $item->harga_setelah_diskon_barang }}</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>                   
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    
<!-- </body>
</html> -->
