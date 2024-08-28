<script>
let tableProdi = new DataTable('#tableProdi', {
    scrollX: true,
    scrollY: true
});
let table = new DataTable('#table', {
    scrollX: true,
    scrollY: true
});

// ========================= Filter Status Pemesanan Mahasiswa ====================
$(document).ready(function() {
    // Event listener untuk dropdown filter
    $('#filter-status').on('change', function() {
        var filterValue = $(this).val();
        if (filterValue) {
            // Filter berdasarkan kolom "Jenis Barang"
            table.column(3).search(filterValue).draw(); // Kolom ke-11 adalah "Jenis Barang"
        } else {
            // Jika tidak ada filter yang dipilih, tampilkan semua data
            table.column(3).search('').draw();
        }
    });
});
</script>