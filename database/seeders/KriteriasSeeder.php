<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class KriteriasSeeder extends Seeder
{
    public function run()
    {
        DB::table('kriterias')->insert([
            [
                'kode' => 'C1',
                'name' => 'Pekerjaan Kepala Keluarga',
                'bobot' => 0.8,
                'type' => true,
                'min' => null,
                'max' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'kode' => 'C2',
                'name' => 'Jumlah Penghasilan Perbulan',
                'bobot' => 1.0,
                'type' => true,
                'min' => null,
                'max' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
        
    }
}
