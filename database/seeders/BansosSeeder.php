<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BansosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'id_jenisbansos' => 1,
                'jenis_bansos' => 'BPNT',
                'asal_bansos' => 'Pemerintah Kota A',
                'tanggal_keluar' => '2024-05-10',
                'status' => 'Aktif',
            ],
            [
                'id_jenisbansos' => 2,
                'jenis_bansos' => 'BLT',
                'asal_bansos' => 'Pemerintah Kota B',
                'tanggal_keluar' => '2024-04-25',
                'status' => 'Tidak Aktif',
            ],
            [
                'id_jenisbansos' => 3,
                'jenis_bansos' => 'PKH',
                'asal_bansos' => 'Pemerintah Kota C',
                'tanggal_keluar' => '2024-04-25',
                'status' => 'Tidak Aktif',
            ],
            [
                'id_jenisbansos' => 4,
                'jenis_bansos' => 'BSB',
                'asal_bansos' => 'Pemerintah Kota D',
                'tanggal_keluar' => '2024-04-25',
                'status' => 'Tidak Aktif',
            ],
        ];
        DB::table('bansos')->insert($data);
    }
}
