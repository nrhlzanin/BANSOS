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
        Schema::create('penerima_bansos', function (Blueprint $table) {
            $table->id('id_penerimabansos');
            $table->unsignedBigInteger('id_jenisbansos')->index();
            $table->unsignedBigInteger('id_petugas')->index();
            $table->unsignedBigInteger('id_admin')->index();
            $table->unsignedBigInteger('id_pengajuan')->index();
            $table->date('tanggal_penerimaan');
            $table->string('keterangan', 100);
            $table->timestamps();

            // Add foreign key constraints
            $table->foreign('id_jenisbansos')->references('id_jenisbansos')->on('bansos');
            $table->foreign('id_petugas')->references('id_petugas')->on('rt');
            $table->foreign('id_admin')->references('id_admin')->on('rw');
            $table->foreign('id_pengajuan')->references('id_pengajuan')->on('pengajuan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penerima_bansos');
    }
};
