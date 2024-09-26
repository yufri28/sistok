<div class="row">
    <div class="d-flex align-items-stretch">
        <div class="card w-100 p-4">
            <div class="d-flex flex-column flex-lg-row align-items-lg-center">
                <h5 class="card-title fw-semibold mb-4">PERMINTAAN STOK SISWA</h5>
                <?php if($this->session->userdata('role') == 'administrator' || $this->session->userdata('role') == 'admin_s' || $this->session->userdata('role') == 'admin'):?>
                <div class="d-flex col-lg-3 ms-lg-auto me-lg-2 mb-3 mb-lg-0 align-items-center">
                    <label for="filter-status" class="me-2 text-nowrap">Status:</label>
                    <select id="filter-status" class="form-select">
                        <option value="">Choose...</option>
                        <option value="PER0">Belum diajukan</option>
                        <option value="PER1">Diajukan</option>
                    </select>
                </div>
                <div class="d-flex justify-content-center ms-lg-2">
                    <button type="button" id="ajukan-barang-siswa" class="btn btn-secondary me-2">
                        Ajukan
                    </button>
                    <button type="button" data-bs-toggle="modal" data-bs-target="#addRestok" class="btn btn-primary">
                        Tambah Data
                    </button>
                </div>
                <?php endif;?>
                <?php if($this->session->userdata('role') == 'keuangan'):?>
                <div class="d-flex justify-content-center ms-lg-auto">
                    <button type="button" id="order-barang-siswa" class="btn btn-secondary me-2">
                        Order
                    </button>
                </div>
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
                                <?php if($this->session->userdata('role') == 'administrator' || $this->session->userdata('role') == 'admin' || $this->session->userdata('role') == 'keuangan'):?>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Pilih</h6>
                                </th>
                                <?php endif;?>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Tanggal Permintaan</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Status</h6>
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
                                    <h6 class="fw-semibold mb-0">Jumlah</h6>
                                </th>
                                <th hidden class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0"></h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Aksi</h6>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 0;?>
                            <?php foreach ($all_siswa as $key => $siswa):?>
                            <?php $status = '';?>
                            <?php switch ($siswa['status']) {
                                        case 'PER0':
                                            $status = "<span class='badge bg-success rounded-3 fw-semibold'>Belum diajukan</span>";
                                            break;
                                        case 'PER1':
                                            $status = "<span class='badge bg-warning rounded-3 fw-semibold'>Diajukan</span>";
                                            break;
                                        case 'PEM0':
                                            $status = "<span class='badge bg-secondary rounded-3 fw-semibold'>Diproses</span>";
                                            break;
                                        case 'PEM1':
                                            $status = "<span class='badge bg-primary rounded-3 fw-semibold'>Dipesan</span>";
                                            break;
                                    }?>
                            <tr>
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0"><?=++$i?>.</h6>
                                </td>
                                <?php if($this->session->userdata('role') == 'administrator' || $this->session->userdata('role') == 'admin' || $this->session->userdata('role') == 'keuangan'):?>
                                <td class="border-bottom-0">
                                    <div class="form-check">
                                        <input class="form-check-input"
                                            <?=$siswa['status'] == 'PER1' || $siswa['status'] == 'PEM1' ? 'disabled' : '';?>
                                            style="border: 1px solid black;" type="checkbox"
                                            value="<?=$siswa['id_restok'];?>" name="id_restok[]" id="checkbox">
                                    </div>
                                </td>
                                <?php endif;?>
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-1"><?=formatdate($siswa['tanggal']);?></h6>
                                </td>
                                <td class="border-bottom-0">
                                    <div class="d-flex align-items-center gap-2">
                                        <?= $status;?>
                                    </div>
                                </td>
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-1"><?=$siswa['nama_typestok'];?></h6>
                                </td>
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-1"><?=$siswa['nama_unit'];?></h6>
                                </td>
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-1"><?=$siswa['nama_ukuran'];?></h6>
                                </td>
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-1"><?=$siswa['jumlah_stok'];?></h6>
                                </td>
                                <td hidden><?=$siswa['status']?></td>
                                <td class="border-bottom-0">
                                    <?php if($this->session->userdata('role') == 'administrator' || $this->session->userdata('role') == 'admin' || $this->session->userdata('role') == 'keuangan'):?>
                                    <?php if(($siswa['status'] == 'PER0' || $this->session->userdata('role') == 'keuangan') && $siswa['status'] != 'PEM1'):?>
                                    <button type="button" data-bs-target="#editRestok" data-bs-toggle="modal"
                                        data-id_restok="<?=$siswa['id_restok'];?>"
                                        data-fk_typestok="<?=$siswa['fk_typestok'];?>"
                                        data-fk_unit="<?=$siswa['fk_unit'];?>"
                                        data-fk_ukuran="<?=$siswa['fk_ukuran'];?>"
                                        data-jumlah_stok="<?=$siswa['jumlah_stok'];?>" class="btn btn-primary btn-sm">
                                        Edit
                                    </button>
                                    <?php endif;?>
                                    <?php if($siswa['status'] != 'PEM1'):?>
                                    <button type="button" data-bs-target="#hapusRestok" data-bs-toggle="modal"
                                        class="btn btn-danger btn-sm" data-id_restok="<?=$siswa['id_restok'];?>"
                                        data-nama_typestok="<?=$siswa['nama_typestok'];?>"
                                        data-nama_unit="<?=$siswa['nama_unit'];?>"
                                        data-tanggal="<?=formatdate($siswa['tanggal']);?>"
                                        data-nama_ukuran="<?=$siswa['nama_ukuran'];?>">
                                        Hapus</button>
                                    <?php else:?>
                                    <button type="button" class="btn btn-dark btn-sm">
                                        No action</button>
                                    <?php endif;?>

                                    <?php else:?>
                                    <?php if($siswa['status'] == 'PER1'):?>
                                    <button type="button" data-bs-target="#konfirPersetujuan" data-bs-toggle="modal"
                                        class="btn btn-primary btn-sm" data-id_restok="<?=$siswa['id_restok'];?>"
                                        data-nama_typestok="<?=$siswa['nama_typestok'];?>"
                                        data-nama_unit="<?=$siswa['nama_unit'];?>"
                                        data-tanggal="<?=formatdate($siswa['tanggal']);?>"
                                        data-nama_ukuran="<?=$siswa['nama_ukuran'];?>">
                                        Setujui</button>
                                    <?php else:?>
                                    <button type="button" class="btn btn-dark btn-sm">
                                        No action</button>
                                    <?php endif;?>
                                    <?php endif;?>
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
<div class="modal fade" id="addRestok" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="row g-3 needs-validation" action="<?=base_url('permintaan/add_restok_siswa');?>" method="post">
                <div class="modal-body">
                    <div class="p-3">
                        <div class="mb-3">
                            <label for="fk_typestok" class="form-label">Type Stok</label>
                            <select class="form-select" name="fk_typestok" id="fk_typestok" required>
                                <option value="">Choose...</option>
                                <?php foreach ($all_typestok as $key => $typestok):?>
                                <option value="<?=$typestok['id_typestok'];?>"><?=$typestok['nama_typestok'];?></option>
                                <?php endforeach;?>
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
                        <div class="mb-3">
                            <label for="fk_ukuran" class="form-label">Ukuran</label>
                            <select class="form-select" name="fk_ukuran" id="fk_ukuran" required>
                                <option value="">Choose...</option>
                                <?php foreach ($all_ukuran as $key => $ukuran):?>
                                <option value="<?=$ukuran['id_ukuran'];?>"><?=$ukuran['nama_ukuran'];?></option>
                                <?php endforeach;?>
                            </select>
                            <div class="invalid-feedback">
                                Please select a valid state.
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="jumlah_stok" class="form-label">Jumlah Stok</label>
                            <input type="number" name="jumlah_stok" class="form-control" id="jumlah_stok" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="editRestok" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="row g-3 needs-validation" action="<?=base_url('permintaan/update_restok_siswa');?>"
                method="post">
                <div class="modal-body">
                    <div class="p-3">
                        <div class="mb-3">
                            <input type="hidden" name="id_restok" class="form-control" id="id_restok" required>
                        </div>
                        <div class="mb-3">
                            <label for="fk_typestok" class="form-label">Type Stok</label>
                            <select disabled class="form-select" name="fk_typestok" id="fk_typestok" required>
                                <option value="">Choose...</option>
                                <?php foreach ($all_typestok as $key => $typestok):?>
                                <option value="<?=$typestok['id_typestok'];?>"><?=$typestok['nama_typestok'];?></option>
                                <?php endforeach;?>
                            </select>
                            <div class="invalid-feedback">
                                Please select a valid state.
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="fk_unit" class="form-label">Unit</label>
                            <select disabled class="form-select" name="fk_unit" id="fk_unit" required>
                                <option value="">Choose...</option>
                                <?php foreach ($all_unit as $key => $unit):?>
                                <option value="<?=$unit['id_unit'];?>"><?=$unit['nama_unit'];?></option>
                                <?php endforeach;?>
                            </select>
                            <div class="invalid-feedback">
                                Please select a valid state.
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="fk_ukuran" class="form-label">Ukuran</label>
                            <select disabled class="form-select" name="fk_ukuran" id="fk_ukuran" required>
                                <option value="">Choose...</option>
                                <?php foreach ($all_ukuran as $key => $ukuran):?>
                                <option value="<?=$ukuran['id_ukuran'];?>"><?=$ukuran['nama_ukuran'];?></option>
                                <?php endforeach;?>
                            </select>
                            <div class="invalid-feedback">
                                Please select a valid state.
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="jumlah_stok" class="form-label">Jumlah Stok</label>
                            <input type="number" name="jumlah_stok" class="form-control" id="jumlah_stok" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                            <small><strong>Anda hanya bisa mengubah jumlah stok.</strong></small>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="hapusRestok" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Konfirmasi Hapus</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="row g-3" action="<?=base_url('permintaan/delete_restok_siswa');?>" method="post">
                <div class="modal-body">
                    <div class="p-3">
                        <div class="mb-3">
                            <label for="id_restok" class="form-label">Anda yakin ingin menghapus<strong
                                    id="content"></strong> ?</label>
                            <input type="hidden" id="id_restok" name="id_restok">
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

<div class="modal fade" id="konfirPersetujuan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Konfirmasi Persetujuan</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="row g-3" action="<?=base_url('permintaan/update_restok_siswa');?>" method="post">
                <div class="modal-body">
                    <div class="p-3">
                        <div class="mb-3">
                            <label for="id_restok" class="form-label">Anda yakin ingin menyetujui permintaan <strong
                                    id="content"></strong> ?</label>
                            <input type="hidden" id="id_restok" name="id_restok">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Ya</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
// ================== Edit ========================
const editRestok = document.getElementById('editRestok');
editRestok.addEventListener('show.bs.modal', function(event) {
    // Button that triggered the modal
    const button = event.relatedTarget;

    const id_restok = button.getAttribute('data-id_restok');
    const fk_typestok = button.getAttribute('data-fk_typestok');
    const fk_unit = button.getAttribute('data-fk_unit');
    const fk_ukuran = button.getAttribute('data-fk_ukuran');
    const jumlah_stok = button.getAttribute('data-jumlah_stok');

    // Update the modal's content
    const modalIdRestok = editRestok.querySelector('#id_restok');
    const modalFkTypestok = editRestok.querySelector('#fk_typestok');
    const modalFkUnit = editRestok.querySelector('#fk_unit');
    const modalFkUkuran = editRestok.querySelector('#fk_ukuran');
    const modalJumlahStok = editRestok.querySelector('#jumlah_stok');

    modalIdRestok.value = id_restok;
    modalFkTypestok.value = fk_typestok;
    modalFkUnit.value = fk_unit;
    modalFkUkuran.value = fk_ukuran;
    modalJumlahStok.value = jumlah_stok;
});


// ============== Hapus =======================
const hapusRestok = document.getElementById('hapusRestok');
hapusRestok.addEventListener('show.bs.modal', function(event) {
    // Button that triggered the modal
    const button = event.relatedTarget;

    const id_restok = button.getAttribute('data-id_restok');
    const nama_typestok = button.getAttribute('data-nama_typestok');
    const nama_unit = button.getAttribute('data-nama_unit');
    const nama_ukuran = button.getAttribute('data-nama_ukuran');
    const tanggal = button.getAttribute('data-tanggal');

    // Update the modal's content
    const modalIdData = hapusRestok.querySelector('#id_restok');
    const modalKonten = hapusRestok.querySelector('#content');

    modalIdData.value = id_restok;
    modalKonten.textContent =
        ` Permintaan ${nama_typestok} ukuran ${nama_ukuran} untuk unit ${nama_unit} pada tanggal ${tanggal}`;
});


// ============== Konfirmasi Persetujuan =======================
const konfirPersetujuan = document.getElementById('konfirPersetujuan');
konfirPersetujuan.addEventListener('show.bs.modal', function(event) {
    // Button that triggered the modal
    const button = event.relatedTarget;

    const id_restok = button.getAttribute('data-id_restok');
    const nama_typestok = button.getAttribute('data-nama_typestok');
    const nama_unit = button.getAttribute('data-nama_unit');
    const nama_ukuran = button.getAttribute('data-nama_ukuran');
    const tanggal = button.getAttribute('data-tanggal');

    // Update the modal's content
    const modalIdData = konfirPersetujuan.querySelector('#id_restok');
    const modalKonten = konfirPersetujuan.querySelector('#content');

    modalIdData.value = id_restok;
    modalKonten.textContent =
        ` Permintaan ${nama_typestok} ukuran ${nama_ukuran} untuk unit ${nama_unit} pada tanggal ${tanggal}`;
});
</script>