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
        Schema::create('request_declined', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('reason_refusal', 512);
            $table->uuid('request_id');
            $table->foreign('request_id')->references('id')->on('request');
            $table->uuid('evaluator_id');
            $table->foreign('evaluator_id')->references('id')->on('evaluator');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('request_declined');
    }
};
