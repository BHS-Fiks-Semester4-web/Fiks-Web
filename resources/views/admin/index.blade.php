@extends('admin.adminmenu')

@section('admincontent')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="container-fluid pt-1 px-3">
            <h2 class="m-0 pb-3">Dashboard</h2>           
        </div>
    </div>

    {{-- Existing Cards --}}
    <div class="row mt-4">
        <div class="col-md-3">
                <a href="{{ route('dashboard.indexDataBarang') }}" class="text-white text-decoration-none">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <div>
                            <h6 class="card-title mb-2">Jumlah Barang</h6>
                            <h5 class="display-6">{{ $jumlahBarang }}</h5>
                        </div>
                        <i class="fas fa-box fa-2x"></i>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-3">
            <a href="{{ url('/dashboard/indexDataKaryawan') }}" class="text-white text-decoration-none">
                <div class="card bg-success text-white mb-4">
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <div>
                            <h6 class="card-title mb-2">Jumlah Karyawan</h6>
                            <h5 class="display-6">{{ $jumlahKaryawan }}</h5>
                        </div>
                        <i class="fas fa-users fa-2x"></i>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-3">
            <a href="{{ url('/dashboard/indexDataAdmin') }}" class="text-white text-decoration-none">
                <div class="card bg-warning text-white mb-4">
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <div>
                            <h6 class="card-title mb-2">Jumlah Admin</h6>
                            <h5 class="display-6">{{ $jumlahAdmin }}</h5>
                        </div>
                        <i class="fas fa-user-shield fa-2x"></i>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-3">
            <a href="{{ url('/dashboard/indexDataPemasok') }}" class="text-white text-decoration-none">
                <div class="card bg-danger text-white mb-4">
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <div>
                            <h6 class="card-title mb-2">Jumlah Supplier</h6>
                            <h5 class="display-6">{{ $jumlahSupplier }}</h5>
                        </div>
                        <i class="fas fa-truck fa-2x"></i>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <h5 class="m-0 pb-3">Barang Diskon</h5>
    {{-- Carousel --}}
    <div id="carouselExample" class="carousel slide mt-4" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach($items->chunk(4) as $chunkIndex => $chunk)
                <div class="carousel-item {{ $chunkIndex == 0 ? 'active' : '' }}">
                    <div class="row">
                        @foreach($chunk as $item)
                            <div class="col-md-3 col-12"> {{-- Change col-md-3 to col-12 --}}
                                <div class="card" style="position: relative; height: 380px;">
                                    <img src="{{ 'data:image/jpeg;base64,' . base64_encode($item->foto_barang) }}" class="card-img-top" alt="{{ $item->nama_barang }}">
                                    <span class="badge bg-danger" style="position: absolute; top: 10px; left: 10px; transition: all 0.3s ease-in-out;">Diskon</span>
                                    <div class="card-body">
                                        <h5 class="card-title" style="text-transform: uppercase;">{{ $item->nama_barang }}</h5>
                                        <p class="card-text text-muted">{{ $item->jenisBarang->nama_jenis_barang }}</p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <p class="card-text">
                                                <span style="color: red; text-decoration: line-through;">Rp.{{ $item->harga_sebelum_diskon_barang }}</span>
                                                <p class="card-text" style="font-weight: bold;">Rp.{{ $item->harga_setelah_diskon_barang }}</p>
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

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const carouselElement = document.querySelector('#carouselExample');
        const carousel = new bootstrap.Carousel(carouselElement, {
            interval: 5000, // Change slide every 5 seconds
            ride: 'carousel'
        });

        // Restart the carousel interval when a manual action occurs
        const restartCarouselInterval = () => {
            carousel.pause();
            carousel.cycle();
        };

        // Add event listeners for manual controls
        document.querySelector('.carousel-control-prev').addEventListener('click', restartCarouselInterval);
        document.querySelector('.carousel-control-next').addEventListener('click', restartCarouselInterval);
    });
</script>
@endsection
