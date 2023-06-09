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
        Schema::create('configs', function (Blueprint $table) {
            $table->id();
            $table->integer('zona_id');
            $table->integer('Mode');
            $table->integer('Threshold_min');
            $table->integer('Threshold_max');
            $table->integer('Trigger');          
            $table->integer('Ventoinha');
            $table->integer('Servo');
            $table->integer('Velocidade');
            $table->integer('Temperatura');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('configs');
    }
};
