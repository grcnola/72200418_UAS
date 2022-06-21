<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PasienSeeder extends Seeder
{

    public function run(){
        $faker = Faker::create('id_ID');
        
        for($i=1; $i<=5; $i++){
        DB::table('pasien')->insert([
            'nik' => $faker->nik(),
            'namaPasien' => $faker->name(),
            'alamat' => $faker->address(),
            'noTlp' => $faker->phoneNumber(),
            'pekerjaan' => $faker->jobTitle()
        ]);
        }
    }
}