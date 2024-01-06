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
        Schema::create('jadwal_m_k_s', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mata_kuliah_id')->constrained('mata_kuliahs');
            $table->foreignId('dosen_id')->constrained('dosens');
            $table->foreignId('kelas_id')->constrained('kelas');
            $table->string('hari', 10);
            $table->time('waktu_mulai');
            $table->time('waktu_selesai');
            $table->string('ruangan', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal_m_k_s');
    }
};
