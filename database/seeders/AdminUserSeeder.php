<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create admin user
        User::firstOrCreate(
            ['email' => 'admin@diskominfo.go.id'],
            [
                'name' => 'Administrator DISKOMINFO',
                'password' => Hash::make('admin123'),
                'email_verified_at' => now(),
            ]
        );

        // Create additional test users
        User::firstOrCreate(
            ['email' => 'user@diskominfo.go.id'],
            [
                'name' => 'User Test',
                'password' => Hash::make('password123'),
                'email_verified_at' => now(),
            ]
        );

        User::firstOrCreate(
            ['email' => 'operator@diskominfo.go.id'],
            [
                'name' => 'Operator Dashboard',
                'password' => Hash::make('operator123'),
                'email_verified_at' => now(),
            ]
        );

        $this->command->info('Admin users created successfully!');
        $this->command->info('Admin Email: admin@diskominfo.go.id | Password: admin123');
        $this->command->info('User Email: user@diskominfo.go.id | Password: password123');
        $this->command->info('Operator Email: operator@diskominfo.go.id | Password: operator123');
    }
}
