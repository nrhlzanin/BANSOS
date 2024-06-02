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
        DB::table('sub_kriterias')->insert([
            [
                'id' => 1,
                'kriteria_id' => 1,
                'name' => 'Bekerja',
                'min' => 1,
                'max' => 2,
                'bobot' => 1.0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 2,
                'kriteria_id' => 1,
                'name' => 'Tidak Bekerja',
                'min' => 1,
                'max' => 2,
                'bobot' => 2.0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
