<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Branch;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $branches = Branch::all();

        foreach ($branches as $branch) {
            for ($i = 1; $i <= 3; $i++) {
                $faker = \Faker\Factory::create();

                User::create([
                    'branch_id' => $branch->id,
                    'first_name' => $faker->firstName,
                    'last_name' => $faker->lastName,
                    'email' => "user{$i}@branch{$branch->id}.com",
                    'password' => Hash::make('password'),
                    'phone_number' => "+99893588911{$i}",
                    'address' => $faker->address,
                    'role' => $i % 3 // 0 = admin, 1 = students, 2 = teacher
                ]);
            }
        }
        User::create([
            'branch_id' => 1,
            'first_name' => 'Admin',
            'last_name' => 'Adminov',
            'email' => "dora@dora.uz", // Making email unique for each branch
            'password' => Hash::make('dora@dora.uz'),
            'phone_number' => "+998919579717",
            'address' => 'Maymanoq',
            'role' => 0 // 0 = admin, 1 = students, 2 = teacher
        ]);
        User::create([
            'branch_id' => 1,
            'first_name' => 'Dora Uz',
            'last_name' => 'Asosiy ',
            'email' => "info@dora.uz", // Making email unique for each branch
            'password' => Hash::make('515_dOR@'),
            'phone_number' => "+998 91 073 93 73",
            'address' => 'Toshkent sh',
            'role' => 0 // 0 = admin, 1 = students, 2 = teacher
        ]);
    }
}

