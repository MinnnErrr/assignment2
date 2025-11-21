<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Str;
use Faker\Factory as Faker;

class CustomerSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        foreach (range(1, 100) as $value) {
            DB::table('customers')->insert([
                'name' => $faker->name(),
                'email' => $faker->unique()->safeEmail(),
                'address' => $faker->address(),
                'phoneNumber' => $faker->phoneNumber(),
                'gender' => $faker->randomElement(['Male', 'Female']),
                'birthday' => $faker->date(),
            ]);
        }
    }
}
