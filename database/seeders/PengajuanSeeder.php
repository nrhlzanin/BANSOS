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
                'no_kk' => '1234567890123456',
                'no_nik' => '3201010101010001',
                'pekerjaan' => 'Petani',
                'penghasilan' => mapPenghasilan(2000000),
                'pendidikan' => $pendidikanMapping['SMA'],
                'jumlah_tanggungan' => 3,
                'tempat_tinggal' => $tempatTinggalMapping['Menumpang'],
                'transportasi' => $transportasiMapping['1 Kendaraan Bermotor'],
                'luas_bangunan' => 45,
                'jenis_atap' => $jenisAtapMapping['Genteng Tanah Liat'],
                'jenis_dinding' => $jenisDindingMapping['Anyaman Bambu'],
                'kelistrikan' => $kelistrikanMapping['Pribadi 450watt'],
                'sumber_air_bersih' => $sumberAirMapping['Sumur Pribadi'],
                'aset' => json_encode(['Sepeda', 'Motor']),
                'status_data' => 'tervalidasi',
                'status_pengajuan' => 'proses',
                'foto_kk' => $faker->imageUrl(),
                'foto_ktp' => $faker->imageUrl(),
                'foto_slipgaji' => $faker->imageUrl(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_pengajuan' => 2,
                'id_warga' => 2,
                'no_kk' => '1234567890123457',
                'no_nik' => '3201010101010002',
                'pekerjaan' => 'Pedagang',
                'penghasilan' => mapPenghasilan(3000000),
                'pendidikan' => $pendidikanMapping['SMP'],
                'jumlah_tanggungan' => 4,
                'tempat_tinggal' => $tempatTinggalMapping['Kontrakan'],
                'transportasi' => $transportasiMapping['Transportasi Umum'],
                'luas_bangunan' => 60,
                'jenis_atap' => $jenisAtapMapping['Genteng Metal'],
                'jenis_dinding' => $jenisDindingMapping['Batu Bata'],
                'kelistrikan' => $kelistrikanMapping['Pribadi 900watt'],
                'sumber_air_bersih' => $sumberAirMapping['PDAM Bebas'],
                'aset' => json_encode(['Motor']),
                'status_data' => 'tervalidasi',
                'status_pengajuan' => 'proses',
                'foto_kk' => $faker->imageUrl(),
                'foto_ktp' => $faker->imageUrl(),
                'foto_slipgaji' => $faker->imageUrl(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_pengajuan' => 3,
                'id_warga' => 3,
                'no_kk' => '1234567890123458',
                'no_nik' => '3201010101010003',
                'pekerjaan' => 'Guru',
                'penghasilan' => mapPenghasilan(4000000),
                'pendidikan' => $pendidikanMapping['kuliah'],
                'jumlah_tanggungan' => 2,
                'tempat_tinggal' => $tempatTinggalMapping['Rumah Pribadi'],
                'transportasi' => $transportasiMapping['2 Kendaraan Bermotor'],
                'luas_bangunan' => 70,
                'jenis_atap' => $jenisAtapMapping['Asbes'],
                'jenis_dinding' => $jenisDindingMapping['Batako'],
                'kelistrikan' => $kelistrikanMapping['Pribadi 1200watt'],
                'sumber_air_bersih' => $sumberAirMapping['PDAM Terbatas'],
                'aset' => json_encode(['Motor', 'Mobil']),
                'status_data' => 'tervalidasi',
                'status_pengajuan' => 'proses',
                'foto_kk' => $faker->imageUrl(),
                'foto_ktp' => $faker->imageUrl(),
                'foto_slipgaji' => $faker->imageUrl(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_pengajuan' => 4,
                'id_warga' => 4,
                'no_kk' => '1234567890123459',
                'no_nik' => '3201010101010004',
                'pekerjaan' => 'Buruh',
                'penghasilan' => mapPenghasilan(1500000),
                'pendidikan' => $pendidikanMapping['SD'],
                'jumlah_tanggungan' => 5,
                'tempat_tinggal' => $tempatTinggalMapping['Menumpang'],
                'transportasi' => $transportasiMapping['Jalan Kaki dan/ Sepeda'],
                'luas_bangunan' => 50,
                'jenis_atap' => $jenisAtapMapping['Seng'],
                'jenis_dinding' => $jenisDindingMapping['Anyaman Bambu'],
                'kelistrikan' => $kelistrikanMapping['Menumpang'],
                'sumber_air_bersih' => $sumberAirMapping['Sumur Tetangga'],
                'aset' => json_encode(['Sepeda']),
                'status_data' => 'tervalidasi',
                'status_pengajuan' => 'proses',
                'foto_kk' => $faker->imageUrl(),
                'foto_ktp' => $faker->imageUrl(),
                'foto_slipgaji' => $faker->imageUrl(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_pengajuan' => 5,
                'id_warga' => 5,
                'no_kk' => '1234567890123460',
                'no_nik' => '3201010101010005',
                'pekerjaan' => 'PNS',
                'penghasilan' => mapPenghasilan(5000000),
                'pendidikan' => $pendidikanMapping['kuliah'],
                'jumlah_tanggungan' => 1,
                'tempat_tinggal' => $tempatTinggalMapping['Rumah Pribadi'],
                'transportasi' => $transportasiMapping['>2 Kendaraan Bermotor'],
                'luas_bangunan' => 80,
                'jenis_atap' => $jenisAtapMapping['Genteng Metal'],
                'jenis_dinding' => $jenisDindingMapping['Batako'],
                'kelistrikan' => $kelistrikanMapping['Pribadi >1200watt'],
                'sumber_air_bersih' => $sumberAirMapping['PDAM Bebas'],
                'aset' => json_encode(['Motor', 'Mobil', 'Rumah']),
                'status_data' => 'tervalidasi',
                'status_pengajuan' => 'proses',
                'foto_kk' => $faker->imageUrl(),
                'foto_ktp' => $faker->imageUrl(),
                'foto_slipgaji' => $faker->imageUrl(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // Tambahkan 5 entri tambahan di bawah ini
            [
                'id_pengajuan' => 6,
                'id_warga' => 6,
                'no_kk' => '1234567890123461',
                'no_nik' => '3201010101010006',
                'pekerjaan' => 'Wiraswasta',
                'penghasilan' => mapPenghasilan(3500000),
                'pendidikan' => $pendidikanMapping['SMA'],
                'jumlah_tanggungan' => 3,
                'tempat_tinggal' => $tempatTinggalMapping['Rumah Pribadi'],
                'transportasi' => $transportasiMapping['2 Kendaraan Bermotor'],
                'luas_bangunan' => 65,
                'jenis_atap' => $jenisAtapMapping['Genteng Tanah Liat'],
                'jenis_dinding' => $jenisDindingMapping['Batako'],
                'kelistrikan' => $kelistrikanMapping['Pribadi 900watt'],
                'sumber_air_bersih' => $sumberAirMapping['Sumur Pribadi'],
                'aset' => json_encode(['Motor', 'Mobil']),
                'status_data' => 'tervalidasi',
                'status_pengajuan' => 'proses',
                'foto_kk' => $faker->imageUrl(),
                'foto_ktp' => $faker->imageUrl(),
                'foto_slipgaji' => $faker->imageUrl(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_pengajuan' => 7,
                'id_warga' => 7,
                'no_kk' => '1234567890123462',
                'no_nik' => '3201010101010007',
                'pekerjaan' => 'Nelayan',
                'penghasilan' => mapPenghasilan(2500000),
                'pendidikan' => $pendidikanMapping['SMP'],
                'jumlah_tanggungan' => 4,
                'tempat_tinggal' => $tempatTinggalMapping['Menumpang'],
                'transportasi' => $transportasiMapping['Transportasi Umum'],
                'luas_bangunan' => 55,
                'jenis_atap' => $jenisAtapMapping['Asbes'],
                'jenis_dinding' => $jenisDindingMapping['Batako'],
                'kelistrikan' => $kelistrikanMapping['Pribadi 450watt'],
                'sumber_air_bersih' => $sumberAirMapping['Sumur Tetangga'],
                'aset' => json_encode(['Perahu', 'Motor']),
                'status_data' => 'tervalidasi',
                'status_pengajuan' => 'proses',
                'foto_kk' => $faker->imageUrl(),
                'foto_ktp' => $faker->imageUrl(),
                'foto_slipgaji' => $faker->imageUrl(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_pengajuan' => 8,
                'id_warga' => 8,
                'no_kk' => '1234567890123463',
                'no_nik' => '3201010101010008',
                'pekerjaan' => 'Karyawan Swasta',
                'penghasilan' => mapPenghasilan(450000),
                'pendidikan' => $pendidikanMapping['kuliah'],
                'jumlah_tanggungan' => 2,
                'tempat_tinggal' => $tempatTinggalMapping['Rumah Pribadi'],
                'transportasi' => $transportasiMapping['1 Kendaraan Bermotor'],
                'luas_bangunan' => 75,
                'jenis_atap' => $jenisAtapMapping['Genteng Metal'],
                'jenis_dinding' => $jenisDindingMapping['Batako'],
                'kelistrikan' => $kelistrikanMapping['Pribadi 1200watt'],
                'sumber_air_bersih' => $sumberAirMapping['PDAM Terbatas'],
                'aset' => json_encode(['Motor', 'Mobil', 'Tanah']),
                'status_data' => 'tervalidasi',
                'status_pengajuan' => 'proses',
                'foto_kk' => $faker->imageUrl(),
                'foto_ktp' => $faker->imageUrl(),
                'foto_slipgaji' => $faker->imageUrl(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_pengajuan' => 9,
                'id_warga' => 9,
                'no_kk' => '1234567890123464',
                'no_nik' => '3201010101010009',
                'pekerjaan' => 'Peternak',
                'penghasilan' => mapPenghasilan(2700000),
                'pendidikan' => $pendidikanMapping['SD'],
                'jumlah_tanggungan' => 5,
                'tempat_tinggal' => $tempatTinggalMapping['Rumah Pribadi'],
                'transportasi' => $transportasiMapping['Jalan Kaki dan/ Sepeda'],
                'luas_bangunan' => 40,
                'jenis_atap' => $jenisAtapMapping['Seng'],
                'jenis_dinding' => $jenisDindingMapping['Anyaman Bambu'],
                'kelistrikan' => $kelistrikanMapping['Menumpang'],
                'sumber_air_bersih' => $sumberAirMapping['Sumur Tetangga'],
                'aset' => json_encode(['Sepeda', 'Hewan Ternak']),
                'status_data' => 'tervalidasi',
                'status_pengajuan' => 'proses',
                'foto_kk' => $faker->imageUrl(),
                'foto_ktp' => $faker->imageUrl(),
                'foto_slipgaji' => $faker->imageUrl(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_pengajuan' => 10,
                'id_warga' => 10,
                'no_kk' => '1234567890123465',
                'no_nik' => '3201010101010010',
                'pekerjaan' => 'Supir',
                'penghasilan' => mapPenghasilan(2200000),
                'pendidikan' => $pendidikanMapping['SMA'],
                'jumlah_tanggungan' => 4,
                'tempat_tinggal' => $tempatTinggalMapping['Kontrakan'],
                'transportasi' => $transportasiMapping['1 Kendaraan Bermotor'],
                'luas_bangunan' => 60,
                'jenis_atap' => $jenisAtapMapping['Jerami'],
                'jenis_dinding' => $jenisDindingMapping['Batu Bata'],
                'kelistrikan' => $kelistrikanMapping['Pribadi 450watt'],
                'sumber_air_bersih' => $sumberAirMapping['Sumur Swadaya'],
                'aset' => json_encode(['Motor']),
                'status_data' => 'tervalidasi',
                'status_pengajuan' => 'proses',
                'foto_kk' => $faker->imageUrl(),
                'foto_ktp' => $faker->imageUrl(),
                'foto_slipgaji' => $faker->imageUrl(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        DB::table('pengajuan')->insert($data);
    }
}
