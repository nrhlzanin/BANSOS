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
                'alternatif_id' => 1,
                'kriteria_id' => 1,
                'nilai'	=> 1.0,
            ],
            [
                'alternatif_id' => 2,
                'kriteria_id' => 1,
                'nilai'	=> 1.0,
            ],
        ]);
    }
}
