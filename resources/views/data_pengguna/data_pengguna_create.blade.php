@extends('admin.adminmenu')

@section('admincontent')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="container-fluid pt-1 px-3">
            <div class="bg-light rounded-top p-4">
                <div class="row">
                    <a href="/data_pengguna" class="btn btn-warning mx-3 my-3 col-sm-2" type="button">Kembali</a>
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
                <h6 class="mb-4">Membuat Data Pengguna</h6>
                <form method="POST" action="/data_pengguna" enctype="multipart/form-data">
                    @csrf
                    <div class="row my-2">
                        <div class="col-6 my-2">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="name" name="name" autocomplete="off" oninput="capitalize(this)" required>
                        </div>
                        <div class="col-6 my-2">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" autocomplete="off" oninput="capitalize(this)" required>
                        </div>
                    </div>
                    <div class="row my-2">
                        <div class="col-6 my-2">
                            <label for="agama" class="form-label">Agama</label>
                            <select class="form-select" aria-label="Default select example" id="agama" name="agama">
                                <option value="Islam">Islam</option>
                                <option value="Protestan">Protestan</option>
                                <option value="Katolik">Katolik</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Budha">Budha</option>
                                <option value="Konghucu">Konghucu</option>
                            </select>
                        </div>
                        <div class="col-6 my-2">
                            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" autocomplete="off" required>
                        </div>
                    </div>
                    <div class="row my-2">
                        <div class="col-6 my-2">
                            <label for="no_hp" class="form-label">Nomor Handphone</label>
                            <input type="text" class="form-control" id="no_hp" name="no_hp" autocomplete="off" required>
                        </div>
                        <div class="col-6 my-2">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" autocomplete="off" required>
                        </div>
                    </div>
                    <div class="row my-2">
                        <div class="col-6 my-2">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" autocomplete="off" oninput="capitalize(this)" required>
                        </div>
                        <div class="col-6 my-2">
                            <label for="password" class="form-label">Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="password" name="password" autocomplete="off" required>
                                <button class="btn btn-secondary" type="button" id="togglePassword">
                                    <i id="toggleIcon" class="fa fa-eye"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="row my-2">
                        <div class="col-6 my-2">
                            <label for="role" class="form-label">Peran</label>
                            <select class="form-select" aria-label="Default select example" id="role" name="role">
                                <option value="Karyawan">Karyawan</option>
                                <option value="Admin">Admin</option>
                            </select>
                        </div>
                        <div class="col-6 my-2">
                            <label for="foto" class="form-label">Foto</label>
                            <input type="file" class="form-control" id="foto" name="foto" autocomplete="off" required>
                        </div>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
