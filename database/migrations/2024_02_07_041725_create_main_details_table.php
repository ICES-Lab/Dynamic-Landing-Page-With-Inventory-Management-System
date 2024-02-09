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
        Schema::create('main_details', function (Blueprint $table) {
            $table->id();
            $table->string('logo', 100);
            $table->string('lab_name', 255);
            $table->text('mission');
            $table->text('vision');
            $table->text('what_we_do');
            $table->string('what_we_do_pic', 100);
            $table->unsignedBigInteger('icon1')->nullable();
            $table->unsignedBigInteger('icon2')->nullable();
            $table->string('icon1_name', 50);
            $table->string('icon2_name', 50);
            $table->tinyInteger('is_active')->default(1);
            $table->timestamps();
            $table->foreign('icon1')->references('id')->on('icons')->cascadeOnUpdate()->nullOnDelete();
            $table->foreign('icon2')->references('id')->on('icons')->cascadeOnUpdate()->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('main_details');
    }
};
