<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class MahasiswasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mahasiswas')->insert([
            'id' => 1,
            'nim_mahasiswa' => 11020101,
            'nama_mahasiswa' => 'Fatih Pradygra',
            'tmp_mahasiswa' => 'Malang',
            'tgl_mahasiswa' => date('Y-m-d'),
            'alamat_mahasiswa' => 'Bandung, Jawa Barat',
            'prodi_mahasiswa' => 'Teknik Informatika',
            'agama_mahasiswa' => 'Islam',
            'telp_mahasiswa' => '085709467392',
            'email_mahasiswa' => 'prady11@mhs.simak.ac.id',
            'gender_mahasiswa' => 'Laki-laki',
            'foto_mahasiswa' => "",
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
