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
            $table->string('no_kk', 20);
            $table->string('nik', 20);
            $table->enum('status', ['Pernah', 'Tidak pernah']);
            $table->enum('agama', ['Islam', 'Protestan', 'Katholik', 'Hindu', 'Budha', 'Konghucu']);
            $table->string('alamat', 100);
            $table->string('pekerjaan', 30);
            $table->string('no_telp', 15);
            $table->enum('pengeluaran', ['< 500.000', '>=500.000 - <=1.000.000', '>1.000.000 - <=2.500.000', '>2.500.000']);
            $table->enum('pendapatan', ['< 500.000', '>=500.000 - <=1.000.000', '>1.000.000 - <=2.500.000', '>2.500.000']);
            $table->integer('jml_tanggungan');
            $table->enum('jenis_bansos', ['BPNT', 'BLT', 'PKH', 'BSB']);
            $table->string('keterangan', 100);
            $table->timestamps();

            // Add foreign key constraints
            $table->foreign('id_jenisbansos')->references('id_jenisbansos')->on('bansos');
            $table->foreign('id_petugas')->references('id_petugas')->on('rt');
            $table->foreign('id_admin')->references('id_admin')->on('rw');
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