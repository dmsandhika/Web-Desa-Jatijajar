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
        Schema::create('kuasa_forms', function (Blueprint $table) {
            $table->id();
            $table->string('nik');
            $table->string('nama');
            $table->string('ktp_pemberi');
            $table->string('no');
            $table->text('isi_kuasa');
            $table->string('ktp_penerima');
            $table->string('hubungan');
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
        Schema::dropIfExists('kuasa_forms');
    }
};