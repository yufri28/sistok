<div class="row">
    <div class="d-flex align-items-stretch">
        <div class="card w-100 p-4">
            <div class="d-flex">
                <h5 class="card-title fw-semibold mb-4">TAHUN AJARAN</h5>
                <button type="button" data-bs-toggle="modal" data-bs-target="#addTahunAjar"
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
                                    <h6 class="fw-semibold mb-0">Kode Tahun Ajaran
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Tahun Ajaran</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Deskripsi</h6>
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
                                    <h6 class="fw-semibold mb-1">20242</h6>
                                </td>
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-1">2024-2025</h6>
                                </td>
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-1">Lorem ipsum dolor sit amet consectetur adipisicing
                                        elit. Deleniti, voluptatem...</h6>
                                </td>
                                <td class="border-bottom-0">
                                    <button type="button" data-bs-target="#editTahunAjar" data-bs-toggle="modal"
                                        data-kode_ta="20251" data-ta="2024-2025" data-deskripsi="2" data-id="1"
                                        class="btn btn-primary btn-sm">
                                        Edit
                                    </button>
                                    <button type="button" data-bs-target="#hapusTahunAjar" data-bs-toggle="modal"
                                        class="btn btn-danger btn-sm" data-id="1" data-ta="2024-2025">
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
<div class="modal fade" id="addTahunAjar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="row g-3 needs-validation" action="#" method="post">
                <div class="modal-body">
                    <div class="p-3">
                        <div class="mb-3">
                            <label for="kode_tahun_ajar" class="form-label">Kode Tahun Ajar</label>
                            <input type="text" name="kode_tahun_ajar" class="form-control" id="kode_tahun_ajar"
                                required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="tahun_ajar" class="form-label">Tahun Ajar</label>
                            <input type="text" name="tahun_ajar" class="form-control" id="tahun_ajar" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea name="" class="form-control" id="deskripsi"></textarea>
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
<div class="modal fade" id="editTahunAjar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="row g-3 needs-validation" action="#" method="post">
                <div class="modal-body">
                    <div class="p-3">
                        <div class="mb-3">
                            <label for="kode_tahun_ajar" class="form-label">Kode Tahun Ajar</label>
                            <input type="hidden" name="id_tahun_ajar" class="form-control" id="id_tahun_ajar" required>
                            <input type="text" name="kode_tahun_ajar" class="form-control" id="kode_tahun_ajar"
                                required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="tahun_ajar" class="form-label">Tahun Ajar</label>
                            <input type="text" name="tahun_ajar" class="form-control" id="tahun_ajar" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea name="" class="form-control" id="deskripsi"></textarea>
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
<div class="modal fade" id="hapusTahunAjar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Konfirmasi Hapus</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="row g-3" action="#" method="post">
                <div class="modal-body">
                    <div class="p-3">
                        <div class="mb-3">
                            <label for="id_tahun_ajar" class="form-label">Anda yakin ingin menghapus tahun ajar <strong
                                    id="nama_ta"></strong> ?</label>
                            <input type="hidden" id="id_tahun_ajar" name="id_tahun_ajar">
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
const editTahunAjar = document.getElementById('editTahunAjar');
editTahunAjar.addEventListener('show.bs.modal', function(event) {
    // Button that triggered the modal
    const button = event.relatedTarget;
    const kode_ta = button.getAttribute('data-kode_ta');
    const ta = button.getAttribute('data-ta');
    const deskripsi = button.getAttribute('data-deskripsi');
    const id_ta = button.getAttribute('data-id');

    // Update the modal's content
    const modalIdTA = editTahunAjar.querySelector('#id_tahun_ajar');
    const modalTa = editTahunAjar.querySelector('#tahun_ajar');
    const modalKodeTA = editTahunAjar.querySelector('#kode_tahun_ajar');
    const modalDeskripsi = editTahunAjar.querySelector('#deskripsi');

    modalIdTA.value = id_ta;
    modalTa.value = ta;
    modalKodeTA.value = kode_ta;
    modalDeskripsi.value = deskripsi;
});


// ============== Hapus =======================
const hapusTahunAjar = document.getElementById('hapusTahunAjar');
hapusTahunAjar.addEventListener('show.bs.modal', function(event) {
    // Button that triggered the modal
    const button = event.relatedTarget;

    const id = button.getAttribute('data-id');
    const nama_ta = button.getAttribute('data-ta');

    // Update the modal's content
    const modalIdTA = hapusTahunAjar.querySelector('#id_tahun_ajar');
    const modalNamaTA = hapusTahunAjar.querySelector('#nama_ta');

    modalIdTA.value = id;
    modalNamaTA.textContent = nama_ta;
});
</script>