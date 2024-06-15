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
        Schema::create('fields', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('venue_id');
            $table->foreign('venue_id')->references('id')->on('venues');
            $table->unsignedBigInteger('sport_id');
            $table->foreign('sport_id')->references('id')->on('sports');
            $table->string('name');
            $table->boolean('is_indoor');
            $table->string('material');
            $table->string('created_by');
            $table->string('updated_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fields');
    }
};
