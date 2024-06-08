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
        Schema::create('warga', function (Blueprint $table) {
            $table->id('id_warga');
            $table->foreignId('id_user')->constrained('user', 'id_user')->onDelete('restrict')->onUpdate('restrict');
            $table->string('nama_kepalaKeluarga', 50);
            $table->string('no_telp', 13);
            $table->integer('no_rt');
            $table->string('no_kk', 16)->unique();
            $table->string('no_nik', 16)->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('warga');
    }
};
