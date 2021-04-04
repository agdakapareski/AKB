<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_reservasi');
            $table->unsignedBigInteger('id_pegawai');
            $table->unsignedBigInteger('id_kartu');
            $table->integer('kode_verifikasi');
            $table->double('total_transaksi');
            $table->timestamps();
            $table->foreign('id_reservasi')->references('id')->on('reservasis');
            $table->foreign('id_pegawai')->references('id')->on('users');
            $table->foreign('id_kartu')->references('id')->on('kartus')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksis');
    }
}
