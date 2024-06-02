<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PengajuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pengajuan')->insert([
            [
                'id_pengajuan' => 1,
                'id_warga' => 1,
                'no_kk' => '1234567890',
                'no_nik' => '987654321',
                'nama' => 'Ahmad Fauzi',
                'no_rt' => 4,
                'pekerjaan' => 'Benerja',
                'penghasilan' => 1500000.00,
                'pendidikan' => 'SMA',
                'jumlah_tanggungan' => 3,
                'tempat_tinggal' => 'Kontrak',
                'status' => 'Pending',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_pengajuan' => 2,
                'id_warga' => 2,
                'no_kk' => '1234567890',
                'no_nik' => '987654321',
                'nama' => 'Siti Aminah',
                'no_rt' => 5,
                'pekerjaan' => 'Bekerja',
                'penghasilan' => 45000.00,
                'pendidikan' => 'SMP',
                'jumlah_tanggungan' => 2,
                'tempat_tinggal' => 'Menumpang',
                'status' => 'Pending',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
