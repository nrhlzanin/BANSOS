<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AlternatifKriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('alternatif_kriteria')->insert([
            [
                'id_alternatif' => 1,
                'id_kriteria' => 1,
                'nilai'	=> 1.0,
            ],
            [
                'id_alternatif' => 2,
                'id_kriteria' => 1,
                'nilai'	=> 1.0,
            ],
        ]);
    }
}
