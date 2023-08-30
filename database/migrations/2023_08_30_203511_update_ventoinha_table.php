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
        //create collum fluxo_ar in table ventoinhas
        Schema::table('ventoinhas', function (Blueprint $table) {
            $table->integer('fluxo_ar')->after('mode');
        });
        
       
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
