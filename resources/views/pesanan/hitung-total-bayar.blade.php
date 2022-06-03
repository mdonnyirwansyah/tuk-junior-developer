<script>
    $(document).ready( function() {
        $('#tempat_wisata').change(function (e) {
            $('#total_bayar').val("");

            var tempat_wisata = e.target.value;
            var harga_tiket;
            var url_review;

            if (tempat_wisata === "Bukit Suligi") {
                harga_tiket = 40000;
                url_review = "https://www.youtube.com/embed/C3bVw3BFWlw";
                $('#review_wisata_tab').removeClass('d-none');
            } else if (tempat_wisata === "Puncak Kabur") {
                harga_tiket = 35000;
                url_review = "https://www.youtube.com/embed/pG8E_35fG9U";
                $('#review_wisata_tab').removeClass('d-none');
            } else {
                $('#review_wisata_tab').addClass('d-none');
            }
            console.log(tempat_wisata);

            $('#harga_tiket').val(harga_tiket);
            $('#review_wisata').attr('src', url_review);
        });

        $('#hitung_total_bayar').click(function (e) {
            e.preventDefault();

            var harga_tiket = $('#harga_tiket').val();
            var pengunjung_dewasa = $('#pengunjung_dewasa').val();
            var pengunjung_anak = $('#pengunjung_anak').val();
            var total_bayar = 0;

            total_bayar = (harga_tiket * pengunjung_dewasa) + (harga_tiket * pengunjung_anak / 2);
            $('#total_bayar').val(total_bayar);
        });
    });
</script>
