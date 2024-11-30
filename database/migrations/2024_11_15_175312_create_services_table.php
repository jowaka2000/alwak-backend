<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id()->from(11111);
            $table->foreignId('user_id')->nullable();
            $table->string('service');
            $table->string('employer-location');
            $table->string('job-schedule-date')->nullable();
            $table->string('preferred-day-for-cleaning')->nullable();//mon,tue,wed,thu
            $table->string('preferred-time-for-cleaning')->nullable();
            $table->boolean('is-job-date-schedule-flexible')->default(false);
            $table->string('age')->nullable();
            $table->string('gender')->nullable();
            $table->boolean('is-full-time-job')->nullable();
            $table->string('preferred-day-for-part-time')->nullable();
            $table->string('preferred-time-for-part-time')->nullable();
            $table->integer('number-of-workers')->nullable();
            $table->longText('job-description')->nullable();
            $table->json('things-to-be-cleaned')->nullable();
            $table->integer('budget')->nullable();
            $table->string('employee-location')->nullable();
            $table->string('auto-date-job-schedule')->nullable();
            $table->string('manual-employee-location')->nullable();//region
            $table->string('main-house-manager-job')->nullable();//child care, senior care
            $table->string('payment-schedule')->nullable();
            $table->json('lawn-and-garden-to-be-prepared')->nullable();
            $table->integer('employee-selected-id')->nullable();
            $table->string('employer-phone-number')->nullable();
            $table->integer('amount-paid')->nullable();
            $table->boolean('job-completed')->default(false);
            $table->boolean('employee-contacted')->default(false);
            $table->string('job-status')->default('not-started');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
