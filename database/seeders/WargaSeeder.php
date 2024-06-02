<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class WargaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'id_warga' => 1,
                'id_user' => 5,
                'nama_kepalaKeluarga' => 'Ahmad Fauzi',
                'no_telp' => '081234567890',
                'no_rt' => 4,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_warga' => 2,
                'id_user' => 6,
                'nama_kepalaKeluarga' => 'Siti Aminah',
                'no_telp' => '081234567891',
                'no_rt' => 5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_warga' => 3,
                'id_user' => 7,
                'nama_kepalaKeluarga' => 'Budi Santoso',
                'no_telp' => '081234567892',
                'no_rt' => 6,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ];
        DB::table('warga')->insert($data);
    }
}
