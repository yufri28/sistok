<script>
let table = new DataTable('#table', {
    scrollX: true,
    scrollY: true
});

$('#addPengambilan').on('shown.bs.modal', () => {
    $('[data-control="select2"]').select2({
        dropdownParent: $('#addPengambilan')
    });
});
$('#editPengambilan').on('shown.bs.modal', () => {
    $('[data-control="select2"]').select2({
        dropdownParent: $('#addPengambilan')
    });
});
</script>