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
        Schema::create('detail_hasil', function (Blueprint $table) {
            $table->id('id_detail');
            $table->foreignId('id_hasil')->constrained('hasil', 'id_hasil')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('id_kriteria')->constrained('kriteria', 'id_kriteria')->onDelete('cascade')->onUpdate('cascade');
            $table->float('nilai');
            // Tambahkan field lain jika diperlukan
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('detail_hasil');
    }
};
