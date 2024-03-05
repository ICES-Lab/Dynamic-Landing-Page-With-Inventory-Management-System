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
        Schema::create('incharges_bottom', function (Blueprint $table) {
            $table->id();
            $table->text('content');
            $table->unsignedBigInteger('medium_id');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->foreign('medium_id')->references('id')->on('incharges_media')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('incharges_bottoms');
    }
};
