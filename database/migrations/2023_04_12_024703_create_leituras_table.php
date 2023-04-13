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
        Schema::create('leituras', function (Blueprint $table) {
            $table->id();
            $table->integer('zona_id');
            $table->integer('sensor_id');
            $table->string('temp');
            $table->string('hum');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leituras');
    }
};
