<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOffsetBiayaCetaksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offset_biaya_cetaks', function (Blueprint $table) {
            $table->id();
            $table->string('nama_biaya', 50)->nullable();
            $table->integer('mesin_id')->nullable();
            $table->smallInteger('kategori_warna')->nullable();
            $table->integer('jml_min')->nullable();
            $table->double('harga_cetak_min')->nullable();
            $table->double('harga_cetak_lebih')->nullable();
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
        Schema::dropIfExists('offset_biaya_cetaks');
    }
}
