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
        Schema::create('matkuls', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kode_matkul');
            $table->string('nama_matkul');
            $table->integer('sks_matkul');
            $table->enum('ket_matkul', ['Wajib', 'Pilihan']);
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
        Schema::dropIfExists('matkuls');
    }
};
