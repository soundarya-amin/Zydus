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
        Schema::create('nurse_assigned', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patient_id');
            $table->dateTime('date_assigned')->nullable();
            $table->string('updated_by')->nullable();
            $table->integer('status')->default(0);
            $table->foreign('patient_id')->references('id')->on('patient_enrollments')->cascadeOnDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nurse_assigned');
    }
};
