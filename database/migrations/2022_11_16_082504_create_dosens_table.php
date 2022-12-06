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
        Schema::create('dosens', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('nip_dosen');
            $table->string('nama_dosen');
            $table->string('tmp_dosen');
            $table->date('tgl_dosen');
            $table->string('alamat_dosen');
            $table->string('prodi_dosen');
            $table->string('agama_dosen');
            $table->string('telp_dosen');
            $table->string('email_dosen');
            $table->enum('gender_dosen', ['Laki-laki', 'Perempuan']);
            $table->string('foto_dosen')->nullable();
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
        Schema::dropIfExists('dosens');
    }
};
