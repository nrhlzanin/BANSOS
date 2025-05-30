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
		Schema::create('sub_kriteria', function (Blueprint $table) {
            $table->id('id_subkriteria');
            $table->foreignId('id_kriteria')->constrained('kriteria', 'id_kriteria')->onDelete('cascade')->onUpdate('cascade');
            $table->string('nama_subkriteria');
            $table->float('nilai');
            // Tambahkan field lain jika diperlukan
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
		Schema::dropIfExists('sub_kriteria');
	}
};