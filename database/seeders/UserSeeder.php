<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Super User',
            'username' => 'superuser',
            'role' => 'superuser',
            'password' => Hash::make('superuser'),
        ]);

        User::create([
            'name' => 'Administrator',
            'username' => 'admin',
            'role' => 'admin',
            'password' => Hash::make('admin'),
        ]);

        User::create([
            'name' => 'Standard User',
            'username' => 'user',
            'role' => 'user',
            'password' => Hash::make('user'),
        ]);
    }
}
