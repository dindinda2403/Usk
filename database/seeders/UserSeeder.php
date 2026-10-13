<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name'=>'Administrator LSP',
            'email'=>'admin@gmail.com',
            'password'=>Hash::make('12345'),
            'role' => 'admin',
        ]);

        user::create([
            'name' => 'Peserta Sertifikasi',
            'email' => 'peserta@gmail.com',
            'password' => Hash::make('12345'),
            'role' => 'peserta',
        ]);
    }
}
