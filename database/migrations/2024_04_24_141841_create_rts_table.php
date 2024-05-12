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
            $table->unsignedBigInteger('id_user')->index();
            $table->foreign('id_user')->references('id_user')->on('user');
            $table->string('nama_petugas', 50);
            $table->string('no_telp', 15);
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
