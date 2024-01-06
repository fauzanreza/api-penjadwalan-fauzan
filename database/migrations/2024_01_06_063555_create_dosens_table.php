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
        Schema::create('dosens', function (Blueprint $table) {
            $table->id();
            $table->string('nip', 20)->unique();
            $table->string('kode_dosen', 10)->unique();
            $table->string('nama_dosen', 255);
            $table->string('alamat', 255);
            $table->date('tanggal_lahir');
            $table->string('jenis_kelamin', 10);
            $table->string('email', 255);
            $table->string('jabatan', 255);
            $table->string('bidang', 255);
            $table->string('nomor_telepon', 15);
            $table->date('tanggal_mulai_kerja');
            $table->string('pendidikan_terakhir', 255);
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dosens');
    }
};
