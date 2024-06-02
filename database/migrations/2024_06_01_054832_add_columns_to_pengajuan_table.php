<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('pengajuan', function (Blueprint $table) {
            $table->enum('transportasi', [
                'Jalan Kaki dan/ Sepeda', 
                'Transportasi Umum', 
                '1 Kendaraan Bermotor', 
                '2 Kendaraan Bermotor', 
                '>2 Kendaraan Bermotor'
            ])->after('status')->nullable();
            $table->integer('luas_bangunan')->after('status')->nullable();
            $table->enum('jenis_atap', [
                'Genteng Tanah Liat', 
                'Genteng Metal', 
                'Asbes', 
                'Seng', 
                'Bambu', 
                'Jerami', 
                'Lainnya'
            ])->after('status')->nullable();
            $table->enum('jenis_dinding', [
                'Tembok', 
                'Papan Kayu', 
                'Anyaman Bambu', 
                'Triplek', 
                'Batu Bata', 
                'Batako', 
                'Lainnya'
            ])->after('status')->nullable();
            $table->enum('kelistrikan', [
                'Menumpang', 
                'Pribadi 450watt', 
                'Pribadi 900watt', 
                'Pribadi 1200watt', 
                'Pribadi >1200watt'
            ])->after('status')->nullable();
            $table->enum('sumber_air_bersih', [
                'Sumur Swadaya', 
                'Sumur Tetangga', 
                'Sumur Pribadi', 
                'PDAM Terbatas', 
                'PDAM Bebas'
            ])->after('status')->nullable();
            $table->json('aset')->after('status')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pengajuan', function (Blueprint $table) {
            $table->dropColumn('transportasi');
            $table->dropColumn('luas_bangunan');
            $table->dropColumn('jenis_atap');
            $table->dropColumn('jenis_dinding');
            $table->dropColumn('kelistrikan');
            $table->dropColumn('sumber_air_bersih');
            $table->dropColumn('aset');
        });
    }
};

