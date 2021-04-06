<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNilaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilais', function (Blueprint $table) {
            $table->bigIncrements('id_nilai');
            $table->bigInteger('nik')->unsigned();
            $table->foreign('nik')->references('nik')->on('siswas')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('id_jadwal')->unsigned();
            $table->foreign('id_jadwal')->references('id_jadwal')->on('jadwals')->onDelete('cascade')->onUpdate('cascade');
            $table->string('smst');
            $table->integer('angka');
            $table->string('kalimat');
            $table->bigInteger('id_rombel')->unsigned();
            $table->foreign('id_rombel')->references('id_rombel')->on('rombels')->onDelete('cascade')->onUpdate('cascade');
            $table->string('deskripsi');
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
        Schema::dropIfExists('nilais');
    }
}
