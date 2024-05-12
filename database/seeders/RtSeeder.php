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
            'id_petugas' => 1, 
            'id_user' => 2, 
            'nama_petugas' => 'Muhammad Haryanto', 
            'no_telp' => '084156547904',
            'no_rt' =>  4
        ];
        DB::table('rt')->insert($data);
    }
}
