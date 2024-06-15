@extends('admin.adminmenu')

@section('admincontent')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="container-fluid pt-1 px-3">
            <div class="bg-light rounded-top p-4">
                <div class="row">
                    <a href="/data_pengeluaran" class="btn btn-warning mx-3 my-3 col-sm-3" type="button">Kembali</a>
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
                <h6 class="mb-4">Mengedit Data Pengeluaran</h6>
                <form method="POST" action="/data_pengeluaran/{{ $pengeluaran->id }}">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <label for="nama_pengeluaran" class="form-label">Nama Pengeluaran</label>
                        <input type="text" class="form-control" id="nama_pengeluaran" name="nama_pengeluaran" value="{{ $pengeluaran->nama_pengeluaran }}" autocomplete="off" required>
                    </div>
                    <div class="mb-3">
                        <label for="total_pengeluaran" class="form-label">Total Pengeluaran</label>
                        <input type="text" class="form-control" id="total_pengeluaran" name="total_pengeluaran" value="{{ $pengeluaran->total_pengeluaran }}" autocomplete="off" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection