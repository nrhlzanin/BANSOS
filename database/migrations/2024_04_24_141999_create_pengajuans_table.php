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
            $table->string('nama');
            $table->integer('no_rt');
            $table->string('pekerjaan');
            $table->decimal('penghasilan', 15, 2);
            $table->string('pendidikan');
            $table->integer('jumlah_tanggungan');
            $table->string('tempat_tinggal');
            $table->string('status')->default('pending'); // Untuk status verifikasi
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
