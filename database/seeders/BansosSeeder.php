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
                'id_jenisbansos' => 1,
                'asal_bansos' => 'Pemerintah',
                'jenis_bansos' => 'BPNT',
                'tanggal_keluar' => Carbon::now(),
                'status' => 'Active',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_jenisbansos' => 2,
                'asal_bansos' => 'Pemerintah',
                'jenis_bansos' => 'PKH',
                'tanggal_keluar' => Carbon::now(),
                'status' => 'Active',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_jenisbansos' => 3,
                'asal_bansos' => 'Pemerintah',
                'jenis_bansos' => 'BST',
                'tanggal_keluar' => Carbon::now(),
                'status' => 'Active',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
