<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                // 1
                'name' => 'Super Admin',
                'email' => 'superadmin@shaz3e.com',
                'password' => bcrypt('123456789'),
                'active' => 1,
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                // 2
                'name' => 'Tester',
                'email' => 'tester@shaz3e.com',
                'password' => bcrypt('123456789'),
                'active' => 1,
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                // 3
                'name' => 'Developer',
                'email' => 'developer@shaz3e.com',
                'password' => bcrypt('123456789'),
                'active' => 1,
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                // 4
                'name' => 'Admin',
                'email' => 'admin@shaz3e.com',
                'password' => bcrypt('123456789'),
                'active' => 1,
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                // 5
                'name' => 'manager',
                'email' => 'manager@shaz3e.com',
                'password' => bcrypt('123456789'),
                'active' => 1,
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                // 6
                'name' => 'staff',
                'email' => 'staff@shaz3e.com',
                'password' => bcrypt('123456789'),
                'active' => 1,
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('users')->insert($users);

        // Create Profiles
        DB::table('profiles')->insert([
            [
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
