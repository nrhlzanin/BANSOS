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
                'name' => 'Pekerjaan Kepala Keluarga', // Perhatikan penggunaan 'name' di sini
                'bobot' => 1.0, // Atur bobot sesuai kebutuhan Anda
                'type' => true, // Atur tipe sesuai kebutuhan Anda
                'min' => null, // Atur nilai minimum sesuai kebutuhan Anda
                'max' => null, // Atur nilai maksimum sesuai kebutuhan Anda
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // Tambahkan lebih banyak entri sesuai kebutuhan
        ]);
        
    }
}
