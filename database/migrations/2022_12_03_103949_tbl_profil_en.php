<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_profil_en', function (Blueprint $table){
            $table->id();
            $table->string('nama_perusahaan');
            $table->string('lokasi');
            $table->integer('kodepos');
            $table->string('provinsi');
            $table->string('negara');
            $table->string('telp');
            $table->string('fax');
            $table->string('website');
            $table->string('email');
            $table->string('kontak');
            $table->string('tahun_didirikan');
            $table->string('sektor_bisnis');
            $table->string('bahasa');
            $table->string('produk_utama');
            $table->string('merek');
            $table->string('volume');
            $table->string('spesifikasi');
            $table->string('komposisi_bahan');
            $table->string('harga_jangka');
            $table->string('minimum_order');
            $table->string('validitas_harga');
            $table->string('proses_manufaktur');
            $table->string('tenaga_kerja');
            $table->string('pendapatan_ekspor');
            $table->string('tujuan_ekspor');
            $table->string('jns_bisnis_lain');
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
        Schema::dropIfExists('tbl_profil_en');
    }
};
