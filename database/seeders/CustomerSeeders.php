<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Customer;

class CustomerSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $faker = Faker::create();
        // foreach (range(1, 100) as $value) {
        //     DB::table('customers')->insert([
        //         'name' => $faker->name(),
        //         'email' => $faker->unique()->safeEmail(),
        //         'address' => $faker->address(),
        //         'phoneNumber' => $faker->phoneNumber(),
        //         'gender' => $faker->randomElement(['Male', 'Female']),
        //         'birthday' => $faker->date(),
        //     ]);
        // }
        Customer::factory()->count(100)->create();
    }
}