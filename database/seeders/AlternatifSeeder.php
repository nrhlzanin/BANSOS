<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Alternatifseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('alternatifs')->insert([
            [
                'id'=> 1,
                'kode'=>'ALT001',
                'name'=>'Ahmad Supriyadi',	
                'gender'=>'1',
                'phone'=>'081234567890',	
                'email'=>'ahmad@example.com',
                'address'=>'Jl. Merdeka No.1, Jakarta',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id'=> 2,
                'kode'=>'ALT002',
                'name'=>'Siti Aminah',	
                'gender'=>'2',
                'phone' => '081234567891', 
                'email' => 'siti@example.com', 
                'address' => 'Jl. Kebangsaan No.2, Bandung', 
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ]);
    }
}
