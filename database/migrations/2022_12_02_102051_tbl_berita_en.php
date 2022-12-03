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
        Schema::create('tbl_berita_en', function (Blueprint $table){
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('deskripsi');
            $table->dateTime('tglBerita');
            $table->string('foto');
            $table->string('userlog');
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
        Schema::dropIfExists('tbl_berita_en');
    }
};
