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
        Schema::create('video_courses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('section_course_id')->constrained('section_courses')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('name')->nullable();
            $table->integer('video_no')->nullable();
            $table->string('video');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('video_courses');
    }
};
