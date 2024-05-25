@extends('admin.adminmenu')

@section('admincontent')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="container-fluid pt-1 px-3">
            <h3 class="m-0 pb-3">Data Jenis Barang</h3>
            <div class="bg-light rounded-top p-4">
                <div class="row">
                    <a href="/data_jenis_barang/create" class="btn btn-primary mx-3 my-3 col-sm-2" type="button">Membuat</a>
                    <a href="/data_jenis_barang_truncate" class="btn btn-danger mx-3 my-3 col-sm-2" type="button" onclick="return confirm('Apakah kamu yakin ?')">Hapus Semua</a>
                </div>
            </div>
        </div>
        @if (session()->has('delete') || session()->has('create') || session()->has('update'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fa fa-exclamation-circle me-2"></i>
                {{ session('delete') }}
                {{ session('create') }}
                {{ session('update') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="col-md-6">
            <form action="/data_jenis_barang">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Masukan Nama Jenis Barang..." name="search" autocomplete="off">
                    <button class="btn btn-primary" type="submit">Search</button>
                </div>
            </form>
        </div>
        <div class="col-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Data Jenis Barang</h6>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Foto</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data_jenis_barangs as $item)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $item->nama_jenis_barang }}</td>
                                    <td>
                                        <img class="bd-placeholder-img" src="data:image/jpeg;base64,{{ base64_encode($item->foto) }}" width="40" height="40">
                                    </td>
                                    <td>
                                        <a href="/data_jenis_barang/{{ $item->id }}/edit" type="button" style="margin-right: 10px; color: #454444;"><i class="fas fa-pencil-alt me-2"></i></a>
                                        <form action="/data_jenis_barang/{{ $item->id }}" method="post" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button onclick="return confirm('Apakah kamu yakin ?')" style="background: none; border: none; padding: 0; color: #454444; cursor: pointer;">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer clearfix">
                    <ul class="pagination pagination-sm m-0 justify-content-center">
                        <li class="page-item">
                            {{ $data_jenis_barangs->links() }}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection