@extends('admin.adminmenu')

@section('admincontent')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="container-fluid pt-1 px-3">
            <div class="bg-light rounded-top p-4">
                <div class="row">
                    <a href="/data_pemasok" class="btn btn-warning mx-3 my-3 col-sm-2" type="button">Kembali</a>
                    
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
                <h6 class="mb-4">Membuat Data Pemasok</h6>
                <form method="POST" action="/data_pemasok">
                    @csrf
                    <div class="mb-3">
                        <label for="nama_pemasok" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama_pemasok" name="nama_supplier" autocomplete="off" oninput="capitalize(this)" required>
                    </div>
                    <div class="mb-3">
                        <label for="alamat_pemasok" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="alamat_pemasok" name="alamat_supplier" autocomplete="off" oninput="capitalize(this)" required>
                    </div>
                    <div class="mb-3">
                        <label for="nomor_handphone_pemasok" class="form-label">Nomor Handphone</label>
                        <input type="text" class="form-control" id="nomor_handphone_pemasok" name="no_hp_supplier" autocomplete="off" required>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection