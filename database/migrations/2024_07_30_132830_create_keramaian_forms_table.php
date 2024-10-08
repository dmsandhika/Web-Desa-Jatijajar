<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('keramaian_forms', function (Blueprint $table) {
            $table->id();
            $table->string('nik');
            $table->string('nama');
            $table->string('acara');
            $table->date('tanggal_mulai');
            $table->time('jam_mulai');
            $table->date('tanggal_berakhir');
            $table->time('jam_berakhir');
            $table->string('hiburan');
            $table->text('lokasi');
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
        Schema::dropIfExists('keramaian_forms');
    }
};
