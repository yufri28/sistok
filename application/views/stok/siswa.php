<div class="row">
    <div class="d-flex align-items-stretch">
        <div class="card w-100 p-4">
            <div class="d-flex flex-column flex-lg-row align-items-lg-center">
                <h5 class="card-title fw-semibold mb-4">STOK SISWA</h5>
                <div class="d-flex col-lg-3 ms-lg-auto me-lg-2 mb-3 mb-lg-0 align-items-center">
                    <label for="filter-unit" class="me-2 text-nowrap">Unit:</label>
                    <select id="filter-unit" class="form-select">
                        <option value="">Choose...</option>
                        <option value="SDK Citra Bangsa">SDK Citra Bangsa</option>
                        <option value="SMPK Citra Bangsa">SMPK Citra Bangsa
                        </option>
                        <option value="SMAK Citra Bangsa">SMAK Citra Bangsa</option>
                    </select>
                </div>
                <div class="d-flex justify-content-center ms-lg-2">
                    <button type="button" data-bs-toggle="modal" data-bs-target="#addSiswa" class="btn btn-primary">
                        Tambah Data
                    </button>
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
                                    <h6 class="fw-semibold mb-0">Unit</h6>
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
                            <tr>
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">1.</h6>
                                </td>
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-1">Seragam Olahraga</h6>
                                </td>
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-1">SDK Citra Bangsa</h6>
                                </td>
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-1">L</h6>
                                </td>
                                <td class="border-bottom-0 text-center">
                                    <h6 class="fw-semibold mb-1">70</h6>
                                </td>
                                <td class="border-bottom-0">
                                    <button type="button" data-bs-target="#editMahasiswa" data-bs-toggle="modal"
                                        data-ta="20251" data-semester="Semester 1" data-kelas="2" data-nis="5142677"
                                        data-nama_mahasiswa="Andrew McDownland" data-typestok="Seragam Yayasan"
                                        data-ukuran="L" data-id="42" class="btn btn-primary btn-sm">
                                        Edit
                                    </button>
                                    <button type="button" data-bs-target="#hapusMahasiswa" data-bs-toggle="modal"
                                        class="btn btn-danger btn-sm" data-id_data="1">
                                        Hapus</button>
                                </td>
                            </tr>
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
<div class="modal fade" id="editSiswa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="row g-3 needs-validation" name="kmf-contact-form" novalidate>
                <div class="modal-body">
                    <div class="p-3">
                        <div class="mb-3">
                            <label for="tahun_ajar" class="form-label">Tahun Ajar</label>
                            <input type="hidden" name="id_data" class="form-control" id="id_data" required>
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
<div class="modal fade" id="hapusSiswa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Konfirmasi Hapus</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="row g-3" name="hapus-form">
                <div class="modal-body">
                    <div class="p-3">
                        <div class="mb-3">
                            <label for="id_data" class="form-label">Anda yakin ingin menghapus ?</label>
                            <input type="hidden" id="id_data" name="id_data">
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
const editSiswa = document.getElementById('editSiswa');
editSiswa.addEventListener('show.bs.modal', function(event) {
    // Button that triggered the modal
    const button = event.relatedTarget;

    const id = button.getAttribute('data-id');
    const ta = button.getAttribute('data-ta');
    const semester = button.getAttribute('data-semester');
    const kelas = button.getAttribute('data-kelas');
    const nis = button.getAttribute('data-nis');
    const typestok = button.getAttribute('data-typestok');
    const ukuran = button.getAttribute('data-ukuran');
    const nama_siswa = button.getAttribute('data-nama_siswa');

    // Update the modal's content
    const modalIdData = editSiswa.querySelector('#id_data');
    const modalTa = editSiswa.querySelector('#tahun_ajar');
    const modalSemester = editSiswa.querySelector('#semester');
    const modalKelas = editSiswa.querySelector('#kelas');
    const modalNis = editSiswa.querySelector('#nis');
    const modalTypestok = editSiswa.querySelector('#type_stok');
    const modalUkuran = editSiswa.querySelector('#ukuran');
    const modalNamaSiswa = editSiswa.querySelector('#nama_siswa');

    modalIdData.value = id;
    modalTa.value = ta;
    modalSemester.value = semester;
    modalKelas.value = kelas;
    modalNis.value = nis;
    modalTypestok.value = typestok;
    modalUkuran.value = ukuran;
    modalNamaSiswa.value = nama_siswa;
});


// ============== Hapus =======================
const hapusSiswa = document.getElementById('hapusSiswa');
hapusSiswa.addEventListener('show.bs.modal', function(event) {
    // Button that triggered the modal
    const button = event.relatedTarget;

    const id_data = button.getAttribute('data-id_data');

    // Update the modal's content
    const modalIdData = hapusSiswa.querySelector('#id_data');

    modalIdData.value = id_data;
});
</script>