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
        Schema::create('psikologs', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('tempat_kerja');
            $table->string('alamat');
            $table->string('nomor_telepon')->nullable();
            $table->string('email')->unique();
            $table->string('foto')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('psikologs');
    }
};
