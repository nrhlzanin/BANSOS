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
		Schema::create('kriteria', function (Blueprint $table) {
            $table->id('id_kriteria');
            $table->string('nama_kriteria');
            $table->enum('tipe', ['benefit', 'cost']);
            $table->float('bobot');
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
		Schema::dropIfExists('kriteria');
	}
};