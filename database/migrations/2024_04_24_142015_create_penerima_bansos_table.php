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
            $table->foreignId('id_bansos')->constrained('bansos', 'id_bansos')->onDelete('restrict')->onUpdate('restrict');
            $table->foreignId('id_petugas')->constrained('rt', 'id_petugas')->onDelete('restrict')->onUpdate('restrict');
            $table->foreignId('id_admin')->constrained('rw', 'id_admin')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('id_alternatif')->index();
            $table->foreign('id_alternatif')->references('id_alternatif')->on('alternatif');
            $table->date('tanggal_penerimaan');
            $table->string('keterangan', 100);
            $table->timestamps();
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
