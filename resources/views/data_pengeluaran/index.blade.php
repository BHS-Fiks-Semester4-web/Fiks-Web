@extends('admin.adminmenu')

@section('admincontent')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="container-fluid pt-1 px-3">
            <h3 class="m-0 pb-3">Data Pengeluaran</h3>
            <div class="bg-light rounded-top p-4">
                <div class="row">
                    <a href="/data_pengeluaran/create" class="btn btn-primary mx-3 my-3 col-sm-2" type="button">Membuat</a>
                    <a href="/data_pengeluaran_truncate" class="btn btn-danger mx-3 my-3 col-sm-2" type="button" onclick="return confirm('Apakah kamu yakin ?')">Hapus Semua</a>
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
        <form action="/data_pengeluaran/">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Masukan Nama Pengeluaran..." name="search" autocomplete="off">
                <button class="btn btn-primary" type="submit">Search</button>
            </div>
        </form>
    </div>
    <div class="col-12">
        <div class="bg-light rounded h-100 p-4">
            <h6 class="mb-4">Data Pengeluaran</h6>
            @if ($data_pengeluarans && $data_pengeluarans->count() > 0)
                <div class="table-responsive mt-3">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nama Pengeluaran</th>
                                <th scope="col">Total Pengeluaran</th>
                                <th scope="col">Tanggal Masuk</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data_pengeluarans as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->nama_pengeluaran }}</td>
                                    <td>{{ $item->total_pengeluaran }}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>
                                        <a href="/data_pengeluaran/{{ $item->id }}/edit" type="button" style="margin-right: 10px; color: #454444;"><i class="fas fa-pencil-alt me-2"></i></a>
                                        <form action="/data_pengeluaran/{{ $item->id }}" method="post" class="d-inline">
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
            @else
                <p class="text-center">Tidak ada</p>
            @endif
            @if (request('search'))
            @else
                <div class="card-footer clearfix">
                    <ul class="pagination pagination-sm m-0 justify-content-center">
                        <li class="page-item">
                            {{ $data_pengeluarans->links() }}
                        </li>
                    </ul>
                </div>
            @endif
        </div>
    </div>
    </div>
</div>
@endsection
