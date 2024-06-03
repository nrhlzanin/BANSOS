<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            WargaSeeder::class,
            PengajuanSeeder::class,
            RwSeeder::class,
            RtSeeder::class,
            KriteriaSeeder::class,
            SubKriteriaSeeder::class,
            AlternatifSeeder::class,
            JenisBansosSeeder::class,
            BansosSeeder::class,
            PenerimaBansosSeeder::class,
            AlternatifKriteriaSeeder::class,
        ]);
    }
}
