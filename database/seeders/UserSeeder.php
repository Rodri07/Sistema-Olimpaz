<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'username'=>'Admin',
            'firstname'=>'Olivia',
            'lastname'=>'Martinez',
            'email'=>'olivia@gmail.com',
            'password'=>bcrypt('12345678')
        ])->assignRole('Admin');

        User::create([
            'username'=>'User',
            'firstname'=>'Rodri',
            'lastname'=>'Nava',
            'email'=>'rodri@gmail.com',
            'password'=>bcrypt('12345678')
        ])->assignRole('User');
    }
}
