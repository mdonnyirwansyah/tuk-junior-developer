<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesananTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesanan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->string('nomor_identitas');
            $table->string('no_hp');
            $table->enum('tempat_wisata', ['Bukit Suligi', 'Puncak Kabur']);
            $table->date('tanggal_kunjungan');
            $table->integer('pengunjung_dewasa');
            $table->integer('pengunjung_anak');
            $table->double('harga_tiket');
            $table->double('total_bayar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pesanan');
    }
}
