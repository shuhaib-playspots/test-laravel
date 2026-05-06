<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('job_applications', function (Blueprint $table) {
            $table->id();
            $table->string('application_type'); // 'tutor' | 'general'
            $table->foreignId('career_id')->nullable()->constrained('careers')->nullOnDelete();
            $table->string('name');
            $table->string('age')->nullable();
            $table->string('education_qualification')->nullable();
            $table->string('college_university')->nullable();
            $table->string('position_type')->nullable(); // full-time, part-time
            $table->json('subjects')->nullable();
            $table->json('language_medium')->nullable();
            $table->json('available_days')->nullable();
            $table->string('teaching_hours')->nullable();
            $table->string('preferred_time')->nullable();
            $table->string('email');
            $table->string('phone')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('city')->nullable();
            $table->string('photograph_path')->nullable();
            $table->string('resume_path')->nullable();
            $table->string('status')->default('new'); // new, reviewed, accepted, rejected
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('job_applications');
    }
};
