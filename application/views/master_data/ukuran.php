<div class="row">
    <div class="d-flex align-items-stretch">
        <div class="card w-100 p-4">
            <div class="d-flex">
                <h5 class="card-title fw-semibold mb-4">UKURAN</h5>
                <button type="button" data-bs-toggle="modal" data-bs-target="#addUkuran"
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
                                    <h6 class="fw-semibold mb-0">Nama Ukuran</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Aksi</h6>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 0;?>
                            <?php foreach ($all_ukuran as $key => $ukuran):?>
                            <tr>
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0"><?=++$i;?>.</h6>
                                </td>
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-1"><?=$ukuran['nama_ukuran'];?></h6>
                                </td>
                                <td class="border-bottom-0">
                                    <button type="button" data-bs-target="#editUkuran" data-bs-toggle="modal"
                                        data-ukuran="<?=$ukuran['nama_ukuran'];?>"
                                        data-id_ukuran="<?=$ukuran['id_ukuran'];?>" class="btn btn-primary btn-sm">
                                        Edit
                                    </button>
                                    <button type="button" data-bs-target="#hapusUkuran" data-bs-toggle="modal"
                                        class="btn btn-danger btn-sm" data-ukuran="<?=$ukuran['nama_ukuran'];?>"
                                        data-id_ukuran="<?=$ukuran['id_ukuran'];?>">
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
<div class="modal fade" id="addUkuran" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="row g-3 needs-validation" action="<?=base_url('masterdata/add_ukuran');?>" method="post">
                <div class="modal-body">
                    <div class="p-3">
                        <div class="mb-3">
                            <label for="nama_ukuran" class="form-label">Nama Ukuran</label>
                            <input type="text" name="nama_ukuran" class="form-control" id="nama_ukuran" required>
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
<div class="modal fade" id="editUkuran" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="row g-3 needs-validation" action="<?=base_url('masterdata/update_ukuran');?>" method="post">
                <div class="modal-body">
                    <div class="p-3">
                        <div class="mb-3">
                            <label for="ukuran" class="form-label">Nama Ukuran</label>
                            <input type="text" name="nama_ukuran" class="form-control" id="nama_ukuran" required>
                            <input type="hidden" name="id_ukuran" class="form-control" id="id_ukuran" required>
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
<div class="modal fade" id="hapusUkuran" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Konfirmasi Hapus</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="row g-3" action="<?=base_url('masterdata/delete_ukuran');?>" method="post">
                <div class="modal-body">
                    <div class="p-3">
                        <div class="mb-3">
                            <label for="id_ukuran" class="form-label">Anda yakin ingin menghapus ukuran <strong
                                    id="ukuran"></strong> ?</label>
                            <input type="hidden" id="id_ukuran" name="id_ukuran">
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
const editUkuran = document.getElementById('editUkuran');
editUkuran.addEventListener('show.bs.modal', function(event) {
    // Button that triggered the modal
    const button = event.relatedTarget;

    const id_ukuran = button.getAttribute('data-id_ukuran');
    const ukuran = button.getAttribute('data-ukuran');

    // Update the modal's content
    const modalIdUkuran = editUkuran.querySelector('#id_ukuran');
    const modalUkuran = editUkuran.querySelector('#nama_ukuran');

    modalIdUkuran.value = id_ukuran;
    modalUkuran.value = ukuran;
});


// ============== Hapus =======================
const hapusUkuran = document.getElementById('hapusUkuran');
hapusUkuran.addEventListener('show.bs.modal', function(event) {
    // Button that triggered the modal
    const button = event.relatedTarget;

    const id_ukuran = button.getAttribute('data-id_ukuran');
    const ukuran = button.getAttribute('data-ukuran');

    // Update the modal's content
    const modalIdUkuran = hapusUkuran.querySelector('#id_ukuran');
    const modalUkuran = hapusUkuran.querySelector('#ukuran');

    modalIdUkuran.value = id_ukuran;
    modalUkuran.textContent = ukuran;
});
</script>