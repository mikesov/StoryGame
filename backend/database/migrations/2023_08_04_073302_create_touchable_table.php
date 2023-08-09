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
        Schema::create('touchable', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('audio_id');
            $table->foreignId('audio_id')->constrained();
            $table->unsignedBigInteger('movement_id');
            $table->foreignId('movement_id')->nullable()->constrained();
            $table->unsignedBigInteger('imageId');
            $table->foreignId('imageId')->constrained();
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
        Schema::dropIfExists('touchable');
    }
};
