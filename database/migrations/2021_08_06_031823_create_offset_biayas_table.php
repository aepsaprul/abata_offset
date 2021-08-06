<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOffsetBiayasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offset_biayas', function (Blueprint $table) {
            $table->id();
            $table->string('keterangan_biaya', 50)->nullable();
            $table->integer('jml_min')->nullable();
            $table->double('harga_min')->nullable();
            $table->double('harga_lebih')->nullable();
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
        Schema::dropIfExists('offset_biayas');
    }
}
