<div class="row">
    <div class="d-flex align-items-stretch">
        <div class="card w-100 p-4">
            <div class="d-flex">
                <h5 class="card-title fw-semibold mb-4">TYPE STOK</h5>
                <button type="button" data-bs-toggle="modal" data-bs-target="#addTypestok"
                    class="btn btn-primary ms-auto">
                    Tambah Data
                </button>
            </div>
            <div class="card-body p-4">
                <div class="table-responsive">
                    <table id="table" class="table text-nowrap mb-0 align-middle">
                        <thead class="text-dark fs-4">
                            <tr>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">No</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Nama Stok</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Aksi</h6>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 0;?>
                            <?php foreach ($all_typestok as $key => $typestok):?>
                            <tr>
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0"><?=++$i?>.</h6>
                                </td>
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-1"><?=$typestok['nama_typestok'];?></h6>
                                </td>
                                <td class="border-bottom-0">
                                    <button type="button" data-bs-target="#editTypestok" data-bs-toggle="modal"
                                        data-typestok="<?=$typestok['nama_typestok'];?>"
                                        data-id_typestok="<?=$typestok['id_typestok'];?>"
                                        class="btn btn-primary btn-sm">
                                        Edit
                                    </button>
                                    <button type="button" data-bs-target="#hapusTypestok" data-bs-toggle="modal"
                                        class="btn btn-danger btn-sm" data-typestok="<?=$typestok['nama_typestok'];?>"
                                        data-id_typestok="<?=$typestok['id_typestok'];?>">
                                        Hapus</button>
                                </td>
                            </tr>
                            <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="addTypestok" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="row g-3 needs-validation" action="<?=base_url('masterdata/add_typestok');?>" method="post">
                <div class="modal-body">
                    <div class="p-3">
                        <div class="mb-3">
                            <label for="nama_typestok" class="form-label">Nama Stok</label>
                            <input type="text" name="nama_typestok" class="form-control" id="nama_typestok" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="editTypestok" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="row g-3 needs-validation" action="<?=base_url('masterdata/update_typestok');?>" method="post">
                <div class="modal-body">
                    <div class="p-3">
                        <div class="mb-3">
                            <label for="typestok" class="form-label">Nama Stok</label>
                            <input type="text" name="nama_typestok" class="form-control" id="typestok" required>
                            <input type="hidden" name="id_typestok" class="form-control" id="id_typestok" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="hapusTypestok" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Konfirmasi Hapus</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="row g-3" action="<?=base_url('masterdata/delete_typestok');?>" method="post">
                <div class="modal-body">
                    <div class="p-3">
                        <div class="mb-3">
                            <label for="id_typestok" class="form-label">Anda yakin ingin menghapus type stok <strong
                                    id="typestok"></strong> ?</label>
                            <input type="hidden" id="id_typestok" name="id_typestok">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                    <button type="submit" class="btn btn-primary">Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
// ================== Edit ========================
const editTypestok = document.getElementById('editTypestok');
editTypestok.addEventListener('show.bs.modal', function(event) {
    // Button that triggered the modal
    const button = event.relatedTarget;

    const id_typestok = button.getAttribute('data-id_typestok');
    const typestok = button.getAttribute('data-typestok');

    // Update the modal's content
    const modalIdTypestok = editTypestok.querySelector('#id_typestok');
    const modalTypestok = editTypestok.querySelector('#typestok');

    modalIdTypestok.value = id_typestok;
    modalTypestok.value = typestok;
});


// ============== Hapus =======================
const hapusTypestok = document.getElementById('hapusTypestok');
hapusTypestok.addEventListener('show.bs.modal', function(event) {
    // Button that triggered the modal
    const button = event.relatedTarget;

    const id_typestok = button.getAttribute('data-id_typestok');
    const typestok = button.getAttribute('data-typestok');

    // Update the modal's content
    const modalIdTypestok = hapusTypestok.querySelector('#id_typestok');
    const modalTypestok = hapusTypestok.querySelector('#typestok');

    modalIdTypestok.value = id_typestok;
    modalTypestok.textContent = typestok;
});
</script>