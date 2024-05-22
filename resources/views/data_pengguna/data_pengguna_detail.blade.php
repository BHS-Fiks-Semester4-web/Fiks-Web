@extends('admin.adminmenu')

@section('admincontent')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="container-fluid pt-1 px-3">
            <div class="bg-light rounded-top p-4">
                <div class="row">
                    <h2>{{ $data_pengguna->name }}</h2>
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
                    <a href="/data_pengguna" class="btn btn-warning mx-3 my-3 col-sm-2" type="button">Kembali</a>
                    <a href="/data_pengguna/{{ $data_pengguna->id }}/edit" class="btn btn-info mx-3 my-3 col-sm-2" type="button">Edit Profile</a>
                </div>
                <div class="row">
                    <div class="col-md-2 mx-3 my-3">
                        @if ($data_pengguna->foto)
                            <img class="rounded-circle" src="data:image/jpeg;base64,{{ base64_encode($data_pengguna->foto) }}" width="150" height="150">
                        @else
                            <img class="rounded-circle" src="/admins/img/profile.png" width="150" height="150">
                        @endif
                    </div>
                    <div class="md-9 mx-3">
                        
                            <div class="col-6 my-2">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" value="{{ $data_pengguna->username }}" readonly>
                            </div>
                        
                            <div class="col-6 my-2">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control" id="email" value="{{ $data_pengguna->email }}" readonly>
                            </div>
                        
                            <div class="col-6 my-2">
                                <label for="alamat" class="form-label">Alamat</label>
                                <input type="text" class="form-control" id="alamat" value="{{ $data_pengguna->alamat }}" readonly>
                            </div>
                        
                            <div class="col-6 my-2">
                                <label for="no_hp" class="form-label">Nomor Handphone</label>
                                <input type="text" class="form-control" id="no_hp" value="{{ $data_pengguna->no_hp }}" readonly>
                            </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection