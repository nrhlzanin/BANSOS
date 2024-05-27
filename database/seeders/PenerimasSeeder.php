<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PenerimasSeeder extends Seeder
{
    public function run()
    {
        DB::table('penerimas')->insert([
            [
                'id' => 1,
                'status_desa' => 'Active',
                'status_warga' => 'Resident',
                'nama' => 'John Doe',
                'nik' => '1234567890',
                'email' => 'john@example.com',
                'tempat_lahir' => 'City A',
                'tgl_lahir' => '1980-01-01',
                'jenis_bantuan' => 'Type A',
                'provinsi' => 'Province A',
                'kabupaten' => 'Kabupaten A',
                'kecamatan' => 'Kecamatan A',
                'desa' => 'Desa A',
                'telepon' => '081234567890',
                'jmlh_bantuan' => 1000000,
                'rt_rw' => '01/02',
                'kode_pos' => '12345',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 2,
                'status_desa' => 'Inactive',
                'status_warga' => 'Non-Resident',
                'nama' => 'Jane Doe',
                'nik' => '0987654321',
                'email' => 'jane@example.com',
                'tempat_lahir' => 'City B',
                'tgl_lahir' => '1990-02-02',
                'jenis_bantuan' => 'Type B',
                'provinsi' => 'Province B',
                'kabupaten' => 'Kabupaten B',
                'kecamatan' => 'Kecamatan B',
                'desa' => 'Desa B',
                'telepon' => '082345678901',
                'jmlh_bantuan' => 2000000,
                'rt_rw' => '03/04',
                'kode_pos' => '54321',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // Tambahkan lebih banyak entri sesuai kebutuhan
        ]);
    }
}
