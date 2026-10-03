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
        Schema::create('patient_enrollments', function (Blueprint $table) {
            $table->id();
            $table->string('patient_code')->unique();
            $table->string('zydus_rep_name')->nullable();
            $table->string('patient_type')->nullable();
            $table->string('full_name')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('contact_number')->unique()->nullable();
            $table->string('caregiver_contact_number')->nullable();
            $table->string('doctor_name')->nullable();
            $table->text('address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('pincode')->nullable();
            $table->string('govt_id')->unique()->nullable();
            $table->string('prescription')->nullable();
            $table->integer('status')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patient_enrollments');
    }
};
