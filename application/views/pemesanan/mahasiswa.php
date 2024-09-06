<div class="row">
    <div class="d-flex align-items-stretch">
        <div class="card w-100 p-4">
            <div class="d-flex flex-column flex-lg-row align-items-lg-center">
                <h5 class="card-title fw-semibold mb-4">PEMESANAN STOK MAHASISWA</h5>
                <?php if($this->session->userdata('role') == 'administrator' || $this->session->userdata('role') == 'admin'):?>
                <div class="d-flex justify-content-center ms-lg-auto">
                    <button type="button" id="masuk_gudang" class="btn btn-secondary me-2">
                        Masuk Gudang
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
                                <?php if($this->session->userdata('role') == 'administrator' || $this->session->userdata('role') == 'admin'):?>
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
                                    <h6 class="fw-semibold mb-0">Prodi</h6>
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
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 0;?>
                            <?php foreach ($all_mahasiswa as $key => $mahasiswa):?>
                            <?php $status = '';?>
                            <?php switch ($mahasiswa['status']) {
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
                                        case 'Selesai':
                                            $status = "<span class='badge bg-dark rounded-3 fw-semibold'>Selesai</span>";
                                            break;
                                    }?>
                            <tr>
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0"><?=++$i?>.</h6>
                                </td>
                                <?php if($this->session->userdata('role') == 'administrator' || $this->session->userdata('role') == 'admin'):?>
                                <td class="border-bottom-0">
                                    <div class="form-check">
                                        <input <?=$mahasiswa['status'] == 'Selesai'?'disabled':'';?>
                                            class="form-check-input" style="border: 1px solid black;" type="checkbox"
                                            value="<?=$mahasiswa['id_restok'];?>" name="id_restok[]" id="checkbox">
                                    </div>
                                </td>
                                <?php endif;?>
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-1"><?=formatdate($mahasiswa['tanggal']);?></h6>
                                </td>
                                <td class="border-bottom-0">
                                    <div class="d-flex align-items-center gap-2">
                                        <?= $status;?>
                                    </div>
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
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-1"><?=$mahasiswa['jumlah_stok'];?></h6>
                                </td>
                                <td hidden><?=$mahasiswa['status']?></td>
                            </tr>
                            <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>