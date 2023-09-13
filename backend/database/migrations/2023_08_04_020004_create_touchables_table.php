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
        Schema::create('touchables', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('word_id');
            $table->foreignId('word_id')->constrained();
            $table->integer('coordinateX');
            $table->integer('coordinateY');
            $table->json('vertices');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('touchables');
    }
};
