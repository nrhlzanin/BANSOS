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
        Schema::create('rt', function (Blueprint $table) {
            $table->id('id_petugas');
            $table->foreignId('id_user')->constrained('user', 'id_user')->onDelete('restrict')->onUpdate('restrict');
            $table->string('nama_petugas', 50);
            $table->string('no_telp', 13);
            $table->integer('no_rt');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rt');
    }
};
