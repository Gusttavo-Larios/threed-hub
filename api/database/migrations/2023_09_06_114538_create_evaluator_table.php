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
        Schema::create('evaluator', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('full_name', 56);
            $table->string('email', 56)->unique();
            $table->string('password',72);
            $table->uuid('administrator_id');
            $table->foreign('administrator_id')->references('id')->on('administrator');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evaluator');
    }
};
