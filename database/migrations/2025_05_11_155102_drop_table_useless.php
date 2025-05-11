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
        Schema::dropIfExists('belumnikah_forms');
        Schema::dropIfExists('domisili_forms');
        Schema::dropIfExists('ektp_forms');
        Schema::dropIfExists('kehilangan_forms');
        Schema::dropIfExists('keramaian_forms');
        Schema::dropIfExists('kia_forms');
        Schema::dropIfExists('keramaian_forms');
        Schema::dropIfExists('kuasa_forms');
        Schema::dropIfExists('lahir_forms');
        Schema::dropIfExists('meninggal_forms');
        Schema::dropIfExists('nikah_forms');
        Schema::dropIfExists('penghasilan_forms');
        Schema::dropIfExists('rekomendasi_forms');
        Schema::dropIfExists('skck_forms');
        Schema::dropIfExists('sktm_forms');
        Schema::dropIfExists('usaha_forms');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
