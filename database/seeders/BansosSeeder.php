<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BansosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('bansos')->insert([
            [
                'id_bansos' => 1,
                'asal_bansos' => 'Pemerintah',
                'jenis_bansos' => 'Bantuan Pangan Non Tunai (BPNT)',
                'periode' => '2024-01-01', // Contoh periode, sesuaikan dengan format tanggal yang digunakan
                'keterangan' => 'Deskripsi bantuan',
                'status' => 'Aktif',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_bansos' => 2,
                'asal_bansos' => 'Pemerintah',
                'jenis_bansos' => 'Program Keluarga Harapan (PKH)',
                'periode' => '2024-04-11', // Contoh periode, sesuaikan dengan format tanggal yang digunakan
                'keterangan' => 'Deskripsi bantuan',
                'status' => 'Aktif',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_bansos' => 3,
                'asal_bansos' => 'Pemerintah',
                'jenis_bansos' => 'Bantuan Sosial Tunai (BST)',
                'periode' => '2024-02-21', // Contoh periode, sesuaikan dengan format tanggal yang digunakan
                'keterangan' => 'Deskripsi bantuan',
                'status' => 'Aktif',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);   
    }
}
