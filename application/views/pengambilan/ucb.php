<div class="row">
    <div class="d-flex align-items-stretch">
        <div class="card w-100 p-4">
            <div class="d-flex">
                <h5 class="card-title fw-semibold mb-4">DATA PENGAMBILAN UCB</h5>
                <button type="button" data-bs-toggle="modal" data-bs-target="#addPengambilan"
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
                                    <h6 class="fw-semibold mb-0">ID Pengambilan</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">NIM</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Nama Mahasiswa</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Kelas</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Semester</h6>
                                </th>

                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Jenis Pengambilan</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Ukuran</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Tahun Ajar</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Aksi</h6>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 0;?>
                            <?php foreach ($all_pengambilan as $key => $pengambilan):?>
                            <tr>
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0"><?=++$i;?>.</h6>
                                </td>
                                <td>
                                    <h6 class="fw-semibold mb-1">IDP<?=$pengambilan['id_pengambilan'];?></h6>
                                </td>
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-1"><?=$pengambilan['nim'];?></h6>
                                </td>
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-1"><?=$pengambilan['nama_mahasiswa'];?></h6>
                                </td>
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-1"><?=$pengambilan['kelas'];?></h6>
                                </td>
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-1"><?=$pengambilan['semester'];?></h6>
                                </td>
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-1"><?=$pengambilan['nama_typestok'];?></h6>
                                </td>
                                <td class="border-bottom-0">
                                    <div class="d-flex align-items-center gap-2">
                                        <span
                                            class="badge bg-primary rounded-3 fw-semibold"><?=$pengambilan['nama_ukuran'];?></span>
                                    </div>
                                </td>
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-1"><?=$pengambilan['nama_ta'];?></h6>
                                </td>
                                <td class="border-bottom-0">
                                    <button type="button" data-bs-target="#editMahasiswa" data-bs-toggle="modal"
                                        data-fk_ta="<?=$pengambilan['fk_ta'];?>"
                                        data-semester="<?=$pengambilan['semester'];?>"
                                        data-kelas="<?=$pengambilan['kelas'];?>"
                                        data-fk_mahasiswa="<?=$pengambilan['fk_mahasiswa'];?>"
                                        data-fk_stok="<?=$pengambilan['fk_stok'];?>"
                                        data-id_pengambilan="<?=$pengambilan['id_pengambilan'];?>"
                                        class="btn btn-primary btn-sm">
                                        Edit
                                    </button>
                                    <button type="button" data-bs-target="#hapusMahasiswa" data-bs-toggle="modal"
                                        class="btn btn-danger btn-sm"
                                        data-id_pengambilan="<?=$pengambilan['id_pengambilan'];?>"
                                        data-fk_stok="<?=$pengambilan['fk_stok'];?>">
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
<div class="modal fade" id="addPengambilan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="row g-3 needs-validation" action="<?=base_url('pengambilan/add_pengambilan_mahasiswa');?>"
                method="post">
                <div class="modal-body">
                    <div class="p-3">
                        <div class="mb-3">
                            <label for="fk_ta" class="form-label">Tahun Ajar</label>
                            <select class="form-select" name="fk_ta" id="fk_ta" required>
                                <option value="">Choose...</option>
                                <?php foreach ($allTahunAjar as $key => $tahunajar):?>
                                <option value="<?=$tahunajar['id_ta'];?>"><?=$tahunajar['nama_ta'];?></option>
                                <?php endforeach;?>
                            </select>
                            <div class="invalid-feedback">
                                Please select a valid state.
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="semester" class="form-label">Semester</label>
                            <select class="form-select" name="semester" id="semester" required>
                                <option value="">Choose...</option>
                                <option value="Semester 1">Semester 1</option>
                                <option value="Semester 2">Semester 2</option>
                            </select>
                            <div class="invalid-feedback">
                                Please select a valid state.
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="fk_mahasiswa" class="form-label">Nama</label>
                            <select class="form-select" name="fk_mahasiswa" id="fk_mahasiswa" required>
                                <option value="">Choose...</option>
                                <?php foreach ($all_mahasiswa as $key => $mahasiswa):?>
                                <option value="<?=$mahasiswa['id_mahasiswa'];?>">
                                    <?=$mahasiswa['nim'].' - '.$mahasiswa['nama_mahasiswa'];?>
                                </option>
                                <?php endforeach;?>
                            </select>
                            <div class="invalid-feedback">
                                Please select a valid state.
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="kelas" class="form-label">Kelas</label>
                            <input type="text" name="kelas" class="form-control" id="kelas" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="fk_stok" class="form-label">Jenis Pengambilan</label>
                            <select class="form-select" name="fk_stok" id="fk_stok" required>
                                <option value="">Choose...</option>
                                <?php foreach ($getAllStokMahasiswa as $key => $stok):?>
                                <option value="<?=$stok['id_stok_mhs'];?>">
                                    <?= $stok['nama_typestok'].' ('.$stok['nama_prodi'].' - Ukuran '.$stok['nama_ukuran'].')';?>
                                </option>
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
<div class="modal fade" id="editMahasiswa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="row g-3 needs-validation" action="<?=base_url('pengambilan/update_pengambilan_mahasiswa');?>"
                method="post">
                <div class="modal-body">
                    <div class="p-3">
                        <div class="mb-3">
                            <label for="fk_ta" class="form-label">Tahun Ajar</label>
                            <select disabled class="form-select" name="fk_ta" id="fk_ta" required>
                                <option value="">Choose...</option>
                                <?php foreach ($allTahunAjar as $key => $tahunajar):?>
                                <option value="<?=$tahunajar['id_ta'];?>"><?=$tahunajar['nama_ta'];?></option>
                                <?php endforeach;?>
                            </select>
                            <div class="invalid-feedback">
                                Please select a valid state.
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="semester" class="form-label">Semester</label>
                            <select disabled class="form-select" name="semester" id="semester" required>
                                <option value="">Choose...</option>
                                <option value="Semester 1">Semester 1</option>
                                <option value="Semester 2">Semester 2</option>
                            </select>
                            <div class="invalid-feedback">
                                Please select a valid state.
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="fk_mahasiswa" class="form-label">Nama</label>
                            <select disabled class="form-select" name="fk_mahasiswa" id="fk_mahasiswa" required>
                                <option value="">Choose...</option>
                                <?php foreach ($all_mahasiswa as $key => $mahasiswa):?>
                                <option value="<?=$mahasiswa['id_mahasiswa'];?>">
                                    <?=$mahasiswa['nim'].' - '.$mahasiswa['nama_mahasiswa'];?>
                                </option>
                                <?php endforeach;?>
                            </select>
                            <div class="invalid-feedback">
                                Please select a valid state.
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="kelas" class="form-label">Kelas</label>
                            <input type="text" name="kelas" class="form-control" id="kelas" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="fk_stok" class="form-label">Jenis Pengambilan</label>
                            <select disabled class="form-select" name="fk_stok" id="fk_stok" required>
                                <option value="">Choose...</option>
                                <?php foreach ($getAllStokMahasiswa as $key => $stok):?>
                                <option value="<?=$stok['id_stok_mhs'];?>">
                                    <?= $stok['nama_typestok'].' ('.$stok['nama_prodi'].' - Ukuran '.$stok['nama_ukuran'].')';?>
                                </option>
                                <?php endforeach;?>
                            </select>
                            <div class="invalid-feedback">
                                Please select a valid state.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id_pengambilan" id="id_pengambilan" required>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="hapusMahasiswa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Konfirmasi Hapus</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="row g-3" action="<?=base_url('pengambilan/delete_pengambilan_mahasiswa');?>" method="post">
                <div class="modal-body">
                    <div class="p-3">
                        <div class="mb-3">
                            <label for="id_pengambilan" class="form-label">Anda yakin ingin menghapus data pengambilan
                                dengan ID <strong id="text_id"></strong> ?</label>
                            <input type="hidden" id="id_pengambilan" name="id_pengambilan">
                            <input type="hidden" id="fk_stok" name="fk_stok">
                            <p>Kembalikan jumlah stok?</p>
                            <div class="d-flex">
                                <div class="form-check me-3">
                                    <input class="form-check-input" value="ya" type="radio" name="kembalikan_stok"
                                        id="kembalikan-stok-ya" required>
                                    <label class="form-check-label" for="kembalikan-stok-ya">
                                        Ya
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" value="tidak" type="radio" name="kembalikan_stok"
                                        id="kembalikan-stok-tidak" required>
                                    <label class="form-check-label" for="kembalikan-stok-tidak">
                                        Tidak
                                    </label>
                                </div>
                            </div>
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
const editMahasiswa = document.getElementById('editMahasiswa');
editMahasiswa.addEventListener('show.bs.modal', function(event) {
    // Button that triggered the modal
    const button = event.relatedTarget;

    const id_pengambilan = button.getAttribute('data-id_pengambilan');
    const fk_ta = button.getAttribute('data-fk_ta');
    const semester = button.getAttribute('data-semester');
    const kelas = button.getAttribute('data-kelas');
    const fk_stok = button.getAttribute('data-fk_stok');
    const fk_mahasiswa = button.getAttribute('data-fk_mahasiswa');

    // Update the modal's content
    const modalIdData = editMahasiswa.querySelector('#id_pengambilan');
    const modalTa = editMahasiswa.querySelector('#fk_ta');
    const modalSemester = editMahasiswa.querySelector('#semester');
    const modalKelas = editMahasiswa.querySelector('#kelas');
    const modalFkMahasiswa = editMahasiswa.querySelector('#fk_mahasiswa');
    const modalStok = editMahasiswa.querySelector('#fk_stok');
    const modalUkuran = editMahasiswa.querySelector('#fk_mahasiswa');

    modalIdData.value = id_pengambilan;
    modalTa.value = fk_ta;
    modalSemester.value = semester;
    modalKelas.value = kelas;
    modalFkMahasiswa.value = fk_mahasiswa;
    modalStok.value = fk_stok;
});


// ============== Hapus =======================
const hapusMahasiswa = document.getElementById('hapusMahasiswa');
hapusMahasiswa.addEventListener('show.bs.modal', function(event) {
    // Button that triggered the modal
    const button = event.relatedTarget;

    const id_pengambilan = button.getAttribute('data-id_pengambilan');
    const fk_stok = button.getAttribute('data-fk_stok');

    // Update the modal's content
    const modalIdData = hapusMahasiswa.querySelector('#id_pengambilan');
    const modalTextId = hapusMahasiswa.querySelector('#text_id');
    const modalFkStok = hapusMahasiswa.querySelector('#fk_stok');

    modalIdData.value = id_pengambilan;
    modalFkStok.value = fk_stok;
    modalTextId.textContent = 'IDP' + id_pengambilan;
});
</script>