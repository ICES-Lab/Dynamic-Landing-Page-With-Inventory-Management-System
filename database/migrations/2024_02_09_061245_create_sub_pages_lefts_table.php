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
        Schema::create('sub_pages_lefts', function (Blueprint $table) {
            $table->id();
            $table->text('title');
            $table->text('content');
            $table->string('img1', 100)->nullable();
            $table->string('img2', 100)->nullable();
            $table->unsignedBigInteger('sub_page_id');
            $table->tinyInteger('is_active')->default(1);
            $table->timestamps();
            $table->foreign('sub_page_id')->references('id')->on('sub_pages')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_pages_lefts');
    }
};
