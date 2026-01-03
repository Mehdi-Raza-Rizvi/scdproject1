<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    
    {

        
        // Create Admin User
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@rentalapp.com',
            'email_verified_at' => now(),
            'password' => Hash::make('Admin@123'), // Strong password
            'remember_token' => Str::random(10),
        ]);
        
        
        $this->command->info('Users seeded successfully!');
        $this->command->info('Total users created: ' . User::count());
        
        // Display login credentials
        $this->command->info("\n=== Login Credentials ===");
        $this->command->info("Admin User:");
        $this->command->info("Email: admin@rentalapp.com");
        $this->command->info("Password: Admin@123");
        $this->command->info("\nProperty Manager:");
        $this->command->info("Email: manager@rentalapp.com");
        $this->command->info("Password: Manager@123");
        $this->command->info("\nRegular User (John Doe):");
        $this->command->info("Email: john.doe@example.com");
        $this->command->info("Password: Password123");
        $this->command->warn("\n⚠️ Remember to change passwords in production!");
    }
}