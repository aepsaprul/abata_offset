<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOffsetProduksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offset_produks', function (Blueprint $table) {
            $table->id();
            $table->string('nama_produk', 50)->nullable();
            $table->string('kode_produk', 50)->nullable();
            $table->string('keterangan', 100)->nullable();
            $table->double('harga')->nullable();
            $table->string('foto', 100)->nullable();
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
        Schema::dropIfExists('offset_produks');
    }
}
