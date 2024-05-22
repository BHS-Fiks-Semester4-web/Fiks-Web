<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Test Manage Web
        User::create([
            'name'          => 'Ilham Nugroho',
            'email'         => 'ilhamisdarmawan@gmail.com',
            'password'      => Hash::make('ilham'),
            'alamat'        => 'Jember',
            'username'      => 'Ilham Gokil',
            'no_hp'         => '085156915879',
            'agama'         => 'Islam',
            'tanggal_lahir' => '12/04/2024',
            'role'          => 'Admin',
            'status'        => 'aktif'
        ]);
        User::create([
            'name'          => 'Rizal Mahendra',
            'email'         => 'rizalmahendra@gmail.com',
            'password'      => Hash::make('rizal'),
            'alamat'        => 'Jember',
            'username'      => 'Rizal Gokil',
            'no_hp'         => '085156915879',
            'agama'         => 'Islam',
            'tanggal_lahir' => '12/04/2024',
            'role'          => 'Admin',
            'status'        => 'aktif'
        ]);
    }
}
