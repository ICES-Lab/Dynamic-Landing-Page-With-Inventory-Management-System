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
        Schema::create('student_targets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id')->unique();
            $table->boolean('competition')->default(false);
            $table->boolean('paper_presentation')->default(false);
            $table->boolean('online_course')->default(false);
            $table->boolean('patent')->default(false);
            $table->boolean('internship')->default(false);
            $table->timestamps();

            // Define foreign key constraint
            $table->foreign('student_id')->references('id')->on('students')->cascadeOnUpdate()->cascadeOnDelete();
        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_targets');
    }
};
