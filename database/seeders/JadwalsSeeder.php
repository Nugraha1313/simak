<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class JadwalsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jadwals')->insert([
            'id_jadwal' => 1,
            'fk_matkul_jadwal' => 1,
            'hari_jadwal' => 'Senin',
            'waktu_jadwal' => '08:00',
            'fk_dosen_jadwal' => 1,
            'fk_ruangan_jadwal' => 1,
            'fk_krs_jadwal' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
