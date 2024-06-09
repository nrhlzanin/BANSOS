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
        Schema::create('penilaian', function (Blueprint $table) {
            $table->id('id_penilaian');
            $table->foreignId('id_pengajuan')->constrained('pengajuan', 'id_pengajuan')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('id_kriteria')->constrained('kriteria', 'id_kriteria')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('id_subkriteria')->constrained('sub_kriteria', 'id_subkriteria')->onDelete('cascade')->onUpdate('cascade');
            // Tambahkan field lain jika diperlukan
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('penilaian');
    }
};
