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
        Schema::create('perkembangan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('populasi_id')->constrained(table:'populasi', indexName:'perkembangan_populasi_id_foreign');
            $table->integer('umur');
            $table->integer('kematian_atas');
            $table->integer('kematian_bawah');
            $table->foreignId('id_tipe_pakan_atas')->constrained(table:'pakan', indexName:'perkembangan_id_tipe_pakan_atas_foreign');
            $table->integer('pakan_atas');
            $table->foreignId('id_tipe_pakan_bawah')->constrained(table:'pakan', indexName:'perkembangan_id_tipe_pakan_bawah_foreign');
            $table->integer('pakan_bawah');
            $table->decimal('abw_betina_atas', 6, 2);
            $table->decimal('abw_betina_bawah', 6, 2);
            $table->decimal('abw_normal_atas', 6, 2);
            $table->decimal('abw_normal_bawah', 6, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perkembangan');
    }
};
