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
        Schema::create('cpls', function (Blueprint $table) {
            $table->id();
            $table->string('kode_prodi');
            $table->foreign('kode_prodi')->references('kode_prodi')->on('prodis')->onDelete('cascade');
            $table->string('kode_cpl')->unique();
            $table->string('deskripsi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cpls');
    }
};
