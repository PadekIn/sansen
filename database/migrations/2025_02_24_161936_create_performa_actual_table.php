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
        Schema::create('performa_actual', function (Blueprint $table) {
            $table->id();
            $table->integer('populasi_id');
            $table->decimal('fcr', 4, 3);
            $table->decimal('fi', 4, 3);
            $table->decimal('fe', 4, 2);
            $table->decimal('dep', 4, 2);
            $table->decimal('abw', 4, 2);
            $table->integer('adg');
            $table->integer('ip');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('performa_actual');
    }
};
