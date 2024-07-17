<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Create Admin User
         $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'), // Replace with a secure password
        ]);
        $admin->assignRole('admin');

        // Create Director User
        $director = User::create([
            'name' => 'Director User',
            'email' => 'director@gmail.com',
            'password' => bcrypt('password'), // Replace with a secure password
        ]);
        $director->assignRole('director');

        // Create Social Worker User
        $socialWorker = User::create([
            'name' => 'Social Worker User',
            'email' => 'socialworker@gmail.com',
            'password' => bcrypt('password'), // Replace with a secure password
        ]);
        $socialWorker->assignRole('social-worker');
    }
    }

