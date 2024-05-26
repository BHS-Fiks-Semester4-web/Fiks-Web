<div class="modal fade" id="modalSupplier" tabindex="-1" aria-labelledby="modalSupplierLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalSupplierLabel">Membuat Data Pemasok</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="supplierForm" method="POST" action="/data_barang/storePemasok">
                    @csrf
                    <div class="mb-3">
                        <label for="nama_supplier" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama_supplier" name="nama_supplier" autocomplete="off" oninput="capitalize(this)" required>
                    </div>
                    <div class="mb-3">
                        <label for="alamat_supplier" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="alamat_supplier" name="alamat_supplier" autocomplete="off" oninput="capitalize(this)" required>
                    </div>
                    <div class="mb-3">
                        <label for="no_hp_supplier" class="form-label">Nomor Handphone</label>
                        <input type="text" class="form-control" id="no_hp_supplier" name="no_hp_supplier" autocomplete="off" required>
                    </div>
                    <button type="button" class="btn btn-primary" id="saveSupplier">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>