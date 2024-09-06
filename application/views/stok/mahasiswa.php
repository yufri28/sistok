<div class="row">
    <div class="d-flex align-items-stretch">
        <div class="card w-100 p-4">
            <div class="d-flex flex-column flex-lg-row align-items-lg-center">
                <h5 class="card-title fw-semibold mb-4">STOK MAHASISWA</h5>
                <div class="d-flex col-lg-3 ms-lg-auto me-lg-2 mb-3 mb-lg-0 align-items-center">
                    <label for="filter-prodi" class="me-2 text-nowrap">Prodi:</label>
                    <select id="filter-prodi" class="form-select">
                        <option value="">Choose...</option>
                        <?php foreach ($all_prodi as $key => $prodi):?>
                        <option value="<?=$prodi['nama_prodi'];?>"><?=$prodi['nama_prodi'];?></option>
                        <?php endforeach;?>
                    </select>
                </div>
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
                                    <h6 class="fw-semibold mb-0">Type Stok</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Prodi</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Ukuran</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Jumlah Tersedia</h6>
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
                                    <h6 class="fw-semibold mb-0"><?=++$i;?></h6>
                                </td>
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-1"><?=$mahasiswa['nama_typestok'];?></h6>
                                </td>
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-1"><?=$mahasiswa['nama_prodi'];?></h6>
                                </td>
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-1"><?=$mahasiswa['nama_ukuran'];?></h6>
                                </td>
                                <td class="border-bottom-0 text-center">
                                    <h6 class="fw-semibold mb-1"><?=$mahasiswa['jumlah_stok'];?></h6>
                                </td>
                                <td class="border-bottom-0">
                                    <button type="button" data-bs-target="#hapusStok" data-bs-toggle="modal"
                                        class="btn btn-danger btn-sm" data-id_stok="<?=$mahasiswa['id_stok_mhs'];?>"
                                        data-nama_typestok="<?=$mahasiswa['nama_typestok'];?>"
                                        data-nama_prodi="<?=$mahasiswa['nama_prodi'];?>"
                                        data-nama_ukuran="<?=$mahasiswa['nama_ukuran'];?>">
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
            <form class="row g-3 needs-validation" name="kmf-contact-form" novalidate>
                <div class="modal-body">
                    <div class="p-3">
                        <div class="mb-3">
                            <label for="tahun_ajar" class="form-label">Tahun Ajar</label>
                            <input type="text" name="tahun_ajar" class="form-control" id="tahun_ajar" required>
                            <div class="valid-feedback">
                                Looks good!
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
                            <label for="nis" class="form-label">NIS</label>
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
                            <label for="kelas" class="form-label">Kelas</label>
                            <input type="text" name="kelas" class="form-control" id="kelas" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="type_stok" class="form-label">Type Stok</label>
                            <select class="form-select" name="type_stok" id="type_stok" required>
                                <option value="">Choose...</option>
                                <option value="Seragam Yayasan">Seragam Yayasan</option>
                                <option value="Seragam Merah Putih">Seragam Merah Putih</option>
                                <option value="Olahraga">Olahraga</option>
                            </select>
                            <div class="invalid-feedback">
                                Please select a valid state.
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="ukuran" class="form-label">Ukuran</label>
                            <input type="text" name="ukuran" class="form-control" id="ukuran" required>
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
<div class="modal fade" id="hapusStok" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Konfirmasi Hapus</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="row g-3" action="<?=base_url('stok/delete_stok_mahasiswa');?>" method="post">
                <div class="modal-body">
                    <div class="p-3">
                        <div class="mb-3">
                            <label for="id_stok" class="form-label">Anda yakin ingin menghapus<strong
                                    id="content"></strong> ?</label>
                            <input type="hidden" id="id_stok" name="id_stok">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
// ============== Hapus =======================
const hapusStok = document.getElementById('hapusStok');
hapusStok.addEventListener('show.bs.modal', function(event) {
    // Button that triggered the modal
    const button = event.relatedTarget;

    const id_stok = button.getAttribute('data-id_stok');
    const nama_typestok = button.getAttribute('data-nama_typestok');
    const nama_prodi = button.getAttribute('data-nama_prodi');
    const nama_ukuran = button.getAttribute('data-nama_ukuran');

    // Update the modal's content
    const modalIdData = hapusStok.querySelector('#id_stok');
    const modalKonten = hapusStok.querySelector('#content');

    modalIdData.value = id_stok;
    modalKonten.textContent =
        ` Stok ${nama_typestok} ukuran ${nama_ukuran} untuk prodi ${nama_prodi}`;
});
</script>