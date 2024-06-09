<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class PenerimaBansosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('penerima_bansos')->insert([
            [
                'id_penerimabansos' => 1,
                'id_bansos' => 1,
                'id_alternatif' => 1,
                'tanggal_penerimaan' => Carbon::now(),
                'keterangan' => 'received successfully',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_penerimabansos' => 2,
                'id_bansos' => 2,
                'id_alternatif' => 2,
                'tanggal_penerimaan' => Carbon::now(),
                'keterangan' => 'received successfully',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
