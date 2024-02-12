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
        Schema::create('main_pages', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->text('slug');
            $table->string('head_icon_pic', 100)->default('favicon.ico');
            $table->text('content');
            $table->text('quote')->nullable();
            $table->string('page_pic', 100);
            $table->tinyInteger('inhead')->default(1);
            $table->tinyInteger('infoot')->default(1);
            $table->tinyInteger('is_active')->default(1);
            $table->tinyInteger('is_layout')->default(1);
            $table->tinyInteger('in_slider')->default(1);
            $table->tinyInteger('in_home')->default(1);
            $table->tinyInteger('in_home_foot')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('main_pages');
    }
};
