<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOffsetBahansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offset_bahans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_bahan', 50)->nullable();
            $table->double('harga_bahan')->nullable();
            $table->integer('gramasi')->nullable();
            $table->integer('kertas_id')->nullable();
            $table->char('publish')->nullable();
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
        Schema::dropIfExists('offset_bahans');
    }
}
