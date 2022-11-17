<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DosensSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dosens')->insert([
            'id_dosen' => 1,
            'nip_dosen' => 00220204,
            'nama_dosen' => 'Rafa Grahady Putra, S.Kom, M.Kom',
            'tmp_dosen' => 'Surabaya',
            'tgl_dosen' => date('Y-m-d'),
            'alamat_dosen' => 'Losari, Brebes',
            'agama_dosen' => 'Islam',
            'telp_dosen' => '082167347682',
            'email_dosen' => 'rafady22@simak.ac.id',
            'gender_dosen' => 'Laki-laki',
            'foto_dosen' => "",
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
