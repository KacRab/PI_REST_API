<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use DB;

class peopletabledata extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        foreach(range(1,200) as $index){
            DB::table("people")->insert([
                'firstname'=> $faker->firstname,
                'lastname'=> $faker->lastname,
                'phone'=>rand(111111111, 999999999),
                'street'=> $faker->streetName,
                'city'=> $faker->city,
            ]);
        };
    }
}
