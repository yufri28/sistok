<script>
let table = new DataTable('#table', {
    scrollX: true,
    scrollY: true
});
$(document).ready(function() {
    // Event listener untuk dropdown filter
    $('#filter-status').on('change', function() {
        var filterValue = $(this).val();
        console.log(table.column(4))
        console.log(filterValue)
        if (filterValue) {
            // Filter berdasarkan kolom "Jenis Barang"
            table.column(8).search(filterValue)
                .draw();
        } else {
            // Jika tidak ada filter yang dipilih, tampilkan semua data
            table.column(8).search('').draw();
        }
    });

    // Masukkan ke gudang
    $('#ajukan').click(function() {
        var selectedRestok = $('input[name="id_restok[]"]:checked').map(
            function() {
                return $(this).val();
            }).get();
        console.log(selectedRestok)
        if (selectedRestok.length > 0) {
            $.ajax({
                url: '<?=base_url('permintaan/update_statusrestok_mahasiswa')?>',
                method: 'POST',
                data: {
                    id_restok: selectedRestok,
                    status: 'PER1'
                },
                success: function(response) {
                    // Handle successful response
                    alert('Pengajuan berhasil!');
                    // Reload the page or update the table to reflect the changes
                    location.reload();
                },
                error: function(xhr, status, error) {
                    // Handle error response
                    alert('Terjadi kesalahan: ' + error);
                }
            });
        } else {
            alert('Pilih setidaknya satu permintaan!');
        }
    });

    // Order barang
    $('#order').click(function() {
        var selectedRestok = $('input[name="id_restok[]"]:checked').map(
            function() {
                return $(this).val();
            }).get();
        if (selectedRestok.length > 0) {
            $.ajax({
                url: '<?=base_url('permintaan/update_statusrestok_mahasiswa')?>',
                method: 'POST',
                data: {
                    id_restok: selectedRestok,
                    status: 'PEM1'
                },
                success: function(response) {
                    // Handle successful response
                    alert('Order berhasil!');
                    // Reload the page or update the table to reflect the changes
                    location.reload();
                },
                error: function(xhr, status, error) {
                    // Handle error response
                    alert('Terjadi kesalahan: ' + error);
                }
            });
        } else {
            alert('Pilih setidaknya satu permintaan!');
        }
    });


    // Masukkan ke gudang siswa
    $('#ajukan-barang-siswa').click(function() {
        var selectedRestok = $('input[name="id_restok[]"]:checked').map(
            function() {
                return $(this).val();
            }).get();
        console.log(selectedRestok)
        if (selectedRestok.length > 0) {
            $.ajax({
                url: '<?=base_url('permintaan/update_statusrestok_siswa')?>',
                method: 'POST',
                data: {
                    id_restok: selectedRestok,
                    status: 'PER1'
                },
                success: function(response) {
                    // Handle successful response
                    alert('Pengajuan berhasil!');
                    // Reload the page or update the table to reflect the changes
                    location.reload();
                },
                error: function(xhr, status, error) {
                    // Handle error response
                    alert('Terjadi kesalahan: ' + error);
                }
            });
        } else {
            alert('Pilih setidaknya satu permintaan!');
        }
    });

    // Order barang siswa
    $('#order-barang-siswa').click(function() {
        var selectedRestok = $('input[name="id_restok[]"]:checked').map(
            function() {
                return $(this).val();
            }).get();
        if (selectedRestok.length > 0) {
            $.ajax({
                url: '<?=base_url('permintaan/update_statusrestok_siswa')?>',
                method: 'POST',
                data: {
                    id_restok: selectedRestok,
                    status: 'PEM1'
                },
                success: function(response) {
                    // Handle successful response
                    alert('Order berhasil!');
                    // Reload the page or update the table to reflect the changes
                    location.reload();
                },
                error: function(xhr, status, error) {
                    // Handle error response
                    alert('Terjadi kesalahan: ' + error);
                }
            });
        } else {
            alert('Pilih setidaknya satu permintaan!');
        }
    });
});
</script>