<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pesanans', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_resi')->unique();
            $table->bigInteger('harga_cod');
            $table->enum('kotak', ['A', 'B', 'C']);
            $table->enum('status', ['menunggu', 'diambil'])->default('menunggu');
            $table->string('image')->nullable();
            $table->timestamp('diambil_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pesanans');
    }
};
