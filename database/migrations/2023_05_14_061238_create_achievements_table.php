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
        Schema::create('achievements', function (Blueprint $table) {
            $table->char('id',16)->primary();
            $table->char('npsn',8)->nullable();
            $table->foreign('npsn')->references('npsn')->on('users')->onDelete('cascade');
            $table->string('nama_siswa');
            $table->string('nama_lomba');
            $table->string('penyelenggara');
            $table->string('prestasi');
            $table->date('waktu');
            $table->tinyInteger('tingkat'); // 0 kabkota - 1 provinsi - 2 nasional - 3 internasional
            $table->tinyInteger('jenis_lomba'); // 0 jenjang - 1 Tidak jenjang
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('achievements');
    }
};
