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
        Schema::create('mahasiswas', function (Blueprint $table) {
            $table->id();
            $table->string('nim', 20)->unique();
            $table->string('nama_mhs', 255);
            $table->string('alamat', 255);
            $table->string('email', 255);
            $table->string('no_telepon', 15);
            $table->date('tanggal_lahir');
            $table->string('jenis_kelamin', 10);
            $table->string('kelas', 10);
            $table->foreignId('prodi_id')->constrained('prodis');
            $table->string('angkatan', 5);
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswas');
    }
};
