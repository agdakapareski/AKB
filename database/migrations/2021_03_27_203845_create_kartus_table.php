<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKartusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kartus', function (Blueprint $table) {
            $table->id();
            $table->string('jenis_kartu');
            $table->string('nama_pemilik_kartu');
            $table->string('nomor_kartu');
            $table->date('exp_date_kartu');
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
        Schema::dropIfExists('kartus');
    }
}
