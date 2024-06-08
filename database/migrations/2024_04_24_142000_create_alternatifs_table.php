<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alternatif', function (Blueprint $table) {
            $table->id('id_alternatif');
            $table->unsignedBigInteger('id_pengajuan')->index();
            $table->foreign('id_pengajuan')->references('id_pengajuan')->on('pengajuan')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alternatif');
    }
};
