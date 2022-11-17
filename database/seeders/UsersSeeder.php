<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Str;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => 1,
            'name' => 'Grandy Prafatia',
            'username' => 'grandy16@gmail.com',
            'email' => 'grandy16@gmail.com',
            'password' => Hash::make('grandy22@admin'),
            'role' => 'Administrator',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('users')->insert([
            'id' => 2,
            'name' => 'Rafa Grahady Putra, S.Kom, M.Kom',
            'username' => 'rafady22@simak.ac.id',
            'email' => 'rafady22@simak.ac.id',
            'password' => Hash::make('rafady@22dos'),
            'role' => 'Dosen',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('users')->insert([
            'id' => 3,
            'name' => 'Fatih Pradygra',
            'username' => 'prady11@mhs.simak.ac.id',
            'email' => 'prady11@mhs.simak.ac.id',
            'password' => Hash::make('dygra22@mahasiswa'),
            'role' => 'Mahasiswa',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
