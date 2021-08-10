<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOffsetMesinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offset_mesins', function (Blueprint $table) {
            $table->id();
            $table->string('nama_mesin', 30)->nullable();
            $table->integer('area_cetak_panjang')->nullable();
            $table->integer('area_cetak_lebar')->nullable();
            $table->integer('area_kertas_panjang')->nullable();
            $table->integer('area_kertas_lebar')->nullable();
            $table->double('harga_min')->nullable();
            $table->double('harga_lebih')->nullable();
            $table->double('harga_ctp')->nullable();
            $table->char('publish', 1)->nullable();
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
        Schema::dropIfExists('offset_mesins');
    }
}
