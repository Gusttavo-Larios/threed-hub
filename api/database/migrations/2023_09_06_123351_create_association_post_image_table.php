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
        Schema::create('association_post_image', function (Blueprint $table) {
            $table->primary(['post_id', 'post_image_id']);
            $table->uuid('post_id');
            $table->foreign('post_id')->references('id')->on('post');
            $table->uuid('post_image_id');
            $table->foreign('post_image_id')->references('id')->on('post_image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('association_post_image');
    }
};
