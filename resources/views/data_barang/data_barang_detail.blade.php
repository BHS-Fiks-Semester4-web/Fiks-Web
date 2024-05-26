@extends('admin.adminmenu')

@section('admincontent')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        @if (session()->has('message'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fa fa-exclamation-circle me-2"></i>
                {{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session()->has('add') || session()->has('update'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fa fa-exclamation-circle me-2"></i>
                {{ session('add') }}
                {{ session('update') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="col-sm-12 col-xl-12">
            <div class="bg-light rounded h-100 p-4">
                <div class="row">
                    <a href="/data_barang" class="btn btn-warning mx-3 my-3 col-sm-2" type="button">Kembali</a>
                    <a href="/data_barang/{{ $data_barang->id }}/edit" class="btn btn-info mx-3 my-3 col-sm-2" type="button">Edit Barang</a>
                </div>
                <div class="row justify-content-center text-center">
                    <div class="col-md-12 my-3">
                        @if ($data_barang->foto_barang)
                            <img class="bd-placeholder-img" src="data:image/jpeg;base64,{{ base64_encode($data_barang->foto_barang) }}" width="200" height="200">
                        @else
                            <img class="bd-placeholder-img" src="/admins/img/profile.png" width="200" height="200">
                        @endif
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-12 text-start">
                        <div class="my-2">
                            <label for="nama_barang" class="form-label">Nama Barang</label>
                            <input type="text" class="form-control" id="nama_barang" value="{{ $data_barang->nama_barang }}" readonly>
                        </div>
                    </div>
                    <div class="col-12 text-start">
                        <div class="my-2">
                            <label for="harga_barang" class="form-label">Harga Barang</label>
                            @if ($data_barang->harga_setelah_diskon_barang)
                                <td>
                                    <input type="text" class="form-control" id="harga_barang" value="{{ $data_barang->harga_setelah_diskon_barang }}" readonly>
                                </td>
                            @else
                                <td>
                                    <input type="text" class="form-control" id="harga_barang" value="{{ $data_barang->harga_sebelum_diskon_barang }}" readonly>
                                </td>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-12 text-start">
                        <div class="my-2">
                            <label for="jenis_barang" class="form-label">Jenis Barang</label>
                            <input type="text" class="form-control" id="jenis_barang" value="{{ $data_barang->jenisBarang->nama_jenis_barang }}" readonly>
                        </div>
                    </div>
                    <div class="col-12 text-start">
                        <div class="my-2">
                            <label for="supplier_barang" class="form-label">Pemasok</label>
                            <input type="text" class="form-control" id="supplier_barang" value="{{ $data_barang->supplier->nama_supplier }}" readonly>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-12 text-start">
                        <div class="my-2">
                            <label for="stok_barang" class="form-label">Stok Barang</label>
                            <input type="text" class="form-control" id="stok_barang" value="{{ $data_barang->stok_barang }}" readonly>
                        </div>
                    </div>
                    <div class="col-12 text-start">
                        <div class="my-2">
                            <label for="diskon_barang" class="form-label">Diskon</label>
                            @if ($data_barang->diskon_barang)
                                <input type="text" class="form-control" id="diskon_barang" value="{{ $data_barang->diskon_barang }}" readonly>
                            @else
                                <input type="text" class="form-control" id="diskon_barang" value="-" readonly>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-12 text-start">
                        <div class="my-2">
                            <label for="exp_diskon_barang" class="form-label">Expired Diskon</label>
                            @if ($data_barang->exp_diskon_barang)
                                <input type="text" class="form-control" id="exp_diskon_barang" value="{{ $data_barang->exp_diskon_barang }}" readonly>
                            @else
                                <input type="text" class="form-control" id="exp_diskon_barang" value="-" readonly>
                            @endif
                        </div>
                    </div>
                    <div class="col-12 text-start">
                        <div class="my-2">
                            <label for="garansi_barang" class="form-label">Garansi Barang</label>
                            @if ($data_barang->garansi_barang)
                                <input type="text" class="form-control" id="garansi_barang" value="{{ $data_barang->garansi_barang }}" readonly>
                            @else
                            <input type="text" class="form-control" id="garansi_barang" value="-" readonly>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-12 text-start">
                        <div class="my-2">
                            <label for="deskripsi_barang" class="form-label">Deskripsi Barang</label>
                            <textarea name="deskripsi_barang" id="deskripsi_barang" rows="10" class="form-control" readonly>{{ $data_barang->deskripsi_barang }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection