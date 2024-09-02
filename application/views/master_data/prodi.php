<div class="row">
    <div class="d-flex align-items-stretch">
        <div class="card w-100 p-4">
            <div class="d-flex">
                <h5 class="card-title fw-semibold mb-4">FAKULTAS</h5>
                <button type="button" data-bs-toggle="modal" data-bs-target="#addFakultas"
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
                                    <h6 class="fw-semibold mb-0">Kode Fakultas</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Nama Fakultas</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Aksi</h6>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 0;?>
                            <?php foreach ($all_fakultas as $key => $fakultas):?>
                            <tr>
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0"><?=++$i;?></h6>
                                </td>
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-1"><?=$fakultas['kode_fakultas'];?></h6>
                                </td>
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-1"><?=$fakultas['nama_fakultas'];?></h6>
                                </td>
                                <td class="border-bottom-0">
                                    <button type="button" data-bs-target="#editFakultas" data-bs-toggle="modal"
                                        data-kode_fak="<?=$fakultas['kode_fakultas'];?>"
                                        data-nama_fak="<?=$fakultas['nama_fakultas'];?>"
                                        data-id="<?=$fakultas['id_fakultas'];?>" class="btn btn-primary btn-sm">
                                        Edit
                                    </button>
                                    <button type="button" data-bs-target="#hapusFakultas" data-bs-toggle="modal"
                                        class="btn btn-danger btn-sm" data-kode_fak="<?=$fakultas['kode_fakultas'];?>"
                                        data-nama_fak="<?=$fakultas['nama_fakultas'];?>"
                                        data-id="<?=$fakultas['id_fakultas'];?>">
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
<div class="row">
    <div class="d-flex align-items-stretch">
        <div class="card w-100 p-4">
            <div class="d-flex">
                <h5 class="card-title fw-semibold mb-4">PRODI</h5>
                <button type="button" data-bs-toggle="modal" data-bs-target="#addProdi" class="btn btn-primary ms-auto">
                    Tambah Data
                </button>
            </div>
            <div class="card-body p-4">
                <div class="table-responsive">
                    <table id="tableProdi" class="table text-nowrap mb-0 align-middle">
                        <thead class="text-dark fs-4">
                            <tr>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">No</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Kode Prodi</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Nama Prodi</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Nama Fakultas</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Aksi</h6>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $j = 0;?>
                            <?php foreach ($all_prodi as $key => $prodi):?>
                            <tr>
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0"><?=++$j;?></h6>
                                </td>
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-1"><?=$prodi['kode_prodi'];?></h6>
                                </td>
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-1"><?=$prodi['nama_prodi'];?></h6>
                                </td>
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-1"><?=$prodi['nama_fakultas'];?></h6>
                                </td>
                                <td class="border-bottom-0">
                                    <button type="button" data-bs-target="#editProdi" data-bs-toggle="modal"
                                        data-kode_prodi="<?=$prodi['kode_prodi'];?>"
                                        data-id_fak="<?=$prodi['id_fakultas'];?>"
                                        data-nama_prodi="<?=$prodi['nama_prodi'];?>"
                                        data-id_prodi="<?=$prodi['id_prodi'];?>" class="btn btn-primary btn-sm">
                                        Edit
                                    </button>
                                    <button type="button" data-bs-target="#hapusProdi" data-bs-toggle="modal"
                                        class="btn btn-danger btn-sm" data-nama_prodi="<?=$prodi['nama_prodi'];?>"
                                        data-id_prodi="<?=$prodi['id_prodi'];?>">
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
<div class="modal fade" id="addFakultas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="row g-3 needs-validation" method="post" action="<?=base_url('masterdata/add_fakultas');?>">
                <div class="modal-body">
                    <div class="p-3">
                        <div class="mb-3">
                            <label for="kode_fakultas" class="form-label">Kode Fakultas</label>
                            <input type="text" name="kode_fakultas" class="form-control" id="kode_fakultas" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="nama_fakultas" class="form-label">Nama Fakultas</label>
                            <input type="text" name="nama_fakultas" class="form-control" id="nama_fakultas" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                    <button type="submit" id="btn-simpan" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="editFakultas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="row g-3 needs-validation" action="<?=base_url('masterdata/update_fakultas');?>" method="post">
                <div class="modal-body">
                    <div class="p-3">
                        <div class="mb-3">
                            <label for="kode_fakultas" class="form-label">Kode Fakultas</label>
                            <input type="hidden" name="id_fakultas" class="form-control" id="id_fakultas" required>
                            <input type="text" readonly name="kode_fakultas" class="form-control" id="kode_fakultas"
                                required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="nama_fakultas" class="form-label">Nama Fakultas</label>
                            <input type="text" name="nama_fakultas" class="form-control" id="nama_fakultas" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                    <button type="submit" id="btn-simpan" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="hapusFakultas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Konfirmasi Hapus</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="row g-3" action="<?=base_url('masterdata/delete_fakultas');?>" method="post">
                <div class="modal-body">
                    <div class="p-3">
                        <div class="mb-3">
                            <label for="id_fakultas" class="form-label">Anda yakin ingin menghapus fakultas <strong
                                    id="nama_fakultas"></strong> ?</label>
                            <input type="hidden" id="id_fakultas" name="id_fakultas">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                    <button type="submit" id="btn-hapus" class="btn btn-primary">Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="addProdi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="row g-3 needs-validation" method="post" action="<?=base_url('masterdata/add_prodi');?>">
                <div class="modal-body">
                    <div class="p-3">
                        <div class="mb-3">
                            <label for="kode_prodi" class="form-label">Kode Prodi</label>
                            <input type="text" name="kode_prodi" class="form-control" id="kode_prodi" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="nama_prodi" class="form-label">Nama Prodi</label>
                            <input type="text" name="nama_prodi" class="form-control" id="nama_prodi" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="fk_fakultas" class="form-label">Nama Fakultas</label>
                            <select class="form-select" name="fk_fakultas" id="fk_fakultas" required>
                                <option value="">Choose...</option>
                                <?php foreach ($all_fakultas as $key => $fakultas):?>
                                <option value="<?=$fakultas['id_fakultas'];?>"><?=$fakultas['nama_fakultas'];?></option>
                                <?php endforeach;?>
                            </select>
                            <div class="invalid-feedback">
                                Please select a valid state.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                    <button type="submit" id="btn-simpan" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="editProdi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="row g-3 needs-validation" action="<?=base_url('masterdata/update_prodi');?>" method="post">
                <div class="modal-body">
                    <div class="p-3">
                        <div class="mb-3">
                            <label for="kode_prodi" class="form-label">Kode Prodi</label>
                            <input type="hidden" name="id_prodi" class="form-control" id="id_prodi" required>
                            <input type="text" readonly name="kode_prodi" class="form-control" id="kode_prodi" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="nama_prodi" class="form-label">Nama Prodi</label>
                            <input type="text" name="nama_prodi" class="form-control" id="nama_prodi" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="id_fak" class="form-label">Nama Fakultas</label>
                            <select class="form-select" name="fk_fakultas" id="id_fak" required>
                                <option value="">Choose...</option>
                                <?php foreach ($all_fakultas as $key => $fakultas):?>
                                <option value="<?=$fakultas['id_fakultas'];?>"><?=$fakultas['nama_fakultas'];?></option>
                                <?php endforeach;?>
                            </select>
                            <div class="invalid-feedback">
                                Please select a valid state.
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
<div class="modal fade" id="hapusProdi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Konfirmasi Hapus</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="row g-3" action="<?=base_url('masterdata/delete_prodi');?>" method="post">
                <div class="modal-body">
                    <div class="p-3">
                        <div class="mb-3">
                            <label for="id_prodi" class="form-label">Anda yakin ingin menghapus prodi <strong
                                    id="nama_prodi"></strong> ?</label>
                            <input type="hidden" id="id_prodi" name="id_prodi">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                    <button type="submit" id="btn-hapus" class="btn btn-primary">Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
// ================== Edit Fakultas ========================
const editFakultas = document.getElementById('editFakultas');
editFakultas.addEventListener('show.bs.modal', function(event) {
    // Button that triggered the modal
    const button = event.relatedTarget;
    const kode_fak = button.getAttribute('data-kode_fak');
    const nama_fak = button.getAttribute('data-nama_fak');
    const id = button.getAttribute('data-id');

    // Update the modal's content
    const modalKodeFak = editFakultas.querySelector('#kode_fakultas');
    const modalNamaFak = editFakultas.querySelector('#nama_fakultas');
    const modaId = editFakultas.querySelector('#id_fakultas');

    modalKodeFak.value = kode_fak;
    modalNamaFak.value = nama_fak;
    modaId.value = id;
});


// ============== Hapus =======================
const hapusFakultas = document.getElementById('hapusFakultas');
hapusFakultas.addEventListener('show.bs.modal', function(event) {
    // Button that triggered the modal
    const button = event.relatedTarget;

    const nama_fak = button.getAttribute('data-nama_fak');
    const id = button.getAttribute('data-id');

    const modalId = hapusFakultas.querySelector('#id_fakultas');
    const modalNamaFak = hapusFakultas.querySelector('#nama_fakultas');

    modalId.value = id;
    modalNamaFak.textContent = nama_fak;

});


// ================== Edit Prodi ========================
const editProdi = document.getElementById('editProdi');
editProdi.addEventListener('show.bs.modal', function(event) {
    // Button that triggered the modal
    const button = event.relatedTarget;
    const kode_prodi = button.getAttribute('data-kode_prodi');
    const nama_prodi = button.getAttribute('data-nama_prodi');
    const id_fak = button.getAttribute('data-id_fak');
    const id = button.getAttribute('data-id_prodi');

    // Update the modal's content
    const modalKodeProdi = editProdi.querySelector('#kode_prodi');
    const modalNamaProdi = editProdi.querySelector('#nama_prodi');
    const modalIdFak = editProdi.querySelector('#id_fak');
    const modaId = editProdi.querySelector('#id_prodi');

    modalKodeProdi.value = kode_prodi;
    modalNamaProdi.value = nama_prodi;
    modalIdFak.value = id_fak;
    modaId.value = id;
});


// ============== Hapus =======================
const hapusProdi = document.getElementById('hapusProdi');
hapusProdi.addEventListener('show.bs.modal', function(event) {
    // Button that triggered the modal
    const button = event.relatedTarget;

    const nama_prodi = button.getAttribute('data-nama_prodi');
    const id = button.getAttribute('data-id_prodi');

    const modalId = hapusProdi.querySelector('#id_prodi');
    const modalNamaProdi = hapusProdi.querySelector('#nama_prodi');

    modalId.value = id;
    modalNamaProdi.textContent = nama_prodi;

});
</script>