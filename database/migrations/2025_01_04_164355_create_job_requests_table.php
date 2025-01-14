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
        Schema::create('job_requests', function (Blueprint $table) {
            $table->id()->from(1111);
            $table->foreignId('user_id')->nullable();
            $table->string('location');
            $table->string('selected_job');
            $table->string('age');
            $table->string('gender');
            $table->string('have_work_experience');
            $table->string('region')->nullable();
            $table->string('manual_employee_region')->nullable();
            $table->string('education_level');
            $table->json('other_jobs_dowable');
            $table->string('how_to_do_job');//part time, full time
            $table->string('amount_willing_to_be_paid');
            $table->string('paymentSchedule');
            $table->string('phoneNumber');
            $table->boolean('employee_contacted')->default(false);
            $table->boolean('employee_given_a_job')->default(false);
            $table->string('job_status')->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_requests');
    }
};
