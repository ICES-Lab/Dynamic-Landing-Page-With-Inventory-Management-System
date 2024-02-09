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
        Schema::create('sub_pages_social_media', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('icon');
            $table->enum('target', ['_blank', '_self']);
            $table->text('link');
            $table->unsignedBigInteger('sub_page_id');
            $table->tinyInteger('is_active')->default(1);
            $table->timestamps();
            $table->foreign('sub_page_id')->references('id')->on('sub_pages')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('icon')->references('id')->on('icons')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_pages_social_media');
    }
};
