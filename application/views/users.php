<div class="row">
    <div class="d-flex align-items-stretch">
        <div class="card w-100 p-4">
            <div class="d-flex flex-column flex-lg-row align-items-lg-center">
                <h5 class="card-title fw-semibold mb-4">USERS</h5>
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
                    <button type="button" data-bs-toggle="modal" data-bs-target="#addUser" class="btn btn-primary">
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
                                    <h6 class="fw-semibold mb-0">Nama</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Username</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Role</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Aksi</h6>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 0;?>
                            <?php foreach ($data_user as $key => $user):?>
                            <tr>
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0"><?=++$i;?> .</h6>
                                </td>
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-1"><?=$user['name'];?></h6>
                                </td>
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-1"><?=$user['username'];?></h6>
                                </td>
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-1"><?=$user['role'];?></h6>
                                </td>
                                <td class="border-bottom-0">
                                    <button type="button" data-bs-target="#editUser" data-bs-toggle="modal"
                                        data-id="<?=$user['id_user']?>" data-name="<?=$user['name']?>"
                                        data-username="<?=$user['username']?>" data-aktifitas="<?=$user['aktifitas']?>"
                                        data-role="<?=$user['role']?>" class="btn btn-primary btn-sm">
                                        Edit
                                    </button>
                                    <button type="button" data-bs-target="#hapusUser" data-bs-toggle="modal"
                                        class="btn btn-danger btn-sm" data-id="<?=$user['id_user']?>"
                                        data-name="<?=$user['name']?>">
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
<div class="modal fade" id="addUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="row g-3" method="post" action="<?=base_url('users/save_add');?>">
                <div class="modal-body">
                    <div class="p-3">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" name="name" class="form-control" id="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" name="username" class="form-control" id="username" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="text" name="password" class="form-control" id="password" required>
                        </div>
                        <div class="mb-3">
                            <label for="role" class="form-label">Role</label>
                            <select class="form-select" name="role" id="role" required>
                                <option value="">Choose...</option>
                                <option value="admin">Admin</option>
                                <option value="logistik">Logistik</option>
                                <option value="keuangan">Keuangan</option>
                                <option value="user">User Biasa</option>
                            </select>
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
<div class="modal fade" id="editUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="row g-3" method="post" action="<?=base_url('users/save_edit');?>">
                <div class="modal-body">
                    <div class="p-3">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama<small class="text-danger">*</small></label>
                            <input type="hidden" name="user_id" class="form-control" id="user_id" required>
                            <input type="text" name="name" class="form-control" id="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label">Username<small
                                    class="text-danger">*</small></label>
                            <input type="text" name="username" class="form-control" id="username" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password <small>(Optional)</small></label>
                            <input type="text" name="password" class="form-control" id="password">
                        </div>
                        <div class="mb-3">
                            <label for="role" class="form-label">Role<small class="text-danger">*</small></label>
                            <select class="form-select" name="role" id="role" required>
                                <option value="">Choose...</option>
                                <option value="admin">Admin</option>
                                <option value="logistik">Logistik</option>
                                <option value="keuangan">Keuangan</option>
                                <option value="user">User Biasa</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="aktifitas" class="form-label">Aktifitas<small
                                    class="text-danger">*</small></label>
                            <select class="form-select" name="aktifitas" id="aktifitas" required>
                                <option value="">Choose...</option>
                                <option value="aktif">Aktif</option>
                                <option value="nonaktif">Nonaktif</option>
                            </select>
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
<div class="modal fade" id="hapusUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Konfirmasi Hapus</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="row g-3" method="post" action="<?=base_url('users/delete');?>">
                <div class="modal-body">
                    <div class="p-3">
                        <div class="mb-3">
                            <label for="user_id" class="form-label">Anda yakin ingin menghapus <strong
                                    id="name"></strong> ?</label>
                            <input type="hidden" id="user_id" name="user_id">
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
// ================== Edit ========================
const editUser = document.getElementById('editUser');
editUser.addEventListener('show.bs.modal', function(event) {
    // Button that triggered the modal
    const button = event.relatedTarget;

    const id = button.getAttribute('data-id');
    const name = button.getAttribute('data-name');
    const username = button.getAttribute('data-username');
    const role = button.getAttribute('data-role');
    const aktifitas = button.getAttribute('data-aktifitas');

    // Update the modal's content
    const modalIdUser = editUser.querySelector('#user_id');
    const modalName = editUser.querySelector('#name');
    const modalUsername = editUser.querySelector('#username');
    const modalRole = editUser.querySelector('#role');
    const modalAktifitas = editUser.querySelector('#aktifitas');

    modalIdUser.value = id;
    modalName.value = name;
    modalUsername.value = username;
    modalRole.value = role;
    modalAktifitas.value = aktifitas;
});


// ============== Hapus =======================
const hapusUser = document.getElementById('hapusUser');
hapusUser.addEventListener('show.bs.modal', function(event) {
    // Button that triggered the modal
    const button = event.relatedTarget;

    const id = button.getAttribute('data-id');
    const name = button.getAttribute('data-name');

    // Update the modal's content
    const modalIdData = hapusUser.querySelector('#user_id');
    const modalName = hapusUser.querySelector('#name');

    modalIdData.value = id;
    modalName.textContent = name;
});
</script>