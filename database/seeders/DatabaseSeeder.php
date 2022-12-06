<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // DB::table('users')->insert([
        //     'name' => Str::random(10),
        //     'email' => Str::random(10).'@simak.ac.id',
        //     'password' => Hash::make('password'),
        // ]);

        $this->call([
            DosensSeeder::class,
            MahasiswasSeeder::class,
            MatkulsSeeder::class,
            RuangansSeeder::class,
            TahunakademiksSeeder::class,
            UsersSeeder::class,
        ]);

    }
}
