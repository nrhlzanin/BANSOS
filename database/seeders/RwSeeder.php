<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RwSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'id_admin' => 1, 
            'id_user' => 1, 
            'nama_admin' => 'Muhammad Asrad', 
            'no_telp' => '084153464354'
        ];
        DB::table('rw')->insert($data);
    }
}
