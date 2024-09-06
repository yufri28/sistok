<script>
let table = new DataTable('#table', {
    scrollX: true,
    scrollY: true
});
$(document).ready(function() {
    // Masukkan ke gudang
    $('#masuk_gudang').click(function() {
        var selectedRestok = $('input[name="id_restok[]"]:checked').map(
            function() {
                return $(this).val();
            }).get();
        console.log(selectedRestok)
        if (selectedRestok.length > 0) {
            $.ajax({
                url: '<?=base_url('pemesanan/masuk_gudang_mahasiswa')?>',
                method: 'POST',
                data: {
                    id_restok: selectedRestok,
                    status: 'Selesai'
                },
                success: function(response) {
                    // Handle successful response
                    alert('Barang berhasil dimasukan ke gudang!');
                    // Reload the page or update the table to reflect the changes
                    location.reload();
                },
                error: function(xhr, status, error) {
                    // Handle error response
                    alert('Terjadi kesalahan: ' + error);
                }
            });
        } else {
            alert('Pilih setidaknya satu data!');
        }
    });
});
$(document).ready(function() {
    // Masukkan ke gudang
    $('#masuk_gudang_siswa').click(function() {
        var selectedRestok = $('input[name="id_restok[]"]:checked').map(
            function() {
                return $(this).val();
            }).get();
        console.log(selectedRestok)
        if (selectedRestok.length > 0) {
            $.ajax({
                url: '<?=base_url('pemesanan/masuk_gudang_siswa')?>',
                method: 'POST',
                data: {
                    id_restok: selectedRestok,
                    status: 'Selesai'
                },
                success: function(response) {
                    // Handle successful response
                    alert('Barang berhasil dimasukan ke gudang!');
                    // Reload the page or update the table to reflect the changes
                    location.reload();
                },
                error: function(xhr, status, error) {
                    // Handle error response
                    alert('Terjadi kesalahan: ' + error);
                }
            });
        } else {
            alert('Pilih setidaknya satu data!');
        }
    });
});
</script>