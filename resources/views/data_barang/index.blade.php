@extends('admin.adminmenu')

@section('admincontent')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="container-fluid pt-1 px-3">
            <h3 class="m-0 pb-3">Data Barang</h3>
            <div class="bg-light rounded-top p-4">
                <div class="row">
                    <a href="/data_barang/create" class="btn btn-primary mx-3 my-3 col-sm-2" type="button">Membuat</a>
                    <a href="/data_barang_truncate" class="btn btn-danger mx-3 my-3 col-sm-2" type="button" onclick="return confirm('Apakah kamu yakin ?')">Hapus Semua</a>
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
        <form action="/data_barang/">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Masukan Nama Barang..." name="search" autocomplete="off">
                <button class="btn btn-primary" type="submit">Search</button>
            </div>
        </form>
    </div>
    <div class="col-12">
        <div class="bg-light rounded h-100 p-4">
            <h6 class="mb-4">Data Barang</h6>
            <div class="table-responsive mt-3">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Stok</th>
                            <th scope="col">Garansi</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($barangs as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->harga_setelah_diskon_barang }}</td>
                                <td>{{ $item->stok_barang }}</td>
                                <td>{{ $item->garansi_barang }}</td>
                                <td>
                                    <a href="/data_barang/{{ $item->id }}" class="btn btn-info border-0 mx-2 my-1" type="button">Detail</a>
                                    <a href="/data_barang/{{ $item->id }}/edit" class="btn btn-info border-0 mx-2 my-1" type="button">Edit</a>
                                    <form action="/data_barang/{{ $item->id }}" method="post" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-danger border-0 mx-2 my-1" onclick="return confirm('Apakah kamu yakin ?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @if (request('search'))
            @else
                <div class="card-footer clearfix">
                    <ul class="pagination pagination-sm m-0 justify-content-center">
                        <li class="page-item">
                            {{ $barangs->links() }}
                        </li>
                    </ul>
                </div>
            @endif
        </div>
    </div>
    </div>
</div>
@endsection

{{-- 
if(diskon tidak diisi){

    tanggal exp diskon tidak aktif
}else{
    tanggal exp diskon aktif
}
--}}