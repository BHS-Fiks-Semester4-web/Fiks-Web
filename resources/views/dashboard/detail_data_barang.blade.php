@extends('admin.adminmenu')

@section('admincontent')
<div class="container-fluid pt-4 px-4">
    <div class="row">
        <div class="col-md-12">
            <div class="d-flex justify-content-between align-items-center">
                <h2 class="m-0">Data Barang</h2>
                <button type="button" class="btn-close" aria-label="Close" onclick="window.history.back()"></button>
            </div>
            <hr>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('dashboard.indexDataBarang') }}" method="GET" class="mb-4">
                <div class="input-group">
                    <input type="text" class="form-control" name="search" placeholder="Cari barang...">
                    <button class="btn btn-primary" type="submit">Cari</button>
                </div>
            </form>
        </div>
    </div>

    <div class="row">
        @foreach($data_barangs as $barang)
        <div class="col-md-3 mb-4">
            <div class="card">
                <img src="{{ 'data:image/jpeg;base64,' . base64_encode($barang->foto_barang) }}" class="card-img-top" alt="{{ $barang->nama_barang }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $barang->nama_barang }}</h5>
                    <p class="card-text">{{ $barang->jenisBarang->nama_jenis_barang }}</p>
                    <p class="card-text"><strong>Rp. {{ $barang->harga_setelah_diskon_barang }}</strong></p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
