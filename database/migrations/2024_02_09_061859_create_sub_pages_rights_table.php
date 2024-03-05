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
        Schema::create('sub_pages_rights', function (Blueprint $table) {
            $table->id();
            $table->text('title');
            $table->text('content');
            $table->unsignedBigInteger('sub_page_id');
            $table->boolean('in_sub_page')->default(false);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->foreign('sub_page_id')->references('id')->on('sub_pages')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_pages_rights');
    }
};
