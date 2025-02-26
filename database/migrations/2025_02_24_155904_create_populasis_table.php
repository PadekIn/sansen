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
        Schema::create('populasis', function (Blueprint $table) {
            $table->id();
            $table->integer('jumlah');
            $table->integer('berat');
            $table->decimal('umur_akhir', 3, 1);
            $table->enum('grade_doc', ['Silver', 'Gold', 'Platinum']);
            $table->integer('bw_doc');
            $table->string('asal_doc', 75);
            $table->date('check_in');
            $table->date('check_out');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('populasi');
    }
};
