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
        Schema::create('contact_details', function (Blueprint $table) {
            $table->id();
            $table->text('contact');
            $table->enum('type', ['tel:', 'mailto:'])->nullable();
            $table->enum('target', ['_blank', '_self']);
            $table->bigInteger('icon')->unsigned();
            $table->timestamps();
            $table->foreign('icon')->references('id')->on('icons')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_details');
    }
};
