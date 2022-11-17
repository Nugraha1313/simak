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
        Schema::create('jadwals', function (Blueprint $table) {
            $table->increments('id_jadwal');
            $table->integer('fk_matkul_jadwal');
            $table->enum('hari_jadwal', ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum"at']);
            $table->time('waktu_jadwal', $precision = 4);
            $table->integer('fk_dosen_jadwal');
            $table->integer('fk_ruangan_jadwal');
            $table->integer('fk_krs_jadwal');
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
        Schema::dropIfExists('jadwals');
    }
};
