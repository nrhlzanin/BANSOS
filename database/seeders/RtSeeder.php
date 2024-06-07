<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RtSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'id_petugas' => 1, 
                'id_user' => 2, 
                'nama_petugas' => 'Muhammad Haryanto', 
                'no_telp' => '084156547904',
                'no_rt' =>  1
            ], 
            [
                'id_petugas' => 2, 
                'id_user' => 3, 
                'nama_petugas' => 'Kosim Asyhari', 
                'no_telp' => '084156547757',
                'no_rt' =>  2
            ], 
            [
                'id_petugas' => 3, 
                'id_user' => 4, 
                'nama_petugas' => 'Malik Abdur', 
                'no_telp' => '084156496720',
                'no_rt' =>  3
            ], 
            [
                'id_petugas' => 4, 
                'id_user' => 5, 
                'nama_petugas' => 'Mulkandi', 
                'no_telp' => '084156510294',
                'no_rt' =>  4
            ], 
            [
                'id_petugas' => 5, 
                'id_user' => 6, 
                'nama_petugas' => 'Muhammad Hakam Agung', 
                'no_telp' => '084156547544',
                'no_rt' =>  5
            ],          
            [
                'id_petugas' => 6, 
                'id_user' => 7, 
                'nama_petugas' => 'Bani Adam', 
                'no_telp' => '084156598612',
                'no_rt' =>  5
            ]            
        ];
        DB::table('rt')->insert($data);
    }
}
