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
            $table->string('nurse_code');
            $table->unsignedBigInteger('patient_id');
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
