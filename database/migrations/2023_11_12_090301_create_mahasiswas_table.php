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
            $table->string('npm')->unique();
            $table->string('nama');
            $table->enum('jenis kelamin', ['perempuan', 'laki-laki']);
            $table->string('email');
            $table->string('alamat');
            $table->date('tanggal lahir');
            $table->enum('agama',['islam', 'kristen', 'katolik', 'hindu', 'buddha', 'konghucu']);
            $table->string('nomor telepon');
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
