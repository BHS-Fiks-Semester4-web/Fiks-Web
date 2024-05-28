@extends('admin.adminmenu')

@section('admincontent')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="container-fluid pt-1 px-3">
            <div class="bg-light rounded-top p-4">
                <div class="row">
                    <a href="/data_pengguna/{{ $data_pengguna->id }}" class="btn btn-warning mx-3 my-3 col-sm-2" type="button">Kembali</a>
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
                <h6 class="mb-4">Mengedit Data Pengguna</h6>
                <form method="POST" action="/data_pengguna/{{ $data_pengguna->id }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row my-2">
                        <div class="col-12 col-md-6 my-2">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $data_pengguna->name }}" autocomplete="off" required>
                        </div>
                        <div class="col-12 col-md-6 my-2">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $data_pengguna->alamat }}" autocomplete="off" required>
                        </div>
                    </div>
                    <div class="row my-2">
                        <div class="col-12 col-md-6 my-2">
                            <label for="agama" class="form-label">Agama</label>
                            <select class="form-select" aria-label="Default select example" id="agama" name="agama">
                                <option value="Islam" @if ('Islam' == $data_pengguna->agama) {{ 'selected' }} @endif>Islam</option>
                                <option value="Protestan" @if ('Protestan' == $data_pengguna->agama) {{ 'selected' }} @endif>Protestan</option>
                                <option value="Katolik" @if ('Katolik' == $data_pengguna->agama) {{ 'selected' }} @endif>Katolik</option>
                                <option value="Hindu" @if ('Hindu' == $data_pengguna->agama) {{ 'selected' }} @endif>Hindu</option>
                                <option value="Budha" @if ('Budha' == $data_pengguna->agama) {{ 'selected' }} @endif>Budha</option>
                                <option value="Konghucu" @if ('Konghucu' == $data_pengguna->agama) {{ 'selected' }} @endif>Konghucu</option>
                            </select>
                        </div>
                        @php
                            $tanggal_lahir = \Carbon\Carbon::parse($data_pengguna->tanggal_lahir)->format('Y-m-d');
                            $tanggal_lahir_display = \Carbon\Carbon::parse($data_pengguna->tanggal_lahir)->format('d/m/Y');
                        @endphp

                        <div class="col-12 col-md-6 my-2">
                            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{ $tanggal_lahir }}" autocomplete="off" required>
                        </div>
                    </div>
                    <div class="row my-2">
                        <div class="col-12 col-md-6 my-2">
                            <label for="no_hp" class="form-label">Nomor Handphone</label>
                            <input type="text" class="form-control" id="no_hp" name="no_hp" value="{{ $data_pengguna->no_hp }}" autocomplete="off" required>
                        </div>
                        <div class="col-12 col-md-6 my-2">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ $data_pengguna->email }}" autocomplete="off" required>
                        </div>
                    </div>
                    <div class="row my-2">
                        <div class="col-12 col-md-6 my-2">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" value="{{ $data_pengguna->username }}" autocomplete="off" required>
                        </div>
                        <div class="col-12 col-md-6 my-2">
                            <label for="role" class="form-label">Peran</label>
                            <select class="form-select" aria-label="Default select example" id="role" name="role">
                                <option value="Karyawan" @if ('karyawan' == $data_pengguna->role) {{ 'selected' }} @endif>Karyawan</option>
                                <option value="Admin" @if ('admin' == $data_pengguna->role) {{ 'selected' }} @endif>Admin</option>
                            </select>
                        </div>
                    </div>
                    <div class="row my-2">
                        <div class="col-12 col-md-6 my-2">
                            <label for="password" class="form-label">Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="password" name="password" value="{{ $data_pengguna->password }}" autocomplete="off" required>
                                <button class="btn btn-secondary" type="button" id="togglePassword">
                                    <i id="toggleIcon" class="fa fa-eye"></i>
                                </button>
                            </div>
                            <small class="form-text text-muted" style="font-size: 0.8em;">
                                Password yang tersimpan di database telah diproses dengan algoritma hash dan ditampilkan dalam format terenkripsi untuk keamanan.
                            </small>
                        </div>
                    </div>
                    <div class="row my-2">
                        <div class="col-12 col-md-6 my-2">
                            <label for="foto" class="form-label">Foto Saat Ini</label>
                        </div>
                    </div>
                    <div class="row my-2">
                        <div class="col-12 col-md-6 my-2">
                            @if ($data_pengguna->foto)
                                <img class="rounded-circle" src="data:image/jpeg;base64,{{ base64_encode($data_pengguna->foto) }}" width="100" height="100">
                                <div class="form-check mt-2">
                                    <input class="form-check-input" type="checkbox" id="deleteFoto" name="deleteFoto">
                                    <label class="form-check-label" for="deleteFoto">
                                        Hapus foto
                                    </label>
                                </div>
                            @else
                                <p>Tidak ada</p>
                            @endif
                        </div>
                    </div>                    
                    <div class="row my-2">
                        <div class="col-12 col-md-6 my-2">
                            <label for="foto" class="form-label">Foto Baru</label>
                            <input type="file" class="form-control" id="foto" name="foto" autocomplete="off">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection