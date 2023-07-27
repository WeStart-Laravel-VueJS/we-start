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
        Schema::create('flags', function (Blueprint $table) {
            $table->id();
            $table->string('path');
            $table->string('meaning');
            $table->foreignId('country_id')->constrained('countries', 'id')->cascadeOnDelete();
            // $table->bigIncrements('country_id');
            // $table->foreign('country_id')->references('countries')->on('id')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flags');
    }
};
