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
            $table->unsignedBigInteger('id_warga')->index();
            $table->string('no_kk');
            $table->string('no_nik');
            $table->string('pekerjaan');
            $table->decimal('penghasilan', 15, 2);
            $table->string('pendidikan');
            $table->integer('jumlah_tanggungan');
            $table->string('tempat_tinggal');
            $table->enum('transportasi', [
                'Jalan Kaki dan/ Sepeda', 
                'Transportasi Umum', 
                '1 Kendaraan Bermotor', 
                '2 Kendaraan Bermotor', 
                '>2 Kendaraan Bermotor'
            ])->nullable();
            $table->integer('luas_bangunan')->nullable();
            $table->enum('jenis_atap', [
                'Genteng Tanah Liat', 
                'Genteng Metal', 
                'Asbes', 
                'Seng', 
                'Bambu', 
                'Jerami', 
                'Lainnya'
            ])->nullable();
            $table->enum('jenis_dinding', [
                'Tembok', 
                'Papan Kayu', 
                'Anyaman Bambu', 
                'Triplek', 
                'Batu Bata', 
                'Batako', 
                'Lainnya'
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
            $table->json('aset')->nullable();
            $table->enum('status_data', ['belum tervalidasi', 'tervalidasi'])->default('belum tervalidasi'); // Untuk status verifikasi data
            $table->enum('status_pengajuan', ['proses', 'diterima', 'ditolak'])->default('proses'); // Untuk status verifikasi pengajuan
            $table->text('foto_kk')->nullable();
            $table->text('foto_ktp')->nullable();
            $table->text('foto_slipgaji')->nullable();
            $table->timestamps();

            // Add foreign key constraints
            $table->foreign('id_warga')->references('id_warga')->on('warga');

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
