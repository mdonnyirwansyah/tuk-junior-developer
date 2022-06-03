<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>FR.IA.02. - Form Pesanan</title>

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    </head>
    <body class="bg-white">
        <div class="container">
            <div class="row justify-content-around align-items-start p-5">
                <div class="card col-sm-6 shadow px-2 py-1">
                    <div class="card-body">
                        <div class="card-title mb-3">
                            <h2>Form Pemesanan</h2>
                        </div>
                        <form action="{{ route('pesanan.store') }}" id="form-action" enctype="multipart/form-data">
                            <div class="form-group row mb-2">
                                <label for="nama_lengkap" class="col-sm-4 col-form-label">Nama Lengkap</label>
                                <div class="col-sm-8">
                                <input required type="text" class="form-control" id="nama_lengkap" name="nama_lengkap">
                                </div>
                            </div>
                            <div class="form-group row mb-2">
                                <label for="nomor_identitas" class="col-sm-4 col-form-label">Nomor Identitas</label>
                                <div class="col-sm-8">
                                <input required type="text" class="form-control" id="nomor_identitas" name="nomor_identitas">
                                </div>
                            </div>
                            <div class="form-group row mb-2">
                                <label for="no_hp" class="col-sm-4 col-form-label">No. HP</label>
                                <div class="col-sm-8">
                                <input required type="text" class="form-control" id="no_hp" name="no_hp">
                                </div>
                            </div>
                            <div class="form-group row mb-2">
                                <label for="tempat_wisata" class="col-sm-4 col-form-label">Tempat Wisata</label>
                                <div class="col-sm-8">
                                    <select required class="form-control" id="tempat_wisata" name="tempat_wisata">
                                        <option value="">Pilih tempat wisata</option>
                                        <option value="Bukit Suligi">Bukit Suligi</option>
                                        <option value="Puncak Kabur">Puncak Kabur</option>
                                    </select>
                                </div>
                            </div>
                            <div id="review_wisata_tab" class="d-none form-group row mb-2">
                                <label for="tempat_wisata" class="col-sm-4 col-form-label">Review Wisata</label>
                                <div class="col-sm-8">
                                    <iframe id="review_wisata" src="" title="YouTube video player" frameborder="0" allowfullscreen></iframe>
                                </div>
                            </div>
                            <div class="form-group row mb-2">
                                <label for="tanggal_kunjungan" class="col-sm-4 col-form-label">Tanggal Kunjungan</label>
                                <div class="col-sm-8">
                                <input required type="date" class="form-control" id="tanggal_kunjungan" name="tanggal_kunjungan">
                                </div>
                            </div>
                            <div class="form-group row mb-2">
                                <label for="pengunjung_dewasa" class="col-sm-4 col-form-label">Pengunjung Dewasa</label>
                                <div class="col-sm-8">
                                    <input required type="number" class="form-control" id="pengunjung_dewasa" name="pengunjung_dewasa">
                                </div>
                            </div>
                            <div class="form-group row mb-2">
                                <label for="pengunjung_anak" class="col-sm-4 col-form-label">Pengunjung Anak-Anak</label>
                                <div class="col-sm-8">
                                    <input required type="number" class="form-control" id="pengunjung_anak" name="pengunjung_anak">
                                </div>
                            </div>
                            <div class="form-group row mb-2">
                                <label for="harga_tiket" class="col-sm-4 col-form-label">Harga Tiket</label>
                                <div class="col-sm-8">
                                    <input required type="text" readonly class="form-control-plaintext" id="harga_tiket" name="harga_tiket">
                                </div>
                            </div>
                            <div class="form-group row mb-2">
                                <label for="total_bayar" class="col-sm-4 col-form-label">Total Bayar</label>
                                <div class="col-sm-8">
                                    <input required type="text" readonly class="form-control-plaintext" id="total_bayar" name="total_bayar">
                                </div>
                            </div>
                            <div class="form-check mb-5">
                                <input required class="form-check-input required" type="checkbox" value="" id="tc">
                                <label class="form-check-label" for="tc">
                                Saya dan/atau rombongan telah membaca, memahami, dan setuju berdasarkan syarat dan ketentuan yang telah ditetapkan
                                </label>
                            </div>
                            <div class="form-group row d-flex justify-content-between">
                                <div class="col-sm-4">
                                    <button id="hitung_total_bayar" class="btn btn-sm btn-secondary btn-block" style="width: 100%">Hitung Total Bayar</button>
                                </div>
                                <div class="col-sm-4">
                                    <button type="submit" id="btn" class="btn btn-sm btn-secondary btn-block" style="width: 100%">Pesan Tiket</button>
                                </div>
                                <div class="col-sm-4">
                                    <button id="cancel" type="reset" class="btn btn-sm btn-secondary btn-block" style="width: 100%">Cancel</button>
                                    <button id="back" type="reset" class="d-none btn btn-sm btn-secondary btn-block" style="width: 100%">Back</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="d-none card col-sm-5 shadow px-2 py-1" id="pembayaran_tiket">
                    <div class="card-body">
                        <div class="card-title mb-3">
                            <h4>Pembayaran Tiket</h4>
                        </div>
                        <div class="card-text">
                            <div class="row">
                                <p class="col-sm-4">Nama Pemesan</p>
                                <p class="col-sm-8" id="nama_lengkap_output">: </p>
                            </div>
                            <div class="row">
                                <p class="col-sm-4">Nomor Identitas</p>
                                <p class="col-sm-8" id="nomor_identitas_output">: </p>
                            </div>
                            <div class="row">
                                <p class="col-sm-4">No. HP</p>
                                <p class="col-sm-8" id="no_hp_output">: </p>
                            </div>
                            <div class="row">
                                <p class="col-sm-4">Tempat Wisata</p>
                                <p class="col-sm-8" id="tempat_wisata_output">:</p>
                            </div>
                            <div class="row">
                                <p class="col-sm-4">Pengunjung Dewasa</p>
                                <p class="col-sm-8" id="pengunjung_dewasa_output">:</p>
                            </div>
                            <div class="row">
                                <p class="col-sm-4">Pengunjung Anak-Anak</p>
                                <p class="col-sm-8" id="pengunjung_anak_output">:</p>
                            </div>
                            <div class="row">
                                <p class="col-sm-4">Harga Tiket</p>
                                <p class="col-sm-8" id="harga_tiket_output">:</p>
                            </div>
                            <div class="row">
                                <p class="col-sm-4">Total Bayar</p>
                                <p class="col-sm-8" id="total_bayar_output">:</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="{{ asset('js/app.js') }}"></script>
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

                $('#form-action').submit(function (e) {
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

                $('#cancel').click(function () {
                    $('#review_wisata_tab').addClass('d-none');
                });

                $('#back').click(function () {
                    $('#pembayaran_tiket').addClass('d-none');
                    $('#review_wisata_tab').addClass('d-none');
                    $('#back').addClass('d-none');
                    $('#cancel').removeClass('d-none');
                });
            })

        </script>
    </body>
</html>
