<!-- begin::Alert -->
<?php if ($this->session->flashdata('success')): ?>
<script>
var successfuly = '<?= $this->session->flashdata('success'); ?>';
Swal.fire({
    title: 'Sukses!',
    text: successfuly,
    icon: 'success',
    confirmButtonText: 'OK'
}).then(function(result) {
    if (result.isConfirmed) {
        // window.location.href = '';
        window.location.reload();

    }
});
</script>
<?php $this->session->unset_userdata('success'); // Menghapus session setelah ditampilkan ?>
<?php endif; ?>

<?php if ($this->session->flashdata('error')): ?>
<script>
Swal.fire({
    title: 'Error!',
    text: '<?= $this->session->flashdata('error'); ?>',
    icon: 'error',
    confirmButtonText: 'OK'
}).then(function(result) {
    if (result.isConfirmed) {
        // window.location.href = '';
        window.location.reload();
    }
});
</script>
<?php $this->session->unset_userdata('error'); // Menghapus session setelah ditampilkan ?>
<?php endif; ?>
<!-- end::Alert -->
<div class="py-6 px-6 text-center">
    <p class="mb-0 fs-4">Design and Developed by <a href="#" target="_blank"
            class="pe-1 text-primary text-decoration-underline">MSTI</a></p>
</div>
</div>
</div>
</div>

<script src="<?=base_url()?>assets/libs/jquery/dist/jquery.min.js"></script>
<script src="<?=base_url()?>assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<!-- <script src="<?=base_url()?>assets/js/sidebarmenu.js"></script> -->
<script src="<?=base_url()?>assets/js/app.min.js"></script>
<!-- <script src="<?=base_url()?>assets/libs/apexcharts/dist/apexcharts.min.js"></script> -->
<script src="<?=base_url()?>assets/libs/simplebar/dist/simplebar.js"></script>
<!-- <script src="<?=base_url()?>assets/js/dashboard.js"></script> -->
<script src="https://cdn.datatables.net/2.1.3/js/dataTables.min.js"></script>
<!-- begin::Select2 -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<!-- end::Select2 -->
</body>

</html>