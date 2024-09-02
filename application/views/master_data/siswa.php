<div class="row">
    <div class="d-flex align-items-stretch">
        <div class="card w-100 p-4">
            <div class="d-flex">
                <h5 class="card-title fw-semibold mb-4">SISWA</h5>
                <button type="button" data-bs-toggle="modal" data-bs-target="#addSiswa" class="btn btn-primary ms-auto">
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
                                    <h6 class="fw-semibold mb-0">NIS</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Nama Siswa</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Jenis Kelamin</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Unit</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Aksi</h6>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 0;?>
                            <?php foreach ($all_siswa as $key => $siswa):?>
                            <tr>
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0"><?=++$i;?>.</h6>
                                </td>
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-1"><?=$siswa['nis'];?></h6>
                                </td>
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-1"><?=$siswa['nama_siswa'];?></h6>
                                </td>
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-1"><?=$siswa['jenis_kelamin'];?></h6>
                                </td>
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-1"><?=$siswa['nama_unit'];?></h6>
                                </td>
                                <td class="border-bottom-0">
                                    <button type="button" data-bs-target="#editSiswa" data-bs-toggle="modal"
                                        data-nis="<?=$siswa['nis'];?>"
                                        data-jenis_kelamin="<?=$siswa['jenis_kelamin'];?>"
                                        data-fk_unit="<?=$siswa['fk_unit'];?>" data-id_map="<?=$siswa['id_map'];?>"
                                        data-nama_siswa="<?=$siswa['nama_siswa'];?>" data-id="<?=$siswa['id_siswa'];?>"
                                        class="btn btn-primary btn-sm">
                                        Edit
                                    </button>
                                    <button type="button" data-bs-target="#hapusSiswa" data-bs-toggle="modal"
                                        class="btn btn-danger btn-sm" data-id="<?=$siswa['id_siswa'];?>"
                                        data-nama_siswa="<?=$siswa['nama_siswa'];?>">
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
<div class="modal fade" id="addSiswa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="row g-3 needs-validation" action="<?=base_url('masterdata/add_siswa');?>" method="post">
                <div class="modal-body">
                    <div class="p-3">
                        <div class="mb-3">
                            <label for="nis" class="form-label">NIS</label>
                            <input type="hidden" name="id_siswa" value="<?= uuid(); ?>" class="form-control"
                                id="id_siswa" required>
                            <input type="text" name="nis" class="form-control" id="nis" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="nama_siswa" class="form-label">Nama</label>
                            <input type="text" name="nama_siswa" class="form-control" id="nama_siswa" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                            <select class="form-select" name="jenis_kelamin" id="jenis_kelamin" required>
                                <option value="">Choose...</option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                            <div class="invalid-feedback">
                                Please select a valid state.
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="fk_unit" class="form-label">Unit</label>
                            <select class="form-select" name="fk_unit" id="fk_unit" required>
                                <option value="">Choose...</option>
                                <?php foreach ($all_unit as $key => $unit):?>
                                <option value="<?=$unit['id_unit'];?>"><?=$unit['nama_unit'];?></option>
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
<div class="modal fade" id="editSiswa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="row g-3 needs-validation" action="<?=base_url('masterdata/update_siswa');?>" method="post">
                <div class="modal-body">
                    <div class="p-3">
                        <div class="mb-3">
                            <label for="nis" class="form-label">NIS</label>
                            <input type="text" readonly name="nis" class="form-control" id="nis" required>
                            <input type="hidden" name="id_siswa" class="form-control" id="id" required>
                            <input type="hidden" name="id_map_unit" class="form-control" id="id_map_unit" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="nama_siswa" class="form-label">Nama</label>
                            <input type="text" name="nama_siswa" class="form-control" id="nama_siswa" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                            <select class="form-select" name="jenis_kelamin" id="jenis_kelamin" required>
                                <option value="">Choose...</option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                            <div class="invalid-feedback">
                                Please select a valid state.
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="fk_unit" class="form-label">Unit</label>
                            <select class="form-select" name="fk_unit" id="fk_unit" required>
                                <option value="">Choose...</option>
                                <?php foreach ($all_unit as $key => $unit):?>
                                <option value="<?=$unit['id_unit'];?>"><?=$unit['nama_unit'];?></option>
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
<div class="modal fade" id="hapusSiswa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Konfirmasi Hapus</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="row g-3" action="<?=base_url('masterdata/delete_siswa');?>" method="post">
                <div class="modal-body">
                    <div class="p-3">
                        <div class="mb-3">
                            <label for="id" class="form-label">Anda yakin ingin menghapus <strong
                                    id="nama_siswa"></strong> ?</label>
                            <input type="hidden" id="id" name="id_siswa">
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
const editSiswa = document.getElementById('editSiswa');
editSiswa.addEventListener('show.bs.modal', function(event) {
    // Button that triggered the modal
    const button = event.relatedTarget;

    const id = button.getAttribute('data-id');
    const fk_unit = button.getAttribute('data-fk_unit');
    const id_map = button.getAttribute('data-id_map');
    const nis = button.getAttribute('data-nis');
    const nama_siswa = button.getAttribute('data-nama_siswa');
    const jenis_kelamin = button.getAttribute('data-jenis_kelamin');

    // Update the modal's content
    const modalId = editSiswa.querySelector('#id');
    const modalFkUnit = editSiswa.querySelector('#fk_unit');
    const modalIdMap = editSiswa.querySelector('#id_map_unit');
    const modalNis = editSiswa.querySelector('#nis');
    const modalNama = editSiswa.querySelector('#nama_siswa');
    const modalJenisKelamin = editSiswa.querySelector('#jenis_kelamin');

    modalId.value = id;
    modalFkUnit.value = fk_unit;
    modalIdMap.value = id_map;
    modalNis.value = nis;
    modalNama.value = nama_siswa;
    modalJenisKelamin.value = jenis_kelamin;
});


// ============== Hapus =======================
const hapusSiswa = document.getElementById('hapusSiswa');
hapusSiswa.addEventListener('show.bs.modal', function(event) {
    // Button that triggered the modal
    const button = event.relatedTarget;

    const id = button.getAttribute('data-id');
    const nama_siswa = button.getAttribute('data-nama_siswa');

    // Update the modal's content
    const modalIdData = hapusSiswa.querySelector('#id');
    const modalNamaMahasiswa = hapusSiswa.querySelector('#nama_siswa');

    modalIdData.value = id;
    modalNamaMahasiswa.textContent = nama_siswa;
});
</script>