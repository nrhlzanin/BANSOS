<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Carbon\Carbon;

class PengajuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        function mapPenghasilan($penghasilan)
        {
            if ($penghasilan <= 550000) {
                return 1;
            } elseif ($penghasilan > 550000 && $penghasilan <= 1000000) {
                return 2;
            } elseif ($penghasilan > 1000000 && $penghasilan <= 1500000) {
                return 3;
            } elseif ($penghasilan > 1500000 && $penghasilan <= 2000000) {
                return 4;
            } else {
                return 5;
            }
        }
        // Mapping untuk nilai pendidikan
        $pendidikanMapping = [
            'tidak sekolah' => 1,
            'SD' => 2,
            'SMP' => 3,
            'SMA' => 4,
            'kuliah' => 5
        ];
        // Mapping untuk tempat tinggal
        $tempatTinggalMapping =[
            'Kontrakan' => 1,
            'Menumpang' => 2,
            'Rumah Pribadi' => 3
        ];
        // Mapping untuk transportasi
        $transportasiMapping = [
            'Jalan Kaki dan/ Sepeda' => 1,
            'Transportasi Umum' => 2,
            '1 Kendaraan Bermotor' => 3,
            '2 Kendaraan Bermotor' => 4,
            '>2 Kendaraan Bermotor' => 5,
        ];
        // Mapping untuk jenis atap
        $jenisAtapMapping = [
            'Jerami' => 1,
            'Bambu' => 2,
            'Seng' => 3,
            'Genteng Tanah Liat' => 4,
            'Asbes' => 5,
            'Genteng Metal' => 6,
        ];
        // Mapping untuk jenis dinding
        $jenisDindingMapping = [
            'Triplek' => 1,
            'Anyaman Bambu' => 2,
            'Papan Kayu' => 3,
            'Batu Bata' => 4,
            'Batako' => 5,
        ];
        // Mapping untuk kelistrikan
        $kelistrikanMapping = [
            'Menumpang' => 1,
            'Pribadi 450watt' => 2,
            'Pribadi 900watt' => 3,
            'Pribadi 1200watt' => 4,
            'Pribadi >1200watt' => 5,
        ];
        // Mapping untuk sumber air bersih
        $sumberAirMapping = [
            'Sumur Swadaya' => 1,
            'Sumur Tetangga' => 2,
            'Sumur Pribadi' => 3,
            'PDAM Terbatas' => 4,
            'PDAM Bebas' => 5,
        ];
// =======================================
        $data = [
            [
                'id_pengajuan' => 1,
                'id_warga' => 1,
                'foto_kk' => null,
                'foto_ktp' => null,
                'pekerjaan' => 'Bekerja',
                'penghasilan' => mapPenghasilan(2000000),
                'foto_slipgaji' => $faker->imageUrl(),
                'pendidikan' => $pendidikanMapping['SMA'],
                'jumlah_tanggungan' => 3,
                'tempat_tinggal' => $tempatTinggalMapping['Menumpang'],
                'transportasi' => $transportasiMapping['1 Kendaraan Bermotor'],
                'luas_bangunan' => '0-50 m2',
                'jenis_atap' => $jenisAtapMapping['Genteng Tanah Liat'],
                'jenis_dinding' => $jenisDindingMapping['Anyaman Bambu'],
                'kelistrikan' => $kelistrikanMapping['Pribadi 450watt'],
                'sumber_air_bersih' => $sumberAirMapping['Sumur Pribadi'],
                'status_data' => 'tervalidasi',
                'status_pengajuan' => 'proses',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_pengajuan' => 2,
                'id_warga' => 2,
                'foto_kk' => null,
                'foto_ktp' => null,
                'pekerjaan' => 'Bekerja',
                'penghasilan' => mapPenghasilan(3000000),
                'foto_slipgaji' => $faker->imageUrl(),
                'pendidikan' => $pendidikanMapping['SMP'],
                'jumlah_tanggungan' => 4,
                'tempat_tinggal' => $tempatTinggalMapping['Kontrakan'],
                'transportasi' => $transportasiMapping['Transportasi Umum'],
                'luas_bangunan' => '>50-100m2',
                'jenis_atap' => $jenisAtapMapping['Genteng Metal'],
                'jenis_dinding' => $jenisDindingMapping['Batu Bata'],
                'kelistrikan' => $kelistrikanMapping['Pribadi 900watt'],
                'sumber_air_bersih' => $sumberAirMapping['PDAM Bebas'],
                'status_data' => 'tervalidasi',
                'status_pengajuan' => 'proses',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_pengajuan' => 3,
                'id_warga' => 3,
                'foto_kk' => null,
                'foto_ktp' => null,
                'pekerjaan' => 'Bekerja',
                'penghasilan' => mapPenghasilan(4000000),
                'foto_slipgaji' => $faker->imageUrl(),
                'pendidikan' => $pendidikanMapping['kuliah'],
                'jumlah_tanggungan' => 2,
                'tempat_tinggal' => $tempatTinggalMapping['Rumah Pribadi'],
                'transportasi' => $transportasiMapping['2 Kendaraan Bermotor'],
                'luas_bangunan' => '>50-100m2',
                'jenis_atap' => $jenisAtapMapping['Asbes'],
                'jenis_dinding' => $jenisDindingMapping['Batako'],
                'kelistrikan' => $kelistrikanMapping['Pribadi 1200watt'],
                'sumber_air_bersih' => $sumberAirMapping['PDAM Terbatas'],
                'status_data' => 'tervalidasi',
                'status_pengajuan' => 'proses',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_pengajuan' => 4,
                'id_warga' => 4,
                'foto_kk' => null,
                'foto_ktp' => null,
                'pekerjaan' => 'Bekerja',
                'penghasilan' => mapPenghasilan(1500000),
                'foto_slipgaji' => $faker->imageUrl(),
                'pendidikan' => $pendidikanMapping['SD'],
                'jumlah_tanggungan' => 5,
                'tempat_tinggal' => $tempatTinggalMapping['Menumpang'],
                'transportasi' => $transportasiMapping['Jalan Kaki dan/ Sepeda'],
                'luas_bangunan' => '0-50 m2',
                'jenis_atap' => $jenisAtapMapping['Seng'],
                'jenis_dinding' => $jenisDindingMapping['Anyaman Bambu'],
                'kelistrikan' => $kelistrikanMapping['Menumpang'],
                'sumber_air_bersih' => $sumberAirMapping['Sumur Tetangga'],
                'status_data' => 'tervalidasi',
                'status_pengajuan' => 'proses',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_pengajuan' => 5,
                'id_warga' => 5,
                'foto_kk' => null,
                'foto_ktp' => null,
                'pekerjaan' => 'Bekerja',
                'penghasilan' => mapPenghasilan(5000000),
                'foto_slipgaji' => $faker->imageUrl(),
                'pendidikan' => $pendidikanMapping['kuliah'],
                'jumlah_tanggungan' => 1,
                'tempat_tinggal' => $tempatTinggalMapping['Rumah Pribadi'],
                'transportasi' => $transportasiMapping['>2 Kendaraan Bermotor'],
                'luas_bangunan' => '>50-100m2',
                'jenis_atap' => $jenisAtapMapping['Genteng Metal'],
                'jenis_dinding' => $jenisDindingMapping['Batako'],
                'kelistrikan' => $kelistrikanMapping['Pribadi >1200watt'],
                'sumber_air_bersih' => $sumberAirMapping['PDAM Bebas'],
                'status_data' => 'tervalidasi',
                'status_pengajuan' => 'proses',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // Tambahkan 5 entri tambahan di bawah ini
            [
                'id_pengajuan' => 6,
                'id_warga' => 6,
                'foto_kk' => null,
                'foto_ktp' => null,
                'pekerjaan' => 'Bekerja',
                'penghasilan' => mapPenghasilan(3500000),
                'foto_slipgaji' => $faker->imageUrl(),
                'pendidikan' => $pendidikanMapping['SMA'],
                'jumlah_tanggungan' => 3,
                'tempat_tinggal' => $tempatTinggalMapping['Rumah Pribadi'],
                'transportasi' => $transportasiMapping['2 Kendaraan Bermotor'],
                'luas_bangunan' => '>50-100m2',
                'jenis_atap' => $jenisAtapMapping['Genteng Tanah Liat'],
                'jenis_dinding' => $jenisDindingMapping['Batako'],
                'kelistrikan' => $kelistrikanMapping['Pribadi 900watt'],
                'sumber_air_bersih' => $sumberAirMapping['Sumur Pribadi'],
                'status_data' => 'tervalidasi',
                'status_pengajuan' => 'proses',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_pengajuan' => 7,
                'id_warga' => 7,
                'foto_kk' => null,
                'foto_ktp' => null,
                'pekerjaan' => 'Bekerja',
                'penghasilan' => mapPenghasilan(2500000),
                'foto_slipgaji' => $faker->imageUrl(),
                'pendidikan' => $pendidikanMapping['SMP'],
                'jumlah_tanggungan' => 4,
                'tempat_tinggal' => $tempatTinggalMapping['Menumpang'],
                'transportasi' => $transportasiMapping['Transportasi Umum'],
                'luas_bangunan' => '>50-100m2',
                'jenis_atap' => $jenisAtapMapping['Asbes'],
                'jenis_dinding' => $jenisDindingMapping['Batako'],
                'kelistrikan' => $kelistrikanMapping['Pribadi 450watt'],
                'sumber_air_bersih' => $sumberAirMapping['Sumur Tetangga'],
                'status_data' => 'tervalidasi',
                'status_pengajuan' => 'proses',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_pengajuan' => 8,
                'id_warga' => 8,
                'foto_kk' => null,
                'foto_ktp' => null,
                'pekerjaan' => 'Tidak Bekerja',
                'penghasilan' => mapPenghasilan(450000),
                'pendidikan' => $pendidikanMapping['kuliah'],
                'jumlah_tanggungan' => 2,
                'tempat_tinggal' => $tempatTinggalMapping['Rumah Pribadi'],
                'transportasi' => $transportasiMapping['1 Kendaraan Bermotor'],
                'luas_bangunan' => '>50-100m2',
                'jenis_atap' => $jenisAtapMapping['Genteng Metal'],
                'jenis_dinding' => $jenisDindingMapping['Batako'],
                'kelistrikan' => $kelistrikanMapping['Pribadi 1200watt'],
                'sumber_air_bersih' => $sumberAirMapping['PDAM Terbatas'],
                'status_data' => 'tervalidasi',
                'status_pengajuan' => 'proses',
                'foto_slipgaji' => $faker->imageUrl(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_pengajuan' => 9,
                'id_warga' => 9,
                'foto_kk' => null,
                'foto_ktp' => null,
                'pekerjaan' => 'Bekerja',
                'penghasilan' => mapPenghasilan(2700000),
                'foto_slipgaji' => $faker->imageUrl(),
                'pendidikan' => $pendidikanMapping['SD'],
                'jumlah_tanggungan' => 5,
                'tempat_tinggal' => $tempatTinggalMapping['Rumah Pribadi'],
                'transportasi' => $transportasiMapping['Jalan Kaki dan/ Sepeda'],
                'luas_bangunan' => '0-50 m2',
                'jenis_atap' => $jenisAtapMapping['Seng'],
                'jenis_dinding' => $jenisDindingMapping['Anyaman Bambu'],
                'kelistrikan' => $kelistrikanMapping['Menumpang'],
                'sumber_air_bersih' => $sumberAirMapping['Sumur Tetangga'],
                'status_data' => 'tervalidasi',
                'status_pengajuan' => 'proses',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_pengajuan' => 10,
                'id_warga' => 10,
                'foto_kk' => null,
                'foto_ktp' => null,
                'pekerjaan' => 'Bekerja',
                'penghasilan' => mapPenghasilan(2200000),
                'foto_slipgaji' => $faker->imageUrl(),
                'pendidikan' => $pendidikanMapping['SMA'],
                'jumlah_tanggungan' => 4,
                'tempat_tinggal' => $tempatTinggalMapping['Kontrakan'],
                'transportasi' => $transportasiMapping['1 Kendaraan Bermotor'],
                'luas_bangunan' => '>50-100m2',
                'jenis_atap' => $jenisAtapMapping['Jerami'],
                'jenis_dinding' => $jenisDindingMapping['Batu Bata'],
                'kelistrikan' => $kelistrikanMapping['Pribadi 450watt'],
                'sumber_air_bersih' => $sumberAirMapping['Sumur Swadaya'],
                'status_data' => 'tervalidasi',
                'status_pengajuan' => 'proses',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        DB::table('pengajuan')->insert($data);
    }
}
