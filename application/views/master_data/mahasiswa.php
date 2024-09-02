<div class="row">
    <div class="d-flex align-items-stretch">
        <div class="card w-100 p-4">
            <div class="d-flex">
                <h5 class="card-title fw-semibold mb-4">MAHASISWA</h5>
                <button type="button" data-bs-toggle="modal" data-bs-target="#addMahasiswa"
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
                                    <h6 class="fw-semibold mb-0">NIM</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Nama Mahasiswa</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Jenis Kelamin</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Prodi</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Aksi</h6>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 0;?>
                            <?php foreach ($all_mahasiswa as $key => $mahasiswa):?>
                            <tr>
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0"><?=++$i;?>.</h6>
                                </td>
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-1"><?=$mahasiswa['nim'];?></h6>
                                </td>
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-1"><?=$mahasiswa['nama_mahasiswa'];?></h6>
                                </td>
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-1"><?=$mahasiswa['jenis_kelamin'];?></h6>
                                </td>
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-1"><?=$mahasiswa['nama_prodi'];?></h6>
                                </td>
                                <td class="border-bottom-0">
                                    <button type="button" data-bs-target="#editMahasiswa" data-bs-toggle="modal"
                                        data-nim="<?=$mahasiswa['nim'];?>"
                                        data-jenis_kelamin="<?=$mahasiswa['jenis_kelamin'];?>"
                                        data-nama_mahasiswa="<?=$mahasiswa['nama_mahasiswa'];?>"
                                        data-id="<?=$mahasiswa['id_mahasiswa'];?>"
                                        data-fk_prodi="<?=$mahasiswa['fk_prodi'];?>" class="btn btn-primary btn-sm">
                                        Edit
                                    </button>
                                    <button type="button" data-bs-target="#hapusMahasiswa" data-bs-toggle="modal"
                                        class="btn btn-danger btn-sm" data-id="<?=$mahasiswa['id_mahasiswa'];?>"
                                        data-nama_mahasiswa="<?=$mahasiswa['nama_mahasiswa'];?>">
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
<div class="modal fade" id="addMahasiswa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="row g-3 needs-validation" action="<?=base_url('masterdata/add_mahasiswa')?>" method="post">
                <div class="modal-body">
                    <div class="p-3">
                        <div class="mb-3">
                            <label for="nim" class="form-label">NIM</label>
                            <input type="text" name="nim" class="form-control" id="nim" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="nama_mahasiswa" class="form-label">Nama</label>
                            <input type="text" name="nama_mahasiswa" class="form-control" id="nama_mahasiswa" required>
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
                            <label for="fk_prodi" class="form-label">Prodi</label>
                            <select class="form-select" name="fk_prodi" id="fk_prodi" required>
                                <option value="">Choose...</option>
                                <?php foreach ($all_prodi as $key => $prodi):?>
                                <option value="<?=$prodi['id_prodi']?>"><?=$prodi['nama_prodi']?></option>
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
<div class="modal fade" id="editMahasiswa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="row g-3 needs-validation" action="<?=base_url('masterdata/update_mahasiswa')?>" method="post">
                <div class="modal-body">
                    <div class="p-3">
                        <div class="mb-3">
                            <label for="nim" class="form-label">NIM</label>
                            <input type="text" readonly name="nim" class="form-control" id="nim" required>
                            <input type="hidden" name="id_mahasiswa" class="form-control" id="id" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="nama_mahasiswa" class="form-label">Nama</label>
                            <input type="text" name="nama_mahasiswa" class="form-control" id="nama_mahasiswa" required>
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
                            <label for="fk_prodi" class="form-label">Prodi</label>
                            <select class="form-select" name="fk_prodi" id="fk_prodi" required>
                                <option value="">Choose...</option>
                                <?php foreach ($all_prodi as $key => $prodi):?>
                                <option value="<?=$prodi['id_prodi']?>"><?=$prodi['nama_prodi']?></option>
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
<div class="modal fade" id="hapusMahasiswa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Konfirmasi Hapus</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="row g-3" action="<?=base_url('masterdata/delete_mahasiswa')?>" method="post">
                <div class="modal-body">
                    <div class="p-3">
                        <div class="mb-3">
                            <label for="id" class="form-label">Anda yakin ingin menghapus <strong
                                    id="nama_mahasiswa"></strong> ?</label>
                            <input type="hidden" id="id" name="id_mahasiswa">
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

    const id = button.getAttribute('data-id');
    const fk_prodi = button.getAttribute('data-fk_prodi');
    const nim = button.getAttribute('data-nim');
    const nama_mahasiswa = button.getAttribute('data-nama_mahasiswa');
    const jenis_kelamin = button.getAttribute('data-jenis_kelamin');

    // Update the modal's content
    const modalId = editMahasiswa.querySelector('#id');
    const modalFkProdi = editMahasiswa.querySelector('#fk_prodi');
    const modalNim = editMahasiswa.querySelector('#nim');
    const modalNama = editMahasiswa.querySelector('#nama_mahasiswa');
    const modalJenisKelamin = editMahasiswa.querySelector('#jenis_kelamin');

    modalId.value = id;
    modalFkProdi.value = fk_prodi;
    modalNim.value = nim;
    modalNama.value = nama_mahasiswa;
    modalJenisKelamin.value = jenis_kelamin;
});


// ============== Hapus =======================
const hapusMahasiswa = document.getElementById('hapusMahasiswa');
hapusMahasiswa.addEventListener('show.bs.modal', function(event) {
    // Button that triggered the modal
    const button = event.relatedTarget;

    const id = button.getAttribute('data-id');
    const nama_mahasiswa = button.getAttribute('data-nama_mahasiswa');

    // Update the modal's content
    const modalIdData = hapusMahasiswa.querySelector('#id');
    const modalNamaMahasiswa = hapusMahasiswa.querySelector('#nama_mahasiswa');

    modalIdData.value = id;
    modalNamaMahasiswa.textContent = nama_mahasiswa;
});
</script>