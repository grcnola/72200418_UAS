<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class MahasiswaSeeder extends Seeder
{
    public function run()    {
        $faker = Faker::create('id_ID');

        for($i=1; $i<=100; $i++){
            DB::table('mahasiswa')->insert([
                'nim' => $faker->randomNumber(8, true),
                'nama' => $faker->name(),
                'gender' => $faker -> randomElement(['Pria', 'Wanita']),
                'jurusan' => $faker->suffix(),
                'bidang_minat' => $faker->jobTitle()
            ]);
        }
    }
}
