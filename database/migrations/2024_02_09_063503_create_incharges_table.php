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
        Schema::create('incharges', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->text('slug');
            $table->string('department', 255);
            $table->string('level', 127);
            $table->string('email', 255)->unique();
            $table->string('profile_img', 100);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('incharges');
    }
};
