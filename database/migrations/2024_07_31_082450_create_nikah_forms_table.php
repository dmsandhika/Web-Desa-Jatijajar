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
        Schema::create('nikah_forms', function (Blueprint $table) {
            $table->id();
            $table->string('nik');
            $table->string('nama');
            $table->string('ktp_pemohon');
            $table->string('ktp_ayah');
            $table->string('ktp_ibu');
            $table->string('ktp_calon');
            $table->string('kk_pemohon');
            $table->string('kk_calon');
            $table->date('tgl');
            $table->string('ktp_wali');
            $table->string('status_wali');
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
        Schema::dropIfExists('nikah_forms');
    }
};