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
        Schema::create('words', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sentence_id');
            $table->foreignId('sentence_id')->constrained();
            $table->unsignedBigInteger('audio_id');
            $table->foreignId('audio_id')->constrained();
            $table->unsignedBigInteger('touchable_id');
            $table->foreignId('touchable_id')->nullable()->constrained();
            $table->string('content');
            $table->integer('order');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('words');
    }
};
