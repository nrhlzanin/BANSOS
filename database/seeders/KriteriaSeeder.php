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
                'kode' => 'KRT001',
                'name' => 'Status Pekerjaan Kepala Keluarga',
                'bobot' => 1.0,
                'type' => '1',
                'min' => 1,
                'max' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 2,
                'kode' => 'KRT002',
                'name' => 'Jumlah Penghasilan Perbulan',
                'bobot' => 1.0,
                'type' => '0',
                'min' => 1,
                'max' => 5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
