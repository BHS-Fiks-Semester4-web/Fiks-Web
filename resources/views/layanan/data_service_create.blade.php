@extends('admin.adminmenu')

@section('admincontent')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="container-fluid pt-1 px-3">
            <div class="bg-light rounded-top p-4">
                <div class="row">
                    <a href="/data_jenis_barang" class="btn btn-warning mx-3 my-3 col-sm-2" type="button">Kembali</a>
                </div>
            </div>
        </div>
        @if (session()->has('message'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fa fa-exclamation-circle me-2"></i>
                {{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="col-sm-12 col-xl-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Membuat Data Jenis Barang</h6>
                <form method="POST" action="/data_jenis_barang" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="nama_jenis_barang" class="form-label">Nama Jenis Barang</label>
                        <input type="text" class="form-control" id="nama_jenis_barang" name="nama_jenis_barang" autocomplete="off" oninput="capitalize(this)" required>
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi_jenis_barang" class="form-label">Deskripsi Jenis Barang</label>
                        <textarea name="deskripsi_jenis_barang" id="deskripsi_jenis_barang" cols="50" rows="10" class="form-control"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="foto" class="form-label">Foto</label>
                        <input type="file" class="form-control" id="foto" name="foto" autocomplete="off" required>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection