<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbsensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('absens', function (Blueprint $table) {
            $table->bigIncrements('id_absen');
            $table->bigInteger('nik')->unsigned();
            $table->foreign('nik')->references('nik')->on('siswas')->onDelete('cascade')->onUpdate('cascade');
            $table->string('absensi');
            $table->bigInteger('id_rombel')->unsigned();
            $table->foreign('id_rombel')->references('id_rombel')->on('rombels')->onDelete('cascade')->onUpdate('cascade');
            $table->date('tgl_hadir', ['d-m-Y H:i:s']);
            $table->string('ket');
            $table->string('smst');
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
        Schema::dropIfExists('absens');
    }
}
