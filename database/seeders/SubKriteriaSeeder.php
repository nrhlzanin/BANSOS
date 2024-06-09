<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SubKriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sub_kriteria')->insert([
            [
                'id_subkriteria' => 1,
                'id_kriteria' => 1,
                'nama_subkriteria' => 'Bekerja',
                'nilai' => 1.0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_subkriteria' => 2,
                'id_kriteria' => 1,
                'nama_subkriteria' => 'Tidak Bekerja',
                'nilai' => 2.0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
