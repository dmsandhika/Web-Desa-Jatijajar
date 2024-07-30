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
        Schema::create('kehilangan_forms', function (Blueprint $table) {
            $table->id();
            $table->string('nik');
            $table->string('nama');
            $table->string('barang');
            $table->text('lokasi');
            $table->string('ktp');
            $table->string('no');
            $table->text('note')->nullable();
            $table->string('file')->nullable();
            $table->enum('status', ['diajukan', 'selesai', 'ditolak'])->default('diajukan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kehilangan_forms');
    }
};