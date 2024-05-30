<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Psy\Command\WhereamiCommand;

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
            ], 
            [
                'id_user' => 3,
                'username' => 'petugasrt05',
                'password' => Hash::make('12345'),
                'level' => 'rt',
                'email' => 'petugas05@gmail.com'
            ],
            [
                'id_user' => 4,
                'username' => 'petugasrt06',
                'password' => Hash::make('12345'),
                'level' => 'rt',
                'email' => 'petugas06@gmail.com'
            ],
            [
                'id_user' => 5,
                'username' => 'wargart04',
                'password' => Hash::make('12345'),
                'level' => 'warga',
                'email' => 'warga04@gmail.com'
            ],
            [
                'id_user' => 6,
                'username' => 'wargart05',
                'password' => Hash::make('12345'),
                'level' => 'warga',
                'email' => 'warga05@gmail.com'
            ],
            [
                'id_user' => 7,
                'username' => 'wargart06',
                'password' => Hash::make('12345'),
                'level' => 'warga',
                'email' => 'warga06@gmail.com'
            ]
        ];

        DB::table('user')->insert($data);      
    }
}
