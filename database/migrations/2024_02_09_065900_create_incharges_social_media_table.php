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
        Schema::create('incharges_social_media', function (Blueprint $table) {
            $table->id();
            $table->text('link');
            $table->unsignedBigInteger('incharge_id');
            $table->tinyInteger('is_active')->default(1);
            $table->timestamps();
            $table->foreign('incharge_id')->references('id')->on('incharges')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('incharges_social_media');
    }
};
