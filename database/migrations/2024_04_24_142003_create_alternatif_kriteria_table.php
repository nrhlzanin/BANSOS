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
        Schema::create('alternatif_kriteria', function (Blueprint $table) {
            $table->foreignId('id_alternatif')->constrained('alternatif', 'id_alternatif')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('id_kriteria')->constrained('kriteria', 'id_kriteria')->cascadeOnUpdate()->cascadeOnDelete();
            $table->float('nilai');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alternatif_kriteria');
    }
};
