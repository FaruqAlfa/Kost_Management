<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert(
            [
            'nama' => 'Fahmi',
            'role' => 'admin',
            'username' => 'admin',
            'email' => 'alfafahmi172@gmail.com',
            'no_hp' => '081234567890',
            'alamat' => 'Jl. Semanggi Barat no 18',
            'password' => Hash::make('admin123'),
        ],

        [
            'nama' => 'Yanto Subianto',
            'role' => 'user',
            'username' => 'yanto',
            'email' => 'yantoS@gmail.com',
            'no_hp' => '0812345672384',
            'alamat' => 'Kab Kluruk',
            'password' => Hash::make('yanto123'),
        ]
    
    );
    }
}
