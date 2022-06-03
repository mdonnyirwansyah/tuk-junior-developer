<script>
    $(document).ready( function() {
        $('#store').submit(function (e) {
            e.preventDefault();

            $('#btn').attr('disabled', true);
            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    var pesanan = response.success;

                    if(pesanan){
                        $('#nama_lengkap_output').text(": "+pesanan.nama_lengkap);
                        $('#nomor_identitas_output').text(": "+pesanan.nomor_identitas);
                        $('#no_hp_output').text(": "+pesanan.no_hp);
                        $('#tempat_wisata_output').text(": "+pesanan.tempat_wisata);
                        $('#pengunjung_dewasa_output').text(": "+pesanan.pengunjung_dewasa);
                        $('#pengunjung_anak_output').text(": "+pesanan.pengunjung_anak);
                        $('#harga_tiket_output').text(": Rp "+pesanan.harga_tiket);
                        $('#total_bayar_output').text(": Rp "+pesanan.total_bayar);

                        $('#pembayaran_tiket').removeClass('d-none');
                        $('#back').removeClass('d-none');
                        $('#cancel').addClass('d-none');
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + '\n' + xhr.responseText + '\n' + thrownError);
                }
            });
        });
    });
</script>
