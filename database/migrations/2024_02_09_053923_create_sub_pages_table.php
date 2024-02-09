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
        Schema::create('sub_pages', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->text('slug');
            $table->unsignedBigInteger('main_page_id');
            $table->string('img1', 100);
            $table->string('img2', 100);
            $table->string('img3', 100);
            $table->enum('active_img', ['img1', 'img2', 'img3']);
            $table->tinyInteger('is_active')->default(1);
            $table->timestamps();
            $table->foreign('main_page_id')->references('id')->on('main_pages')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_pages');
    }
};
