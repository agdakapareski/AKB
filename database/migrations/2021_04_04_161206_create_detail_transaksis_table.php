<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_transaksis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_menu');
            $table->unsignedBigInteger('id_transaksi');
            $table->string('status_pesanan');
            $table->timestamps();
            $table->foreign('id_menu')->references('id')->on('menus');
            $table->foreign('id_transaksi')->references('id')->on('transaksis');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_transaksis');
    }
}
