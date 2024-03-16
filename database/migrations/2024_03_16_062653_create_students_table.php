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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('roll_no', 20);
            $table->string('name');
            $table->string('email');
            $table->enum('year', ['I', 'II', 'III', 'IV']);
            $table->enum('semester', ['odd', 'even']);
            $table->string('course');
            $table->string('branch');
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
        Schema::dropIfExists('students');
    }
};
