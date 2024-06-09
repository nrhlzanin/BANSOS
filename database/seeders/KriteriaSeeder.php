<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class KriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kriteria')->insert([
            [
                'id_kriteria' => 1,
                
                'nama_kriteria' => 'Status Pekerjaan Kepala Keluarga',
                'bobot' => 1.0,
                'tipe' => 'cost',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_kriteria' => 2,
                
                'nama_kriteria' => 'Jumlah Penghasilan Perbulan',
                'bobot' => 1.0,
                'tipe' => 'Benefit',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
