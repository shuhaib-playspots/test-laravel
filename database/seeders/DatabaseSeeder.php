<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'superadmin@admin.com'],
            [
                'name'     => 'Super Admin',
                'email'    => 'superadmin@admin.com',
                'role'     => 'super_admin',
                'password' => bcrypt('Admin@1234'),
            ]
        );
    }
}
