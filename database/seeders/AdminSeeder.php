<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'John Lee',
            'email' => 'admin@ktu.repo.edu.gh',
            'email_verified_at' => now(),
            'password' => Hash::make('admin'),
            'admin' => 1,
            'active' => 1,
            'approved' => 1
        ]);
    }
}
