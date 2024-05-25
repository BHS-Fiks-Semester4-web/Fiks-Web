<div class="modal fade" id="modalJenisBarang" tabindex="-1" aria-labelledby="modalJenisBarangLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalJenisBarangLabel">Membuat Data Jenis Barang</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="jenisBarangForm" method="POST" action="/data_barang/storeJenisBarang" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="nama_jenis_barang" class="form-label">Nama Jenis Barang</label>
                        <input type="text" class="form-control" id="nama_jenis_barang" name="nama_jenis_barang" autocomplete="off" oninput="capitalize(this)" required>
                    </div>
                    <div class="mb-3">
                        <label for="foto" class="form-label">Foto</label>
                        <input type="file" class="form-control" id="foto" name="foto" autocomplete="off" required>
                    </div>
                    <button type="button" class="btn btn-primary" id="saveJenisBarang">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>