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
        Schema::create('pengajuan', function (Blueprint $table) {
            $table->id('id_pengajuan');
            $table->foreignId('id_warga')->constrained('warga', 'id_warga')->onDelete('restrict')->onUpdate('restrict');
            $table->text('foto_kk')->nullable();
            $table->text('foto_ktp')->nullable();
            $table->string('pekerjaan', 50);
            $table->double('penghasilan', 7, );
            $table->text('foto_slipgaji')->nullable();
            $table->enum('pendidikan', [
                'tidak sekolah', 
                'SD', 
                'SMP', 
                'SMA', 
                'kuliah'
            ])->nullable();
            $table->integer('jumlah_tanggungan');
            $table->enum('tempat_tinggal', [
                'Kontrakan',
                'Menumpang', 
                'Rumah Pribadi'
            ])->nullable();
            $table->enum('transportasi', [
                'Jalan Kaki dan/ Sepeda', 
                'Transportasi Umum', 
                '1 Kendaraan Bermotor', 
                '2 Kendaraan Bermotor', 
                '>2 Kendaraan Bermotor'
            ])->nullable();
            $table->integer('luas_bangunan')->nullable();
            $table->enum('jenis_atap', [
                'Jerami', 
                'Bambu', 
                'Seng', 
                'Genteng Tanah Liat', 
                'Asbes', 
                'Genteng Metal',
            ])->nullable();
            $table->enum('jenis_dinding', [
                'Triplek', 
                'Anyaman Bambu', 
                'Papan Kayu', 
                'Batu Bata', 
                'Batako',
            ])->nullable();
            $table->enum('kelistrikan', [
                'Menumpang', 
                'Pribadi 450watt', 
                'Pribadi 900watt', 
                'Pribadi 1200watt', 
                'Pribadi >1200watt'
            ])->nullable();
            $table->enum('sumber_air_bersih', [
                'Sumur Swadaya', 
                'Sumur Tetangga', 
                'Sumur Pribadi', 
                'PDAM Terbatas', 
                'PDAM Bebas'
            ])->nullable();
            $table->enum('status_data', ['belum tervalidasi', 'tervalidasi'])->default('belum tervalidasi'); // Untuk status verifikasi data
            $table->enum('status_pengajuan', ['proses', 'diterima', 'ditolak'])->default('proses'); // Untuk status verifikasi pengajuan
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuan');
    }
};
