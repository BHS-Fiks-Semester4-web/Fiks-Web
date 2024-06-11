@extends('admin.adminmenu')

@section('admincontent')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="container-fluid pt-1 px-3">
            <h3 class="m-0 pb-3">Data Pengguna</h3>
            <div class="bg-light rounded-top p-4">
                <div class="row">
                    <a href="/data_pengguna/create" class="btn btn-primary mx-3 my-3 col-sm-2" type="button">Membuat</a>
                    <a href="/data_pengguna_truncate" class="btn btn-danger mx-3 my-3 col-sm-2" type="button" onclick="return confirm('Apakah kamu yakin ?')">Hapus Semua</a>
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
            <form action="#">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Masukan Nama Pengguna..." name="search" autocomplete="off">
                    <button class="btn btn-primary" type="submit">Search</button>
                </div>
            </form>
        </div>
        <div class="col-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Data Pengguna</h6>
                @if ($data_penggunas && $data_penggunas->count() > 0)
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">Nomor Handphone</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data_penggunas as $item)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->alamat }}</td>
                                        <td>{{ $item->no_hp }}</td>
                                        <td>{{ $item->role }}</td>
                                        <td>
                                            <a href="/data_pengguna/{{ $item->id }}" type="button" style="margin-right: 10px; color: #454444;"><i class="fas fa-info-circle me-2"></i></a>
                                            @if ($item->role === 'admin')
                                                <a href="{{ route('data_pengguna.toggleRole', $item->id) }}" type="button" style="margin-right: 10px; color: #454444;"><i class="fas fa-exchange-alt me-2"></i></a>
                                            @elseif ($item->role === 'karyawan')
                                                <a href="{{ route('data_pengguna.toggleRole', $item->id) }}" type="button" style="margin-right: 10px; color: #454444;"><i class="fas fa-exchange-alt me-2"></i></a>
                                            @endif
                                            <form action="/data_pengguna/{{ $item->id }}" method="post" class="d-inline">
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
                <div class="card-footer clearfix">
                    <ul class="pagination pagination-sm m-0 justify-content-center">
                        <li class="page-item">
                            {{ $data_penggunas->links() }}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection