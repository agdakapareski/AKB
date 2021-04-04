<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservasis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pegawai');
            $table->unsignedBigInteger('id_customer');
            $table->unsignedBiginteger('id_meja');
            $table->date('tanggal_reservasi');
            $table->string('jam_reservasi');
            $table->timestamps();
            $table->softDeletes('deleted_at');
            $table->foreign('id_pegawai')->references('id')->on('users');
            $table->foreign('id_customer')->references('id')->on('customers');
            $table->foreign('id_meja')->references('id')->on('mejas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservasis');
    }
}
