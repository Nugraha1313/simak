<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mahasiswas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('nim_mahasiswa');
            $table->string('nama_mahasiswa');
            $table->string('tmp_mahasiswa');
            $table->date('tgl_mahasiswa');
            $table->string('alamat_mahasiswa');
            $table->string('prodi_mahasiswa');
            $table->string('agama_mahasiswa');
            $table->string('telp_mahasiswa');
            $table->string('email_mahasiswa');
            $table->enum('gender_mahasiswa', ['Laki-laki', 'Perempuan']);
            $table->string('foto_mahasiswa')->nullable();
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
        Schema::dropIfExists('mahasiswas');
    }
};
