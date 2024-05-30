@extends('admin.adminmenu')

@section('admincontent')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="container-fluid pt-1 px-3">
            <div class="bg-light rounded-top p-4">
                <div class="row">
                    <a href="/data_barang" class="btn btn-warning mx-3 my-3 col-sm-2" type="button">Kembali</a>
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
        <div class="col-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Membuat Data Barang</h6>
                <form id="barangForm" method="POST" action="/data_barang" enctype="multipart/form-data">
                    @csrf
                    <div class="row my-2">
                        <div class="col-12 col-md-6 my-2">
                            <label for="id_supplier" class="form-label">Supplier</label>
                            <div class="d-flex align-items-center">
                                <select class="form-select me-2" aria-label="Default select example" id="id_supplier" name="id_supplier">
                                    <option value="">Pilih supplier</option>
                                    @foreach ($suppliers as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama_supplier }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="invalid-feedback" id="supplierError"></div>
                        </div>                        
                        <div class="col-12 col-md-6 my-2">
                            <label for="id_jenis_barang" class="form-label">Jenis Barang</label>
                            <div class="d-flex align-items-center">
                                <select class="form-select me-2" aria-label="Default select example" id="id_jenis_barang" name="id_jenis_barang" required>
                                    <option value="">Pilih jenis barang</option>
                                    @foreach ($jenisBarangs as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama_jenis_barang }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="invalid-feedback" id="jenisBarangError"></div>
                        </div>
                    </div>
                    <div class="row my-2">
                        <div class="col-12 col-md-6 my-2">
                            <label for="nama_barang" class="form-label">Nama Barang</label>
                            <input type="text" class="form-control" id="nama_barang" name="nama_barang" autocomplete="off" oninput="capitalize(this)" required>
                            <div class="invalid-feedback" id="namaBarangError"></div>
                        </div>
                        <div class="col-12 col-md-6 my-2">
                            <label for="stok_barang" class="form-label">Stok Barang</label>
                            <input type="text" class="form-control" id="stok_barang" name="stok_barang" autocomplete="off" required>
                            <div class="invalid-feedback" id="stokBarangError"></div>
                        </div>
                    </div>
                    <div class="row my-2">
                        <div class="col-12 col-md-6 my-2">
                            <label for="harga_beli_barang" class="form-label">Harga Beli Barang</label>
                            <input type="text" class="form-control" id="harga_beli_barang" name="harga_beli_barang" autocomplete="off" required>
                            <div class="invalid-feedback" id="hargaBeliError"></div>
                        </div>
                        <div class="col-12 col-md-6 my-2">
                            <label for="harga_sebelum_diskon_barang" class="form-label">Harga Jual</label>
                            <input type="text" class="form-control" id="harga_sebelum_diskon_barang" name="harga_sebelum_diskon_barang" autocomplete="off" required>
                            <div class="invalid-feedback" id="hargaSebelumDiskonError"></div>
                        </div>
                    </div>
                    <div class="row my-2">
                        <div class="col-12 col-md-6 my-2">
                            <label for="diskon_barang" class="form-label">Diskon</label>
                            <input type="text" class="form-control" id="diskon_barang" name="diskon_barang" autocomplete="off">
                            <div class="invalid-feedback" id="diskonError"></div>
                        </div>
                        <div class="col-12 col-md-6 my-2">
                            <label for="harga_setelah_diskon_barang" class="form-label">Harga Jual Setelah Diskon</label>
                            <input type="text" class="form-control" id="harga_setelah_diskon_barang" name="harga_setelah_diskon_barang" autocomplete="off" readonly>
                            <div class="invalid-feedback" id="hargaSetelahDiskonError"></div>
                        </div>
                    </div>
                    <div class="row my-2">
                        <div class="col-12 col-md-6 my-2">
                            <label for="exp_diskon_barang" class="form-label">Expired Diskon</label>
                            <input type="date" class="form-control" id="exp_diskon_barang" name="exp_diskon_barang" autocomplete="off" disabled>
                            <div class="invalid-feedback" id="expDiskonError"></div>
                        </div>
                        <div class="col-12 col-md-6 my-2">
                            <label for="garansi_barang" class="form-label">Garansi Barang</label>
                            <input type="text" class="form-control" id="garansi_barang" name="garansi_barang" autocomplete="off">
                            <div class="invalid-feedback" id="garansiBarangError"></div>
                        </div>
                    </div>
                    <div class="row my-2">
                        <div class="col-12 col-md-6 my-2">
                            <label for="deskripsi_barang" class="form-label">Deskripsi Barang</label>
                            <textarea name="deskripsi_barang" id="deskripsi_barang" cols="50" rows="10" class="form-control"></textarea>
                            <div class="invalid-feedback" id="deskripsiError"></div>
                        </div>
                        <div class="col-12 col-md-6 my-2">
                            <label for="foto_barang" class="form-label">Foto Barang</label>
                            <input type="file" class="form-control" id="foto_barang" name="foto_barang" autocomplete="off">
                            <div class="invalid-feedback" id="fotoBarangError"></div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const diskonInput = document.getElementById('diskon_barang');
        const expDiskonInput = document.getElementById('exp_diskon_barang');
        const hargaJualInput = document.getElementById('harga_sebelum_diskon_barang');
        const hargaSetelahDiskonInput = document.getElementById('harga_setelah_diskon_barang');

        const today = new Date().toISOString().split('T')[0];
        expDiskonInput.setAttribute('min', today);

        diskonInput.addEventListener('input', function() {
            const diskonValue = parseFloat(diskonInput.value) || 0;
            const hargaJualValue = parseFloat(hargaJualInput.value) || 0;
            const hargaSetelahDiskon = hargaJualValue - diskonValue;
            hargaSetelahDiskonInput.value = hargaSetelahDiskon;

            if (diskonInput.value) {
                expDiskonInput.disabled = false;
                expDiskonInput.required = true;
            } else {
                expDiskonInput.disabled = true;
                expDiskonInput.required = false;
            }
        });

        const form = document.getElementById('barangForm');
        form.addEventListener('submit', function(event) {
            let valid = true;

            const fields = [
                { id: 'id_jenis_barang', message: 'Jenis barang wajib diisi' },
                { id: 'nama_barang', message: 'Nama barang wajib diisi' },
                { id: 'stok_barang', message: 'Stok barang wajib diisi' },
                { id: 'harga_beli_barang', message: 'Harga beli barang wajib diisi' },
                { id: 'harga_sebelum_diskon_barang', message: 'Harga jual wajib diisi' },
                { id: 'garansi_barang', message: 'Garansi barang wajib diisi' },
                { id: 'foto_barang', message: 'Foto barang wajib diisi' },
                { id: 'deskripsi_barang', message: 'Deskripsi barang wajib diisi' },
            ];

            if (diskonInput.value) {
                fields.push({ id: 'exp_diskon_barang', message: 'Expired diskon wajib diisi jika ada diskon' });
            }

            fields.forEach(field => {
                const input = document.getElementById(field.id);
                if (!input.value) {
                    valid = false;
                    input.classList.add('is-invalid');
                    document.getElementById(`${field.id}Error`).textContent = field.message;
                } else {
                    input.classList.remove('is-invalid');
                    document.getElementById(`${field.id}Error`).textContent = '';
                }
            });

            if (!valid) {
                event.preventDefault();
            }
        });
    });
</script>
@endsection
