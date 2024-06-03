<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class WargaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'id_warga' => 1,
                'id_user' => 5,
                'nama_kepalaKeluarga' => 'Ahmad Fauzi',
                'no_telp' => '081234567890',
                'no_rt' => 4,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_warga' => 2,
                'id_user' => 6,
                'nama_kepalaKeluarga' => 'Siti Aminah',
                'no_telp' => '081234567891',
                'no_rt' => 5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_warga' => 3,
                'id_user' => 7,
                'nama_kepalaKeluarga' => 'Budi Santoso',
                'no_telp' => '081234567892',
                'no_rt' => 6,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_warga' => 4,
                'id_user' => 8,
                'nama_kepalaKeluarga' => 'Heri Susanto',
                'no_telp' => '081234567893',
                'no_rt' => 4,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_warga' => 5,
                'id_user' => 9,
                'nama_kepalaKeluarga' => 'Jordi Hartono',
                'no_telp' => '081234567894',
                'no_rt' => 5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_warga' => 6,
                'id_user' => 10,
                'nama_kepalaKeluarga' => 'Yandi Setiawan',
                'no_telp' => '081234567895',
                'no_rt' => 6,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_warga' => 7,
                'id_user' => 11,
                'nama_kepalaKeluarga' => 'Dery Ramdani',
                'no_telp' => '081234567896',
                'no_rt' => 4,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_warga' => 8,
                'id_user' => 12,
                'nama_kepalaKeluarga' => 'Yuki Pratama',
                'no_telp' => '081234567897',
                'no_rt' => 5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_warga' => 9,
                'id_user' => 13,
                'nama_kepalaKeluarga' => 'Supriadi',
                'no_telp' => '081234567898',
                'no_rt' => 6,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_warga' => 10,
                'id_user' => 14,
                'nama_kepalaKeluarga' => 'Bejo Wibowo',
                'no_telp' => '081234567899',
                'no_rt' => 4,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];
        DB::table('warga')->insert($data);
    }
}
