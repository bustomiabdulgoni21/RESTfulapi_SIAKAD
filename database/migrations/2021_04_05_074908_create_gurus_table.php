<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGurusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gurus', function (Blueprint $table) {
            $table->bigIncrements('id_guru');
            $table->string('nama_guru');
            $table->bigInteger('id_jabatan')->unsigned();
            $table->foreign('id_jabatan')->references('id_jabatan')->on('jabatans')->onDelete('cascade')->onUpdate('cascade');
            $table->string('tempat');
            $table->date('tgl_lahir');
            $table->enum('jk', ['Laki-laki','Perempuan']);
            $table->enum('agama', ['Islam','Kristen','Hindu','Budha','Konghuchu']);
            $table->string('no_telp');
            $table->text('alamat');
            $table->string('username');
            $table->string('password');
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
        Schema::dropIfExists('gurus');
    }
}
