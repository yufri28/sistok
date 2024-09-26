<div class="row">
    <div class="d-flex align-items-stretch">
        <div class="card w-100 p-4">
            <div class="d-flex">
                <h5 class="card-title fw-semibold mb-4">UNIT</h5>
                <?php if($this->session->userdata('role') != 'keuangan' && $this->session->userdata('role') != 'logistik' && $this->session->userdata('role') != 'admin_m' && $this->session->userdata('role') != 'user'):?>
                <button type="button" data-bs-toggle="modal" data-bs-target="#addUnit" class="btn btn-primary ms-auto">
                    Tambah Data
                </button>
                <?php endif;?>
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
                                    <h6 class="fw-semibold mb-0">Kode Unit</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Nama Unit</h6>
                                </th>
                                <?php if($this->session->userdata('role') != 'keuangan' && $this->session->userdata('role') != 'logistik' && $this->session->userdata('role') != 'admin_m' && $this->session->userdata('role') != 'user'):?>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Aksi</h6>
                                </th>
                                <?php endif;?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 0;?>
                            <?php foreach ($all_unit as $key => $unit):?>
                            <tr>
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0"><?=++$i;?></h6>
                                </td>
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-1"><?=$unit['kode_unit'];?></h6>
                                </td>
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-1"><?=$unit['nama_unit'];?></h6>
                                </td>
                                <?php if($this->session->userdata('role') != 'keuangan' && $this->session->userdata('role') != 'logistik' && $this->session->userdata('role') != 'admin_m' && $this->session->userdata('role') != 'user'):?>
                                <td class="border-bottom-0">
                                    <button type="button" data-bs-target="#editUnit" data-bs-toggle="modal"
                                        data-kode_unit="<?=$unit['kode_unit'];?>"
                                        data-nama_unit="<?=$unit['nama_unit'];?>" data-id_unit="<?=$unit['id_unit'];?>"
                                        class="btn btn-primary btn-sm">
                                        Edit
                                    </button>
                                    <button type="button" data-bs-target="#hapusUnit" data-bs-toggle="modal"
                                        class="btn btn-danger btn-sm" data-nama_unit="<?=$unit['nama_unit'];?>"
                                        data-id_unit="<?=$unit['id_unit'];?>">
                                        Hapus</button>
                                </td>
                                <?php endif;?>
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
<div class="modal fade" id="addUnit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="row g-3 needs-validation" action="<?=base_url('masterdata/add_unit')?>" method="post">
                <div class="modal-body">
                    <div class="p-3">
                        <div class="mb-3">
                            <label for="kode_unit" class="form-label">Kode Unit <small
                                    class="text-danger">*</small></label>
                            <input type="text" name="kode_unit" class="form-control" id="kode_unit" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="nama_unit" class="form-label">Nama Unit <small
                                    class="text-danger">*</small></label>
                            <input type="text" name="nama_unit" class="form-control" id="nama_unit" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                    <button class="btn btn-success btn-loading d-none" type="button" disabled>
                        <span class="spinner-grow spinner-grow-sm" aria-hidden="true"></span>
                        <span role="status">Loading...</span>
                    </button>
                    <button type="submit" id="btn-simpan" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="editUnit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="row g-3 needs-validation" action="<?=base_url('masterdata/update_unit')?>" method="post">
                <div class="modal-body">
                    <div class="p-3">
                        <div class="mb-3">
                            <label for="kode_unit" class="form-label">Kode Unit <small
                                    class="text-danger">*</small></label>
                            <input type="hidden" name="id_unit" class="form-control" id="id_unit" required>
                            <input type="text" readonly name="kode_unit" class="form-control" id="kode_unit" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="nama_unit" class="form-label">Nama Unit <small
                                    class="text-danger">*</small></label>
                            <input type="text" name="nama_unit" class="form-control" id="nama_unit" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                    <button class="btn btn-success btn-loading d-none" type="button" disabled>
                        <span class="spinner-grow spinner-grow-sm" aria-hidden="true"></span>
                        <span role="status">Loading...</span>
                    </button>
                    <button type="submit" id="btn-simpan" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="hapusUnit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Konfirmasi Hapus</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="row g-3" action="<?=base_url('masterdata/delete_unit')?>" method="post">
                <div class="modal-body">
                    <div class="p-3">
                        <div class="mb-3">
                            <label for="id_unit" class="form-label">Anda yakin ingin menghapus <stong id="nama_unit">
                                </stong> ?</label>
                            <input type="hidden" id="id_unit" name="id_unit">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                    <button class="btn btn-success btn-loading-hapus d-none" type="button" disabled>
                        <span class="spinner-grow spinner-grow-sm" aria-hidden="true"></span>
                        <span role="status">Loading...</span>
                    </button>
                    <button type="submit" id="btn-hapus" class="btn btn-primary">Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
// ================== Edit ========================
const editUnit = document.getElementById('editUnit');
editUnit.addEventListener('show.bs.modal', function(event) {
    // Button that triggered the modal
    const button = event.relatedTarget;

    const id_unit = button.getAttribute('data-id_unit');
    const kode_unit = button.getAttribute('data-kode_unit');
    const nama_unit = button.getAttribute('data-nama_unit');

    // Update the modal's content
    const modalIdUnit = editUnit.querySelector('#id_unit');
    const modalKodeUnit = editUnit.querySelector('#kode_unit');
    const modalNamaUnit = editUnit.querySelector('#nama_unit');

    modalIdUnit.value = id_unit;
    modalKodeUnit.value = kode_unit;
    modalNamaUnit.value = nama_unit;
});


// ============== Hapus =======================
const hapusUnit = document.getElementById('hapusUnit');
hapusUnit.addEventListener('show.bs.modal', function(event) {
    // Button that triggered the modal
    const button = event.relatedTarget;

    const id_unit = button.getAttribute('data-id_unit');
    const nama_unit = button.getAttribute('data-nama_unit');

    // Update the modal's content
    const modalIdUnit = hapusUnit.querySelector('#id_unit');
    const modalNamaUnit = hapusUnit.querySelector('#nama_unit');

    modalIdUnit.value = id_unit;
    modalNamaUnit.textContent = nama_unit;
});
</script>