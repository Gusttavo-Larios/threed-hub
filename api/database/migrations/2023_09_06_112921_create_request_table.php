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
        Schema::create('request', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('description', 512);
            $table->string('justify', 256);
            $table->string('name', 32);
            $table->uuid('client_id');
            $table->foreign('client_id')->references('id')->on('client');
            $table->uuid('material_id');
            $table->foreign('material_id')->references('id')->on('material');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('request');
    }
};
