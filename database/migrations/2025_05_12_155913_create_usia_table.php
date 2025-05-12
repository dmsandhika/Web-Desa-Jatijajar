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
        Schema::create('data_usia', function (Blueprint $table) {
            $table->id();
            $table->string('rt');
            $table->string('rw');
            $table->integer('0-4')->nullable();
            $table->integer('5-9')->nullable();
            $table->integer('10-14')->nullable();
            $table->integer('15-19')->nullable();
            $table->integer('20-24')->nullable();
            $table->integer('25-29')->nullable();
            $table->integer('30-34')->nullable();
            $table->integer('35-39')->nullable();
            $table->integer('40-44')->nullable();
            $table->integer('45-49')->nullable();
            $table->integer('50-54')->nullable();
            $table->integer('55-59')->nullable();
            $table->integer('60-64')->nullable();
            $table->integer('65-69')->nullable();
            $table->integer('70-74')->nullable();
            $table->integer('>=75')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_usia');
    }
};
