@extends('admin.adminmenu')

@section('admincontent')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="container-fluid pt-1 px-3">
            <div class="bg-light rounded-top p-4">
                <div class="row">
                    <a href="/data_pemasok" class="btn btn-warning mx-3 my-3 col-sm-3" type="button">Kembali</a>
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
                <h6 class="mb-4">Mengedit Data Pemasok</h6>
                <form method="POST" action="/data_pemasok/{{ $data_supplier->id }}">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <label for="nama_supplier" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama_supplier" name="nama_supplier" value="{{ $data_supplier->nama_supplier }}" autocomplete="off" required>
                    </div>
                    <div class="mb-3">
                        <label for="alamat_supplier" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="alamat_supplier" name="alamat_supplier" value="{{ $data_supplier->alamat_supplier }}" autocomplete="off" required>
                    </div>
                    <div class="mb-3">
                        <label for="no_hp_supplier" class="form-label">Nomor Handphone</label>
                        <input type="text" class="form-control" id="no_hp_supplier" name="no_hp_supplier" value="{{ $data_supplier->no_hp_supplier }}" autocomplete="off" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection