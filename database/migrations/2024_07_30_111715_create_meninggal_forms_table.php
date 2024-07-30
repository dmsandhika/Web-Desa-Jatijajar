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
        Schema::create('meninggal_forms', function (Blueprint $table) {
            $table->id();
            $table->string('nik');
            $table->string('nama');
            $table->date('tgl');
            $table->string('di');
            $table->string('penyebab');
            $table->string('keperluan');
            $table->string('no');
            $table->string('suket');
            $table->string('saksi1');
            $table->string('saksi2');
            $table->text('note')->nullable();
            $table->string('file')->nullable();
            $table->enum('status', ['diajukan', 'selesai', 'ditolak'])->default('diajukan');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('meninggal_forms');
    }
};