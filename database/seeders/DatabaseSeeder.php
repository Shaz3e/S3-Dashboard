<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call([
            // Required
            SmtpServerSeeder::class,
            UserSeeder::class,

            // Create Permissions
            PermissionsSeeder::class,

            // Create Roles
            RolesSeeder::class,

            // Sync Roles & Permissions
            RolePermissionSeeder::class,

            // Email Templates
            EmailTemplateSeeder::class,
        ]);
    }
}
