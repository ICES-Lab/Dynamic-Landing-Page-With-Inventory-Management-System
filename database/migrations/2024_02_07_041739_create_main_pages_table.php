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
            $table->boolean('inhead')->default(true);
            $table->boolean('infoot')->default(true);
            $table->boolean('is_active')->default(true);
            $table->boolean('is_layout')->default(true);
            $table->boolean('in_slider')->default(true);
            $table->boolean('in_home')->default(true);
            $table->boolean('in_home_foot')->default(true);
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
