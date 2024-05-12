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
        $data = [
            [
                'id_user' => 1,
                'username' => 'admin',
                'password' => Hash::make('12345'),
                'level' => 'rw',
                'email' => 'admin01@gmail.com'
            ],
            [
                'id_user' => 2,
                'username' => 'petugasrt04',
                'password' => Hash::make('12345'),
                'level' => 'rt',
                'email' => 'petugas04@gmail.com'
            ]
            ];

            DB::table('user')->insert($data);            
    }
}
