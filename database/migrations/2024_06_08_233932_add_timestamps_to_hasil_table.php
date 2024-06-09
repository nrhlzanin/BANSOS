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
        Schema::create('hasil', function (Blueprint $table) {
            $table->id('id_hasil');
            $table->foreignId('id_pengajuan')->constrained('pengajuan', 'id_pengajuan')->onDelete('cascade')->onUpdate('cascade');
            $table->float('nilai_total');
            $table->enum('status', ['proses', 'diterima', 'ditolak']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('hasil_spk');
    }
};
