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
                'username' => 'ahmad',
                'password' => Hash::make('12345'),
                'level' => 'warga',
                'email' => 'ahmad@gmail.com'
            ],
            [
                'id_user' => 6,
                'username' => 'siti',
                'password' => Hash::make('12345'),
                'level' => 'warga',
                'email' => 'siti@gmail.com'
            ],
            [
                'id_user' => 7,
                'username' => 'budi',
                'password' => Hash::make('12345'),
                'level' => 'warga',
                'email' => 'budi@gmail.com'
            ],
            [
                'id_user' => 8,
                'username' => 'heri',
                'password' => Hash::make('12345'),
                'level' => 'warga',
                'email' => 'heri@gmail.com'
            ],
            [
                'id_user' => 9,
                'username' => 'jordi',
                'password' => Hash::make('12345'),
                'level' => 'warga',
                'email' => 'jordi@gmail.com'
            ],
            [
                'id_user' => 10,
                'username' => 'yandi',
                'password' => Hash::make('12345'),
                'level' => 'warga',
                'email' => 'yandi@gmail.com'
            ],
            [
                'id_user' => 11,
                'username' => 'dery',
                'password' => Hash::make('12345'),
                'level' => 'warga',
                'email' => 'dery@gmail.com'
            ],
            [
                'id_user' => 12,
                'username' => 'yuki',
                'password' => Hash::make('12345'),
                'level' => 'warga',
                'email' => 'yuki@gmail.com'
            ],
            [
                'id_user' => 13,
                'username' => 'supri',
                'password' => Hash::make('12345'),
                'level' => 'warga',
                'email' => 'supri@gmail.com'
            ],
            [
                'id_user' => 14,
                'username' => 'bejo',
                'password' => Hash::make('12345'),
                'level' => 'warga',
                'email' => 'bejo@gmail.com'
            ]
        ];

        DB::table('user')->insert($data);      
    }
}
