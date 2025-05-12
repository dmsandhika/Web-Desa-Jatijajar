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
        Schema::create('data_pendidikan', function (Blueprint $table) {
            $table->id();
            $table->string('rt');
            $table->string('rw');
            $table->integer('belum_sekolah')->nullable();
            $table->integer('belum_tamat_sd')->nullable();
            $table->integer('sd')->nullable();
            $table->integer('smp')->nullable();
            $table->integer('sma')->nullable();
            $table->integer('d1_3')->nullable();
            $table->integer('akademi')->nullable();
            $table->integer('s1')->nullable();
            $table->integer('s2')->nullable();
            $table->integer('s3')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_pendidikan');
    }
};
