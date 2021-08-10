<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOffsetUkuranCetakDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offset_ukuran_cetak_details', function (Blueprint $table) {
            $table->id();
            $table->integer('ukuran_cetak_id')->nullable();
            $table->integer('kertas_id')->nullable();
            $table->integer('mesin_id')->nullable();
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
        Schema::dropIfExists('offset_ukuran_cetak_details');
    }
}
