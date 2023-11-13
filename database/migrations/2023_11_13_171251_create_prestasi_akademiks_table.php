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
        Schema::create('prestasi_akademiks', function (Blueprint $table) {
            $table->id();
            $table->string('npm');
            $table->string('nama prestasi');
            $table->enum('tingkat', ['Lokal', 'Nasional', 'Internasional']);
            $table->enum('juara', ['Juara I', 'Juara II', 'Juara III', 'Harapan I', 'Harapan II', 'Harapan III']);
            $table->date('tahun');
            $table->timestamps();
            
            $table->foreign('npm')->references('npm')->on('mahasiswas')->onDelete('cascade');
        });
    }
    
    /**
    * Reverse the migrations.
    */
    public function down(): void
    {
        Schema::dropIfExists('prestasi_akademiks');
    }
};
