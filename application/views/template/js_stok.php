<script>
let table = new DataTable('#table', {
    scrollX: true,
    scrollY: true
});

// ========================= Filter Status Pemesanan Mahasiswa ====================
$(document).ready(function() {
    // Event listener untuk dropdown filter
    $('#filter-prodi').on('change', function() {
        var filterValue = $(this).val();
        if (filterValue) {
            // Filter berdasarkan kolom "Jenis Barang"
            table.column(2).search(filterValue).draw(); // Kolom ke-11 adalah "Jenis Barang"
        } else {
            // Jika tidak ada filter yang dipilih, tampilkan semua data
            table.column(2).search('').draw();
        }
    });
});
// ========================= Filter Status Pemesanan Mahasiswa ====================
$(document).ready(function() {
    // Event listener untuk dropdown filter
    $('#filter-unit').on('change', function() {
        var filterValue = $(this).val();
        if (filterValue) {
            // Filter berdasarkan kolom "Jenis Barang"
            table.column(2).search(filterValue).draw(); // Kolom ke-11 adalah "Jenis Barang"
        } else {
            // Jika tidak ada filter yang dipilih, tampilkan semua data
            table.column(2).search('').draw();
        }
    });
});
</script>