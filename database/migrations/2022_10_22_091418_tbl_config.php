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
        Schema::create('tbl_config', function(Blueprint $table){
            $table->id();
            $table->text('text_slider1');
            $table->text('text_slider2');
            $table->text('text_slogan');
            $table->text('text_pembukaan');
            $table->text('telp_office');
            $table->text('email_marketing');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_config');
    }
};
