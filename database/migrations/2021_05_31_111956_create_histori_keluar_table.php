<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoriKeluarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('histori_keluar', function (Blueprint $table) {
            $table->id('id_histori_keluar');
            $table->date('tanggal_histori');
            $table->string('nama_bahan');
            $table->integer('jumlah_stok');
            $table->string('unit_stok');
            $table->string('keterangan');
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
        Schema::dropIfExists('histori_keluar');
    }
}
