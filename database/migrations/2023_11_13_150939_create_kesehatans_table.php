<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('kesehatans', function (Blueprint $table) {
        $table->id();
        $table->string('npm');
        $table->string('riwayat penyakit')->nullable();
        $table->enum('golongan darah', ['A', 'B', 'AB', 'O']);
        $table->timestamps();

        $table->foreign('npm')->references('npm')->on('mahasiswas')->onDelete('cascade');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kesehatans');
    }
};
