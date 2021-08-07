<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOffsetHitungProduksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offset_hitung_produks', function (Blueprint $table) {
            $table->id();
            $table->integer('jml_halaman_kalender')->nullable();
            $table->integer('jml_warna')->nullable();
            $table->string('ukuran_cetak', 30)->nullable();
            $table->integer('kertas_id')->nullable();
            $table->integer('finishing_id')->nullable();
            $table->string('laminasi', 10)->nullable();
            $table->integer('jml_cetak')->nullable();
            $table->double('biaya_potong')->nullable();
            $table->double('biaya_design')->nullable();
            $table->double('biaya_akomodasi')->nullable();
            $table->string('nama_file', 50)->nullable();
            $table->double('harga_set_kalender')->nullable();
            $table->integer('jml_kertas')->nullable();
            $table->integer('insheet')->nullable();
            $table->double('harga_kertas_satuan')->nullable();
            $table->integer('jml_plat')->nullable();
            $table->double('biaya_kertas')->nullable();
            $table->double('biaya_cetak_min')->nullable();
            $table->double('biaya_cetak_lebih')->nullable();
            $table->double('biaya_plat')->nullable();
            $table->double('biaya_set_kalender')->nullable();
            $table->double('biaya_susun')->nullable();
            $table->double('biaya_spiral')->nullable();
            $table->double('biaya_mata_ayam')->nullable();
            $table->double('total_biaya')->nullable();
            $table->double('profit')->nullable();
            $table->double('grand_total')->nullable();
            $table->double('harga_satuan_kalender')->nullable();
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
        Schema::dropIfExists('offset_hitung_produks');
    }
}
